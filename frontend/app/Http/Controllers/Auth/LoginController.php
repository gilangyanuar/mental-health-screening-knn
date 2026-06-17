<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Kreait\Firebase\Contract\Auth as FirebaseAuth;
use Kreait\Firebase\Exception\Auth\InvalidPassword;
use Kreait\Firebase\Exception\Auth\UserNotFound;

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
            $signInResult = $this->firebaseAuth->signInWithEmailAndPassword(
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
                \Illuminate\Support\Facades\Auth::login($user);
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

        } catch (UserNotFound $e) {
            return back()->withErrors([
                'email' => 'Email atau kata sandi yang Anda masukkan salah.',
            ]);
        } catch (InvalidPassword $e) {
            return back()->withErrors([
                'email' => 'Email atau kata sandi yang Anda masukkan salah.',
            ]);
        } catch (\Exception $e) {
            return back()->withErrors([
                'email' => 'Gagal terhubung ke server, silakan coba beberapa saat lagi.',
            ]);
        }
    }

    /**
     * Proses Logout untuk membersihkan session
     */
    public function logout(Request $request)
    {
        \Illuminate\Support\Facades\Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}