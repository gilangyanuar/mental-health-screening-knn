<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Responden | Sampai Tenang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        :root {
            --navy:      #0b1a2e;
            --navy-mid:  #112240;
            --teal:      #00c9a7;
            --teal-mid:  #00b49a;
            --off-white: #f2ede8;
            --white:     #ffffff;
            --text-dark: #0b1a2e;
            --text-mid:  #4a5568;
            --text-muted:#8896ab;
            --border:    #dde3ea;
            --r-lg: 14px;
            --r-md: 10px;
            --required:  #dc2626;
        }
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body {
            font-family: 'Poppins', sans-serif;
            -webkit-font-smoothing: antialiased;
            min-height: 100vh;
            background: var(--off-white);
        }

        .page-wrap { display: flex; min-height: 100vh; }

        /* ── LEFT SIDEBAR ── */
        .left-panel {
            width: 240px; flex-shrink: 0;
            background: var(--navy);
            padding: 2rem 1.6rem;
            display: flex; flex-direction: column;
            justify-content: space-between;
            position: sticky; top: 0; height: 100vh;
            overflow: hidden;
        }
        .left-panel::before {
            content: ""; position: absolute;
            width: 180px; height: 180px; border-radius: 50%;
            background: rgba(0,201,167,.06);
            top: -70px; right: -70px; pointer-events: none;
        }

        .left-brand {
            display: flex; align-items: center; gap: .5rem;
            text-decoration: none; position: relative; z-index: 1;
        }
        .left-brand-icon {
            width: 28px; height: 28px; border-radius: 7px;
            background: var(--teal);
            display: flex; align-items: center; justify-content: center;
            color: var(--navy); font-size: .72rem;
        }
        .left-brand-text { font-size: .88rem; font-weight: 600; color: var(--white); }

        .left-content { position: relative; z-index: 1; }
        .left-badge {
            display: inline-flex; align-items: center; gap: .38rem;
            background: rgba(0,201,167,.14);
            border: 1px solid rgba(0,201,167,.22);
            color: var(--teal);
            font-size: .6rem; font-weight: 700; letter-spacing: .18em;
            text-transform: uppercase; padding: .28rem .75rem;
            border-radius: 30px; margin-bottom: 1.1rem;
        }
        .left-badge .ldot {
            width: 5px; height: 5px; border-radius: 50%;
            background: var(--teal); animation: blink 2s infinite;
        }
        @keyframes blink { 0%,100%{opacity:1} 50%{opacity:.25} }
        .left-title {
            font-size: 1.35rem; font-weight: 600; line-height: 1.3;
            color: var(--white); margin-bottom: .85rem;
        }
        .left-title em { font-style: italic; color: var(--teal); font-weight: 300; }
        .left-desc {
            font-size: .75rem; color: rgba(255,255,255,.45);
            line-height: 1.8; margin-bottom: 2rem;
        }

        .left-steps { display: flex; flex-direction: column; gap: .55rem; }
        .step-row { display: flex; align-items: center; gap: .7rem; }
        .step-num {
            width: 26px; height: 26px; border-radius: 7px;
            display: flex; align-items: center; justify-content: center;
            font-size: .75rem; font-weight: 700; flex-shrink: 0;
        }
        .step-row.inactive .step-num { background: rgba(255,255,255,.07); color: rgba(255,255,255,.25); }
        .step-row.active   .step-num { background: var(--teal); color: var(--navy); }
        .step-label { font-size: .78rem; font-weight: 500; }
        .step-row.inactive .step-label { color: rgba(255,255,255,.3); }
        .step-row.active   .step-label { color: var(--white); font-weight: 600; }

        .left-footer { position: relative; z-index: 1; }
        .left-footer p { font-size: .68rem; color: rgba(255,255,255,.28); line-height: 1.7; }

        /* ── RIGHT PANEL ── */
        .right-panel {
            flex: 1;
            display: flex; align-items: center; justify-content: center;
            padding: 3rem 3.5rem;
            overflow-y: auto;
        }
        .form-inner { width: 100%; max-width: 800px; }

        .form-eyebrow {
            font-size: .6rem; font-weight: 700; letter-spacing: .2em;
            text-transform: uppercase; color: var(--teal-mid);
            display: flex; align-items: center; gap: .45rem;
            margin-bottom: .65rem;
        }
        .form-eyebrow::before {
            content: ""; display: inline-block;
            width: 18px; height: 1.5px;
            background: var(--teal-mid); border-radius: 2px;
        }
        .form-title {
            font-size: 2.2rem; font-weight: 700;
            color: var(--text-dark); margin-bottom: .35rem; line-height: 1.2;
        }
        .form-subtitle {
            font-size: .83rem; color: var(--text-mid);
            line-height: 1.7; margin-bottom: 1.8rem;
        }

        /* Anonymous box */
        .anon-box {
            display: flex; align-items: center; gap: .85rem;
            background: var(--white);
            border: 1.5px solid var(--border);
            border-radius: var(--r-lg);
            padding: 1rem 1.3rem;
            margin-bottom: 1.8rem;
            cursor: pointer;
            transition: border-color .2s;
        }
        .anon-box:hover { border-color: #b0bec5; }
        .anon-icon {
            width: 42px; height: 42px; border-radius: 11px;
            background: #f0f4f8; color: var(--text-mid);
            display: flex; align-items: center; justify-content: center;
            font-size: .95rem; flex-shrink: 0;
        }
        .anon-text strong { display: block; font-size: .9rem; color: var(--text-dark); font-weight: 600; }
        .anon-text small  { color: var(--text-muted); font-size: .8rem; }

        .toggle-wrap { margin-left: auto; flex-shrink: 0; }
        .toggle-switch { position: relative; width: 42px; height: 22px; display: inline-block; }
        .toggle-switch input { opacity: 0; width: 0; height: 0; }
        .toggle-slider {
            position: absolute; cursor: pointer; inset: 0;
            border-radius: 22px; background: #d1d5db; transition: background .2s;
        }
        .toggle-slider::before {
            content: ""; position: absolute;
            width: 16px; height: 16px; border-radius: 50%;
            background: white; left: 3px; top: 3px;
            transition: transform .2s;
            box-shadow: 0 1px 3px rgba(0,0,0,.15);
        }
        .toggle-switch input:checked + .toggle-slider { background: var(--teal); }
        .toggle-switch input:checked + .toggle-slider::before { transform: translateX(20px); }

        /* Section label */
        .fsec {
            font-size: .6rem; font-weight: 700; letter-spacing: .18em;
            text-transform: uppercase; color: var(--text-muted);
            display: flex; align-items: center; gap: .55rem;
            margin-bottom: .85rem;
        }
        .fsec::after { content: ""; flex: 1; height: 1px; background: var(--border); }

        /* Wajib */
        .required-star {
            color: var(--required);
            font-weight: 700;
            margin-left: .15rem;
        }

        /* Inputs */
        .form-label {
            font-weight: 500; font-size: .85rem;
            color: var(--text-dark); margin-bottom: .42rem;
            display: block;
        }
        .form-control, .form-select {
            border-radius: var(--r-md);
            height: 52px;
            border: 1.5px solid var(--border);
            padding: 0 1rem;
            font-size: .92rem;
            font-family: 'Poppins', sans-serif;
            color: var(--text-dark);
            background: var(--white);
            width: 100%;
            transition: border-color .2s, box-shadow .2s;
            display: block;
        }
        .form-control:focus, .form-select:focus {
            border-color: var(--teal);
            box-shadow: 0 0 0 3px rgba(0,201,167,.1);
            outline: none;
        }
        .form-control::placeholder { color: var(--text-muted); font-size: .84rem; }
        .form-control[readonly] { background: #f5f7fa; color: var(--text-mid); cursor: not-allowed; }

        .form-select {
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='14' height='14' viewBox='0 0 24 24' fill='none' stroke='%238896ab' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpolyline points='6 9 12 15 18 9'%3E%3C/polyline%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 14px center;
            padding-right: 2.5rem;
            cursor: pointer;
        }
        .form-select option { color: var(--text-dark); }

        .field-group { margin-bottom: 1rem; }

        /* ── KETERANGAN WAJIB ── */
        .required-note {
            display: flex;
            align-items: center;
            gap: .4rem;
            margin-top: .5rem;
            margin-bottom: .2rem;
            font-size: .72rem;
            color: var(--text-muted);
        }
        .required-note .star {
            color: var(--required);
            font-weight: 700;
        }
        .required-note strong {
            color: var(--required);
        }

        .confirmation-box {
            display: flex;
            align-items: flex-start;
            gap: .85rem;
            background: var(--white);
            border: 1.5px solid var(--border);
            border-radius: var(--r-md);
            padding: 1rem 1.1rem;
            margin-top: 1.1rem;
            cursor: pointer;
            transition: border-color .2s, box-shadow .2s;
        }
        .confirmation-box:hover,
        .confirmation-box:focus-within {
            border-color: var(--teal);
            box-shadow: 0 0 0 3px rgba(0,201,167,.08);
        }
        .confirmation-box input {
            width: 18px;
            height: 18px;
            margin-top: .15rem;
            accent-color: var(--teal);
            cursor: pointer;
            flex-shrink: 0;
        }
        .confirmation-text {
            font-size: .8rem;
            line-height: 1.65;
            color: var(--text-mid);
        }
        .confirmation-text strong {
            color: var(--text-dark);
            font-weight: 600;
        }
        .field-error {
            margin-top: .45rem;
            font-size: .72rem;
            color: var(--required);
            font-weight: 500;
        }

        .btn-submit {
            width: 100%;
            background: var(--navy); color: var(--white); border: none;
            border-radius: var(--r-md);
            height: 58px;
            font-weight: 600; font-size: .95rem;
            font-family: 'Poppins', sans-serif;
            display: flex; align-items: center; justify-content: center; gap: .5rem;
            cursor: pointer;
            transition: background .2s, transform .15s;
            margin-top: 1.6rem;
            letter-spacing: .01em;
        }
        .btn-submit:hover { background: #0d2540; transform: translateY(-1px); }
        .btn-submit:disabled {
            background: #9aa7b8;
            color: rgba(255,255,255,.72);
            cursor: not-allowed;
            transform: none;
            opacity: .72;
        }
        .btn-submit:disabled:hover {
            background: #9aa7b8;
            transform: none;
        }

        @media(max-width: 991px) {
            .left-panel { display: none; }
            .right-panel { padding: 2.5rem 2rem; }
        }
        @media(max-width: 576px) {
            .right-panel { padding: 2rem 1.2rem; }
            .form-title  { font-size: 1.5rem; }
        }
    </style>
</head>
<body>
<div class="page-wrap">

    <!-- LEFT -->
    <div class="left-panel">
        <a href="/" class="left-brand">
            <div class="left-brand-icon"><i class="bi bi-pin-angle-fill"></i></div>
            <span class="left-brand-text">Sampai Tenang</span>
        </a>

        <div class="left-content">
            <div class="left-badge"><span class="ldot"></span>Student Assessment</div>
            <h2 class="left-title">Kenali Kondisi <em>Mentalmu</em> Lebih Awal</h2>
            <p class="left-desc">Isi data dirimu terlebih dahulu sebelum memulai assessment. Data kamu bersifat rahasia dan hanya digunakan untuk keperluan penelitian.</p>
            <div class="left-steps">
                <div class="step-row active">
                    <div class="step-num">1</div>
                    <div class="step-label">Isi Data Responden</div>
                </div>
                <div class="step-row inactive">
                    <div class="step-num">2</div>
                    <div class="step-label">Jawab 21 Pertanyaan</div>
                </div>
                <div class="step-row inactive">
                    <div class="step-num">3</div>
                    <div class="step-label">Lihat Hasil Assessment</div>
                </div>
            </div>
        </div>

        <div class="left-footer">
            <p>Hasil assessment bukan diagnosis klinis resmi. Konsultasikan ke profesional jika diperlukan.</p>
        </div>
    </div>

    <!-- RIGHT -->
    <div class="right-panel">
        <div class="form-inner">

            <div class="form-eyebrow">DASS-21 Respondent Form</div>
            <h1 class="form-title">Lengkapi Data Dirimu</h1>
            <p class="form-subtitle">Data digunakan untuk analisis assessment psikologis. Seluruh informasi bersifat rahasia dan aman.</p>

            <!-- ANONYMOUS -->
            <label class="anon-box" for="anonToggle">
                <div class="anon-icon"><i class="bi bi-person-dash"></i></div>
                <div class="anon-text">
                    <strong>Isi sebagai Anonymous</strong>
                    <small>Identitasmu tidak akan disimpan atau ditampilkan di hasil</small>
                </div>
                <div class="toggle-wrap">
                    <label class="toggle-switch" onclick="event.stopPropagation()">
                        <input type="checkbox" id="anonToggle">
                        <span class="toggle-slider"></span>
                    </label>
                </div>
            </label>

            <form action="{{ route('assessment.index') }}" method="POST">
                @csrf

                <!-- DATA PRIBADI -->
                <div class="fsec">Data Pribadi</div>
                <div class="row g-4 mb-4">
                    <div class="col-6">
                        <div class="field-group">
                            <label class="form-label">Nama Lengkap <span class="required-star">*</span></label>
                            <input type="text" id="namaInput" name="nama_lengkap"
                                class="form-control" placeholder="Masukkan nama lengkap" required>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="field-group">
                            <label class="form-label">Universitas <span class="required-star">*</span></label>
                            <input type="text" name="universitas"
                                class="form-control" placeholder="Nama universitas" required>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="field-group">
                            <label class="form-label">Program Studi <span class="required-star">*</span></label>
                            <input type="text" name="prodi"
                                class="form-control" placeholder="Contoh: Teknik Informatika" required>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="field-group">
                            <label class="form-label">Jenis Kelamin <span class="required-star">*</span></label>
                            <select name="jenis_kelamin" class="form-select" required>
                                <option value="" disabled selected>Pilih jenis kelamin</option>
                                <option value="Laki-laki">Laki-laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- DATA AKADEMIK -->
                <div class="fsec">Data Akademik</div>
                <div class="row g-4 mb-4">
                    <div class="col-4">
                        <div class="field-group">
                            <label class="form-label">Semester <span class="required-star">*</span></label>
                            <select name="semester" class="form-select" required>
                                <option value="" disabled selected>Pilih semester</option>
                                @for($s = 7; $s <= 14; $s++)
                                <option value="Semester {{ $s }}">Semester {{ $s }}</option>
                                @endfor
                            </select>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="field-group">
                            <label class="form-label">Usia <span class="required-star">*</span></label>
                            <input type="number" name="usia"
                                class="form-control" placeholder="Contoh: 22"
                                min="17" max="40" required>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="field-group">
                            <label class="form-label">Status TA <span class="required-star">*</span></label>
                            <select name="status_ta" class="form-select" required>
                                <option value="" disabled selected>Pilih status</option>
                                <option value="SEMPRO">Seminar Proposal</option>
                                <option value="SEMHAS">Seminar Hasil</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- KEBIASAAN -->
                <div class="fsec">Kebiasaan Sehari-hari</div>
                <div class="row g-4">
                    <div class="col-6">
                        <div class="field-group">
                            <label class="form-label">Rata-rata Jam Tidur <span class="required-star">*</span></label>
                            <select name="jam_tidur" class="form-select" required>
                                <option value="" disabled selected>Pilih jam tidur</option>
                                <option value="< 5 Jam">Kurang dari 5 jam</option>
                                <option value="5 - 6 Jam">5 – 6 jam</option>
                                <option value="7 - 8 Jam">7 – 8 jam</option>
                                <option value="> 8 Jam">Lebih dari 8 jam</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="field-group">
                            <label class="form-label">Sedang Bekerja? <span class="required-star">*</span></label>
                            <select name="bekerja" class="form-select" required>
                                <option value="" disabled selected>Pilih status</option>
                                <option value="Ya">Ya, sedang bekerja</option>
                                <option value="Tidak">Tidak, fokus kuliah</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- KETERANGAN WAJIB ISI -->
                <div class="required-note">
                    <span class="star">*</span>
                    <span>Semua field bertanda <strong>*</strong> wajib diisi.</span>
                </div>

                <label class="confirmation-box" for="konfirmasiData">
                    <input type="checkbox" id="konfirmasiData" name="konfirmasi_data" value="1" required>
                    <span class="confirmation-text">
                        Saya menyatakan bahwa <strong>data yang saya isi adalah benar dan dapat dipertanggungjawabkan</strong>, serta bersedia data tersebut disimpan dan digunakan untuk keperluan penelitian selanjutnya.
                    </span>
                </label>
                @error('konfirmasi_data')
                    <div class="field-error">{{ $message }}</div>
                @enderror

                <button type="submit" class="btn-submit" id="submitProfileBtn" disabled aria-disabled="true">
                    Lanjut ke Assessment DASS-21
                </button>

            </form>
        </div>
    </div>
</div>

<script>
const anonToggle = document.getElementById('anonToggle');
const namaInput  = document.getElementById('namaInput');
const konfirmasiData = document.getElementById('konfirmasiData');
const submitProfileBtn = document.getElementById('submitProfileBtn');

function syncSubmitState() {
    const canSubmit = konfirmasiData.checked;
    submitProfileBtn.disabled = !canSubmit;
    submitProfileBtn.setAttribute('aria-disabled', String(!canSubmit));
}

anonToggle.addEventListener('change', function() {
    if (this.checked) {
        namaInput.value = 'Anonymous';
        namaInput.setAttribute('readonly', true);
    } else {
        namaInput.value = '';
        namaInput.removeAttribute('readonly');
        namaInput.focus();
    }
});

konfirmasiData.addEventListener('change', syncSubmitState);
syncSubmitState();
</script>
</body>
</html>
