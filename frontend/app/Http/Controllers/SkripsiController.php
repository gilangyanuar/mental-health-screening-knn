<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\HasilTes;
use App\Models\DetailJawaban;
use App\Models\Pertanyaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class SkripsiController extends Controller
{
    // =========================
    // DASHBOARD ADMIN
    // =========================

    public function index()
    {
        $data = HasilTes::with(['mahasiswa', 'detailJawaban'])
            ->orderBy('id_hasil', 'desc')
            ->get();

        return view('admin.dashboard', compact('data'));
    }


    // =========================
    // SIMPAN PROFILE KE SESSION & TAMPIL ASSESSMENT
    // =========================

    public function showAssessment(Request $request)
    {
        $request->session()->put('profile', [
            'nama_lengkap'  => $request->nama_lengkap,
            'universitas'   => $request->universitas,
            'prodi'         => $request->prodi,
            'jenis_kelamin' => $request->jenis_kelamin,
            'semester'      => $request->semester,
            'usia'          => $request->usia,
            'status_ta'     => $request->status_ta,
            'jam_tidur'     => $request->jam_tidur,
            'bekerja'       => $request->bekerja,
        ]);

        return view('assessment.assessment');
    }


    // =========================
    // PROSES PREDIKSI DASS-21
    // =========================

    public function predict(Request $request)
    {

        // =========================
        // VALIDASI INPUT
        // =========================

        $validatedData = $request->validate([
            'nama_lengkap'  => 'required|string|max:255',
            'universitas'   => 'required|string|max:255',
            'prodi'         => 'required|string|max:255',
            'jenis_kelamin' => 'required|string|max:50',
            'semester'      => 'required|string|max:50',
            'usia'          => 'required|integer',
            'status_ta'     => 'required|string|max:100',
            'jam_tidur'     => 'required|string|max:100',
            'bekerja'       => 'required|string|max:100',
            'q1'  => 'required|integer|min:0|max:3',
            'q2'  => 'required|integer|min:0|max:3',
            'q3'  => 'required|integer|min:0|max:3',
            'q4'  => 'required|integer|min:0|max:3',
            'q5'  => 'required|integer|min:0|max:3',
            'q6'  => 'required|integer|min:0|max:3',
            'q7'  => 'required|integer|min:0|max:3',
            'q8'  => 'required|integer|min:0|max:3',
            'q9'  => 'required|integer|min:0|max:3',
            'q10' => 'required|integer|min:0|max:3',
            'q11' => 'required|integer|min:0|max:3',
            'q12' => 'required|integer|min:0|max:3',
            'q13' => 'required|integer|min:0|max:3',
            'q14' => 'required|integer|min:0|max:3',
            'q15' => 'required|integer|min:0|max:3',
            'q16' => 'required|integer|min:0|max:3',
            'q17' => 'required|integer|min:0|max:3',
            'q18' => 'required|integer|min:0|max:3',
            'q19' => 'required|integer|min:0|max:3',
            'q20' => 'required|integer|min:0|max:3',
            'q21' => 'required|integer|min:0|max:3',
        ]);


        // =========================
        // HITUNG SKOR DASS-21 (×2 sesuai standar)
        // =========================

        $stres = (
            $validatedData['q1']  + $validatedData['q6']  +
            $validatedData['q8']  + $validatedData['q11'] +
            $validatedData['q12'] + $validatedData['q14'] +
            $validatedData['q18']
        ) * 2;

        $kecemasan = (
            $validatedData['q2']  + $validatedData['q4']  +
            $validatedData['q7']  + $validatedData['q9']  +
            $validatedData['q15'] + $validatedData['q19'] +
            $validatedData['q20']
        ) * 2;

        $depresi = (
            $validatedData['q3']  + $validatedData['q5']  +
            $validatedData['q10'] + $validatedData['q13'] +
            $validatedData['q16'] + $validatedData['q17'] +
            $validatedData['q21']
        ) * 2;


        // =========================
        // HITUNG DIMENSI DOMINAN
        // -------------------------
        // FIX: array_search(max(...)) akan selalu memilih key PERTAMA
        // ('Stres') ketika semua skor sama (termasuk semua 0), sehingga
        // responden dengan skor 0-0-0 keliru diberi label "dominan Stres".
        // Perbaikan: anggap TIDAK ADA dimensi dominan jika skor maksimum
        // bernilai 0, atau jika lebih dari satu dimensi sama-sama tertinggi.
        // =========================

        $scores = [
            'Stres'     => $stres,
            'Kecemasan' => $kecemasan,
            'Depresi'   => $depresi,
        ];

        $maxScore       = max($scores);
        $jumlahYangSama = count(array_filter($scores, fn($v) => $v === $maxScore));

        if ($maxScore === 0 || $jumlahYangSama > 1) {
            // Semua skor 0, ATAU ada lebih dari satu dimensi dengan nilai
            // tertinggi yang sama -> tidak ada dimensi yang benar-benar dominan
            $dimensiDominan = null;
        } else {
            $dimensiDominan = array_search($maxScore, $scores);
        }


        // =========================
        // KIRIM KE FLASK (KNN)
        // =========================

        try {
            $response = Http::withHeaders([
                'Content-Type' => 'application/json',
            ])->post(config('services.knn.url'), [
                'q1'  => (int) $request->q1,  'q2'  => (int) $request->q2,
                'q3'  => (int) $request->q3,  'q4'  => (int) $request->q4,
                'q5'  => (int) $request->q5,  'q6'  => (int) $request->q6,
                'q7'  => (int) $request->q7,  'q8'  => (int) $request->q8,
                'q9'  => (int) $request->q9,  'q10' => (int) $request->q10,
                'q11' => (int) $request->q11, 'q12' => (int) $request->q12,
                'q13' => (int) $request->q13, 'q14' => (int) $request->q14,
                'q15' => (int) $request->q15, 'q16' => (int) $request->q16,
                'q17' => (int) $request->q17, 'q18' => (int) $request->q18,
                'q19' => (int) $request->q19, 'q20' => (int) $request->q20,
                'q21' => (int) $request->q21,
            ]);

            // Flask mengembalikan level: Normal / Ringan / Sedang / Berat / Sangat Berat
            $labelFlask = trim($response->json()['prediksi'] ?? 'Normal');

            // =========================
            // GABUNGKAN DIMENSI + LEVEL
            // Contoh: "Stres" + "Berat" = "Stres Berat"
            //         "Kecemasan" + "Sangat Berat" = "Kecemasan Sangat Berat"
            //         "Normal" tetap "Normal"
            //
            // FIX: jika tidak ada dimensi dominan (null), tampilkan label
            // level saja tanpa embel-embel nama dimensi, supaya tidak
            // muncul badge yang menyesatkan (mis. "Stres" pada skor 0-0-0).
            // =========================

            if (strtolower($labelFlask) === 'normal' || $dimensiDominan === null) {
                $prediksi = $labelFlask;
            } else {
                $prediksi = $dimensiDominan . ' ' . $labelFlask;
            }

        } catch (\Exception $e) {
            // Fallback: hitung manual dari skor jika Flask tidak tersedia
            $prediksi = $this->hitungPrediksiManual(
                $stres, $kecemasan, $depresi, $dimensiDominan
            );
        }


        // =========================
        // SIMPAN KE DATABASE (4 tabel)
        // =========================

        // 1. Simpan data mahasiswa
        $mahasiswa = Mahasiswa::create([
            'nama_lengkap'  => $request->nama_lengkap,
            'universitas'   => $request->universitas,
            'prodi'         => $request->prodi,
            'jenis_kelamin' => $request->jenis_kelamin,
            'usia'          => $request->usia,
            'semester'      => $request->semester,
            'status_ta'     => $request->status_ta,
            'jam_tidur'     => $request->jam_tidur,
            'bekerja'       => $request->bekerja,
        ]);

        // 2. Simpan hasil tes
        $hasil = HasilTes::create([
            'id_mahasiswa'         => $mahasiswa->id_mahasiswa,
            'total_skor_stres'     => $stres,
            'total_skor_kecemasan' => $kecemasan,
            'total_skor_depresi'   => $depresi,
            'label_knn'            => $prediksi,
            'dimensi_dominan'      => $dimensiDominan, // bisa null sekarang, pastikan kolom DB nullable
            'jenis_data'           => 'testing',
        ]);

        // 3. Simpan detail jawaban Q1-Q21
        for ($i = 1; $i <= 21; $i++) {
            $pertanyaan = Pertanyaan::where('kode_pertanyaan', 'Q' . $i)->first();

            if ($pertanyaan) {
                DetailJawaban::create([
                    'id_hasil'      => $hasil->id_hasil,
                    'id_pertanyaan' => $pertanyaan->id_pertanyaan,
                    'skor_jawaban'  => (int) $request->input('q' . $i),
                ]);
            }
        }


        // =========================
        // TAMPILKAN HASIL
        // =========================

        return view('assessment.hasil', compact(
            'depresi',
            'kecemasan',
            'stres',
            'prediksi',
            'dimensiDominan'
        ));
    }


    // =========================
    // FALLBACK: HITUNG MANUAL JIKA FLASK MATI
    // =========================

    private function hitungPrediksiManual(
        int $stres, int $kecemasan, int $depresi, ?string $dimensiDominan
    ): string {

        // FIX: jika tidak ada dimensi dominan (semua skor 0 atau seri),
        // langsung kembalikan "Normal" tanpa mencoba hitung level.
        if ($dimensiDominan === null) {
            return 'Normal';
        }

        // Ambil skor dimensi dominan
        $skor = match($dimensiDominan) {
            'Stres'     => $stres,
            'Kecemasan' => $kecemasan,
            'Depresi'   => $depresi,
            default     => 0,
        };

        // Tentukan level berdasarkan dimensi dominan
        if ($dimensiDominan === 'Stres') {
            if ($skor >= 26) $level = 'Sangat Berat';
            elseif ($skor >= 19) $level = 'Berat';
            elseif ($skor >= 15) $level = 'Sedang';
            elseif ($skor >= 10) $level = 'Ringan';
            else $level = null;
        } elseif ($dimensiDominan === 'Kecemasan') {
            if ($skor >= 20) $level = 'Sangat Berat';
            elseif ($skor >= 15) $level = 'Berat';
            elseif ($skor >= 10) $level = 'Sedang';
            elseif ($skor >= 8)  $level = 'Ringan';
            else $level = null;
        } else { // Depresi
            if ($skor >= 28) $level = 'Sangat Berat';
            elseif ($skor >= 21) $level = 'Berat';
            elseif ($skor >= 14) $level = 'Sedang';
            elseif ($skor >= 10) $level = 'Ringan';
            else $level = null;
        }

        return $level ? ($dimensiDominan . ' ' . $level) : 'Normal';
    }


    // =========================
    // HAPUS DATA
    // =========================

    public function destroy($id)
    {
        $data = HasilTes::findOrFail($id);
        $data->delete();

        return back()->with('success', 'Data berhasil dihapus.');
    }
}