<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\QueryException;
use Kreait\Firebase\Contract\Auth as FirebaseAuth;
use Kreait\Firebase\Exception\Auth\AuthError;
use Kreait\Firebase\Exception\Auth\InvalidPassword;
use Kreait\Firebase\Exception\Auth\UserNotFound;
use Kreait\Firebase\Auth\SignIn\FailedToSignIn;

class LoginController extends Controller
{
    /**
     * Properti untuk menyimpan instance Firebase Auth
     * @var FirebaseAuth
     */
    protected $firebaseAuth;

    /**
     * Constructor untuk menyuntikkan Firebase Auth Service
     */
    public function __construct(FirebaseAuth $firebaseAuth)
    {
        $this->firebaseAuth = $firebaseAuth;
    }

    /**
     * Menampilkan halaman login
     */
    public function showLoginForm()
    {
        return view('login');
    }

    /**
     * Proses login hybrid: Firebase (Sandi) + MySQL (Role)
     */
    public function login(Request $request)
    {
        // 1. Validasi input form
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        try {
            // 2. Verifikasi kredensial ke Firebase Authentication
            $this->firebaseAuth->signInWithEmailAndPassword(
                $request->email,
                $request->password
            );

            /**
             * 3. Cari User di database lokal (HeidiSQL)
             */
            $user = \App\Models\User::whereEmail($request->email)->first();

            if ($user) {
                /**
                 * 4. Login ke Session Laravel
                 */
                Auth::login($user);
                $request->session()->regenerate();

                // 5. Redirect berdasarkan Role
                if ($user->role === 'admin') {
                    return redirect()->intended('/admin/dashboard');
                }

                return redirect()->intended('/');
            }

            // Jika user ada di Firebase tapi tidak ada di database lokal
            return back()->withErrors([
                'email' => 'Akun terverifikasi di Firebase, namun data peran (role) tidak ditemukan di database lokal.',
            ]);

        } catch (UserNotFound) {
            return back()->withErrors([
                'email' => 'Email atau kata sandi yang Anda masukkan salah.',
            ]);
        } catch (InvalidPassword) {
            return back()->withErrors([
                'email' => 'Email atau kata sandi yang Anda masukkan salah.',
            ]);
        } catch (FailedToSignIn $e) {
            Log::warning('Firebase admin login failed.', [
                'email' => $request->email,
                'message' => $e->getMessage(),
            ]);

            return back()->withErrors([
                'email' => 'Email atau kata sandi yang Anda masukkan salah.',
            ])->onlyInput('email');
        } catch (AuthError $e) {
            Log::error('Firebase admin login configuration error.', [
                'email' => $request->email,
                'message' => $e->getMessage(),
                'previous' => $e->getPrevious()?->getMessage(),
            ]);

            $message = strtolower($e->getMessage() . ' ' . ($e->getPrevious()?->getMessage() ?? ''));

            if (str_contains($message, 'invalid_grant') || str_contains($message, 'invalid jwt signature')) {
                return back()->withErrors([
                    'email' => 'Credential Firebase tidak valid. Buat service account JSON baru di Firebase Console lalu ganti file credential pada FIREBASE_CREDENTIALS.',
                ])->onlyInput('email');
            }

            return back()->withErrors([
                'email' => 'Konfigurasi Firebase bermasalah. Periksa file service account JSON.',
            ])->onlyInput('email');
        } catch (QueryException $e) {
            Log::error('Database error during admin login.', [
                'email' => $request->email,
                'message' => $e->getMessage(),
            ]);

            return back()->withErrors([
                'email' => 'Database belum siap. Pastikan MySQL berjalan dan migrasi sudah dijalankan.',
            ])->onlyInput('email');
        } catch (\Exception $e) {
            Log::error('Unexpected admin login error.', [
                'email' => $request->email,
                'message' => $e->getMessage(),
            ]);

            return back()->withErrors([
                'email' => 'Gagal terhubung ke server, silakan coba beberapa saat lagi.',
            ])->onlyInput('email');
        }
    }

    /**
     * Proses Logout untuk membersihkan session
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}