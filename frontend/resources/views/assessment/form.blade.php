<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Responden | DASS-21</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        :root {
            --navy:       #0f1f6e;
            --blue:       #1b3afe;
            --blue-mid:   #5f7cff;
            --blue-light: #e8eeff;
            --blue-soft:  #f0f4ff;
            --green:      #059669;
            --amber:      #d97706;
            --text-1:     #0d1540;
            --text-2:     #4a5480;
            --text-3:     #8892b8;
            --r-xl: 28px; --r-lg: 20px; --r-md: 14px; --r-sm: 10px;
            --shadow-lg: 0 32px 80px rgba(15,31,110,.13);
            --shadow-sm: 0 6px 20px rgba(15,31,110,.06);
        }
        * { box-sizing: border-box; margin: 0; padding: 0; }
        html { scroll-behavior: smooth; }

        body {
            font-family: 'Poppins', sans-serif;
            color: var(--text-1);
            -webkit-font-smoothing: antialiased;
            min-height: 100vh;
            background: linear-gradient(135deg,#eef1fb 0%,#e8eeff 50%,#f0f6ff 100%);
        }
        body::before {
            content: "";
            position: fixed; inset: 0; z-index: -1;
            background:
                radial-gradient(ellipse 60% 40% at 0% 0%, rgba(27,58,254,.10) 0%, transparent 55%),
                radial-gradient(ellipse 50% 45% at 100% 0%, rgba(124,58,237,.08) 0%, transparent 50%),
                radial-gradient(ellipse 55% 40% at 100% 100%, rgba(5,150,105,.07) 0%, transparent 50%),
                radial-gradient(ellipse 50% 40% at 0% 100%, rgba(56,189,248,.08) 0%, transparent 50%);
            pointer-events: none;
        }

        /* ── LAYOUT SPLIT ── */
        .page-wrap {
            display: flex;
            min-height: 100vh;
        }

        /* ── LEFT PANEL ── */
        .left-panel {
            width: 380px;
            flex-shrink: 0;
            background: linear-gradient(160deg, var(--navy) 0%, var(--blue) 100%);
            padding: 3rem 2.5rem;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            position: sticky;
            top: 0;
            height: 100vh;
            overflow: hidden;
        }
        .left-panel::before {
            content: "";
            position: absolute;
            width: 280px; height: 280px; border-radius: 50%;
            background: rgba(255,255,255,.05);
            top: -100px; right: -100px;
        }
        .left-panel::after {
            content: "";
            position: absolute;
            width: 200px; height: 200px; border-radius: 50%;
            background: rgba(255,255,255,.04);
            bottom: -70px; left: -70px;
        }
        .left-brand {
            display: flex; align-items: center; gap: .6rem;
            color: white; text-decoration: none;
            font-weight: 700; font-size: 1.05rem;
            position: relative; z-index: 1;
        }
        .left-brand-icon {
            width: 36px; height: 36px; border-radius: 9px;
            background: rgba(255,255,255,.15);
            display: flex; align-items: center; justify-content: center;
            font-size: .95rem;
        }
        .left-content { position: relative; z-index: 1; }
        .left-badge {
            display: inline-flex; align-items: center; gap: .45rem;
            background: rgba(255,255,255,.12);
            color: rgba(255,255,255,.9);
            font-size: .7rem; font-weight: 700; letter-spacing: .18em;
            text-transform: uppercase; padding: .4rem .9rem;
            border-radius: 30px; margin-bottom: 1.4rem;
        }
        .left-badge .ldot {
            width: 6px; height: 6px; border-radius: 50%;
            background: #7fffb0; animation: pulse 2s infinite;
        }
        @keyframes pulse { 0%,100%{opacity:1;transform:scale(1);} 50%{opacity:.4;transform:scale(1.5);} }
        .left-title {
            font-family: 'Poppins', sans-serif;
            font-size: 1.9rem; color: white;
            line-height: 1.22; margin-bottom: 1rem;
        }
        .left-title em { font-style: italic; color: rgba(255,255,255,.72); }
        .left-desc { color: rgba(255,255,255,.62); font-size: .88rem; line-height: 1.8; margin-bottom: 2rem; }

        /* STEP INDICATOR */
        .left-steps { display: flex; flex-direction: column; gap: .75rem; }
        .step-row { display: flex; align-items: center; gap: .85rem; }
        .step-num {
            width: 32px; height: 32px; border-radius: 9px;
            display: flex; align-items: center; justify-content: center;
            font-size: .82rem; font-weight: 700; flex-shrink: 0;
            background: rgba(255,255,255,.1); color: rgba(255,255,255,.55);
        }
        .step-row.active .step-num { background: white; color: var(--blue); }
        .step-row.done  .step-num { background: rgba(127,255,176,.2); color: #7fffb0; }
        .step-label { font-size: .87rem; font-weight: 500; color: rgba(255,255,255,.55); }
        .step-row.active .step-label { color: white; font-weight: 700; }
        .step-row.done  .step-label { color: rgba(255,255,255,.75); }

        .left-footer { position: relative; z-index: 1; }
        .left-footer p { color: rgba(255,255,255,.38); font-size: .77rem; line-height: 1.7; }

        /* ── RIGHT PANEL ── */
        .right-panel {
            flex: 1;
            overflow-y: auto;
            padding: 3rem 3.5rem;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        /* FORM HEADER */
        .form-top { margin-bottom: 2.5rem; }
        .form-eyebrow {
            display: inline-block;
            background: var(--blue-light); color: var(--blue);
            font-size: .7rem; font-weight: 700; letter-spacing: .2em;
            text-transform: uppercase; padding: .35rem .88rem;
            border-radius: 30px; margin-bottom: .9rem;
        }
        .form-title {
            font-family: 'Poppins', sans-serif;
            font-size: 2rem; color: var(--text-1);
            margin-bottom: .5rem; line-height: 1.2;
        }
        .form-subtitle { color: var(--text-2); font-size: .9rem; line-height: 1.7; }

        /* ANONYMOUS BOX */
        .anon-box {
            display: flex; align-items: center; gap: 1rem;
            background: var(--blue-soft);
            border: 1.5px solid rgba(27,58,254,.12);
            border-radius: var(--r-lg);
            padding: 1rem 1.3rem;
            margin-bottom: 2rem;
            cursor: pointer;
            transition: border-color .2s, background .2s;
        }
        .anon-box:hover { border-color: var(--blue); background: var(--blue-light); }
        .anon-icon {
            width: 42px; height: 42px; border-radius: 12px;
            background: var(--blue-light); color: var(--blue);
            display: flex; align-items: center; justify-content: center;
            font-size: 1.1rem; flex-shrink: 0;
        }
        .anon-text strong { display: block; font-size: .9rem; color: var(--text-1); font-weight: 600; }
        .anon-text small  { color: var(--text-2); font-size: .8rem; }
        .anon-check {
            margin-left: auto; flex-shrink: 0;
            width: 20px; height: 20px; border-radius: 6px;
            border: 2px solid #c5cdf0; cursor: pointer;
            accent-color: var(--blue);
        }

        /* SECTION TITLE */
        .fsec-title {
            font-size: .7rem; font-weight: 700; letter-spacing: .18em;
            text-transform: uppercase; color: var(--text-3);
            margin-bottom: 1.1rem;
            display: flex; align-items: center; gap: .6rem;
        }
        .fsec-title::after {
            content: ""; flex: 1; height: 1px;
            background: rgba(27,58,254,.1);
        }

        /* FORM ELEMENTS */
        .form-label {
            font-weight: 600; font-size: .84rem;
            color: var(--text-1); margin-bottom: .45rem;
        }
        .form-control,
        .form-select {
            border-radius: var(--r-md);
            min-height: 50px;
            border: 1.5px solid #dce5ff;
            padding: .65rem 1rem;
            font-size: .9rem;
            font-family: 'Poppins', sans-serif;
            color: var(--text-1);
            background: white;
            transition: border-color .2s, box-shadow .2s;
        }
        .form-control:focus,
        .form-select:focus {
            border-color: var(--blue);
            box-shadow: 0 0 0 3px rgba(27,58,254,.09);
            outline: none;
        }
        .form-control::placeholder { color: var(--text-3); }
        .form-control[readonly] { background: var(--blue-soft); color: var(--text-2); }

        /* SUBMIT */
        .btn-submit {
            width: 100%;
            background: var(--blue); color: white; border: none;
            border-radius: var(--r-md);
            padding: 1rem;
            font-weight: 700; font-size: .97rem;
            font-family: 'Poppins', sans-serif;
            display: flex; align-items: center; justify-content: center; gap: .55rem;
            cursor: pointer;
            transition: background .2s, transform .2s, box-shadow .2s;
            box-shadow: 0 8px 24px rgba(27,58,254,.3);
            margin-top: 1.5rem;
        }
        .btn-submit:hover { background: #1228dd; transform: translateY(-2px); box-shadow: 0 14px 32px rgba(27,58,254,.4); }

        /* RESPONSIVE */
        @media(max-width: 991px) {
            .left-panel { display: none; }
            .right-panel { padding: 2.5rem 2rem; }
        }
        @media(max-width: 576px) {
            .right-panel { padding: 2rem 1.2rem; }
            .form-title { font-size: 1.7rem; }
        }
    </style>
</head>
<body>

<div class="page-wrap">

    <!-- ══ LEFT PANEL ══ -->
    <div class="left-panel">
        <a href="/" class="left-brand">
            <div class="left-brand-icon"><i class="bi bi-clipboard2-pulse-fill"></i></div>
            Sampai Tenang
        </a>

        <div class="left-content">
            <div class="left-badge"><span class="ldot"></span>Student Assessment</div>
            <h2 class="left-title">Kenali Kondisi <em>Mentalmu</em> Lebih Awal</h2>
            <p class="left-desc">Isi data dirimu terlebih dahulu sebelum memulai assessment. Data kamu bersifat rahasia dan hanya digunakan untuk keperluan analisis.</p>

            <div class="left-steps">
                <div class="step-row active">
                    <div class="step-num">1</div>
                    <div class="step-label">Isi Data Responden</div>
                </div>
                <div class="step-row">
                    <div class="step-num">2</div>
                    <div class="step-label">Jawab 21 Pertanyaan</div>
                </div>
                <div class="step-row">
                    <div class="step-num">3</div>
                    <div class="step-label">Lihat Hasil Assessment</div>
                </div>
            </div>
        </div>

        <div class="left-footer">
            <p>Hasil assessment bukan diagnosis klinis resmi.<br>Konsultasikan ke profesional jika diperlukan.</p>
        </div>
    </div>

    <!-- ══ RIGHT PANEL ══ -->
    <div class="right-panel">
        <div style="max-width:640px;width:100%;margin:auto;">

            <!-- HEADER -->
            <div class="form-top">
                <span class="form-eyebrow">DASS-21 Respondent Form</span>
                <h1 class="form-title">Lengkapi Data Dirimu</h1>
                <p class="form-subtitle">Data digunakan untuk analisis assessment psikologis. Seluruh informasi bersifat rahasia dan aman.</p>
            </div>

            <!-- FORM -->
            <form action="{{ route('assessment.index') }}" method="POST">
                @csrf

                <!-- ANONYMOUS -->
                <label class="anon-box" for="anonymousCheck">
                    <div class="anon-icon"><i class="bi bi-incognito"></i></div>
                    <div class="anon-text">
                        <strong>Isi sebagai Anonymous</strong>
                        <small>Identitasmu tidak akan ditampilkan di hasil assessment</small>
                    </div>
                    <input class="anon-check" type="checkbox" id="anonymousCheck">
                </label>

                <!-- ── SEKSI 1: DATA PRIBADI ── -->
                <div class="fsec-title">Data Pribadi</div>
                <div class="row g-3 mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Nama Lengkap</label>
                        <input type="text" id="namaInput" name="nama_lengkap"
                               class="form-control" placeholder="Masukkan nama lengkap" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Jenis Kelamin</label>
                        <select name="jenis_kelamin" class="form-select" required>
                            <option value="">Pilih jenis kelamin</option>
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Universitas</label>
                        <input type="text" name="universitas"
                               class="form-control" placeholder="Nama universitas" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Program Studi</label>
                        <input type="text" name="prodi"
                               class="form-control" placeholder="Contoh: Teknik Informatika" required>
                    </div>
                </div>

                <!-- ── SEKSI 2: DATA AKADEMIK ── -->
                <div class="fsec-title mt-2">Data Akademik</div>
                <div class="row g-3 mb-3">
                    <div class="col-md-4">
                        <label class="form-label">Semester</label>
                        <select name="semester" class="form-select" required>
                            <option value="">Pilih semester</option>
                            <option value="Semester 7">Semester 7</option>
                            <option value="Semester 8">Semester 8</option>
                            <option value="Semester 9">Semester 9</option>
                            <option value="Semester 10">Semester 10</option>
                            <option value="Semester 11">Semester 11</option>
                            <option value="Semester 12">Semester 12</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Usia</label>
                        <input type="number" name="usia"
                               class="form-control" placeholder="Contoh: 22"
                               min="17" max="40" required>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Status Tugas Akhir</label>
                        <select name="status_ta" class="form-select" required>
                            <option value="">Pilih status</option>
                            <option value="SEMPRO">Seminar Proposal</option>
                            <option value="SEMHAS">Seminar Hasil</option>
                        </select>
                    </div>
                </div>

                <!-- ── SEKSI 3: KEBIASAAN ── -->
                <div class="fsec-title mt-2">Kebiasaan Sehari-hari</div>
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label">Rata-rata Jam Tidur per Malam</label>
                        <select name="jam_tidur" class="form-select" required>
                            <option value="">Pilih durasi tidur</option>
                            <option value="< 5 Jam">Kurang dari 5 jam</option>
                            <option value="5 - 6 Jam">5 – 6 jam</option>
                            <option value="7 - 8 Jam">7 – 8 jam</option>
                            <option value="> 8 Jam">Lebih dari 8 jam</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Apakah Kamu Sedang Bekerja?</label>
                        <select name="bekerja" class="form-select" required>
                            <option value="">Pilih status pekerjaan</option>
                            <option value="Ya">Ya, sedang bekerja</option>
                            <option value="Tidak">Tidak, fokus kuliah</option>
                        </select>
                    </div>
                </div>

                <!-- SUBMIT -->
                <button type="submit" class="btn-submit">
                    <i class="bi bi-arrow-right-circle-fill"></i>
                    Lanjut ke Assessment DASS-21
                </button>

            </form>
        </div>
    </div>

</div>

<script>
    const anonymousCheck = document.getElementById('anonymousCheck');
    const namaInput      = document.getElementById('namaInput');

    anonymousCheck.addEventListener('change', function () {
        if (this.checked) {
            namaInput.value = 'Anonymous';
            namaInput.setAttribute('readonly', true);
        } else {
            namaInput.value = '';
            namaInput.removeAttribute('readonly');
        }
    });
</script>

</body>
</html>