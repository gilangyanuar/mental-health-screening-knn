<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin | Sampai Tenang</title>
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
            --border:    #e2e8f0;
            --red:       #dc2626;
            --r-lg: 14px;
            --r-md: 10px;
            --r-sm: 8px;
        }
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body {
            font-family: 'Poppins', sans-serif;
            -webkit-font-smoothing: antialiased;
            min-height: 100vh;
            background: var(--off-white);
            color: var(--text-dark);
        }

        /* ── LAYOUT ── */
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
            width: 200px; height: 200px; border-radius: 50%;
            background: rgba(0,201,167,.05);
            top: -80px; right: -80px; pointer-events: none;
        }
        .left-panel::after {
            content: ""; position: absolute;
            width: 150px; height: 150px; border-radius: 50%;
            background: rgba(0,201,167,.04);
            bottom: -55px; left: -55px; pointer-events: none;
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
            font-size: 1.35rem; font-weight: 700; line-height: 1.3;
            color: var(--white); margin-bottom: .85rem;
        }
        .left-title em { font-style: italic; color: var(--teal); font-weight: 300; }
        .left-desc {
            font-size: .74rem; color: rgba(255,255,255,.42);
            line-height: 1.8; margin-bottom: 1.8rem;
        }

        /* Stat cards */
        .left-stats { display: flex; flex-direction: column; gap: .55rem; }
        .stat-card {
            display: flex; align-items: center; gap: .75rem;
            background: rgba(255,255,255,.06);
            border: 1px solid rgba(255,255,255,.08);
            border-radius: var(--r-lg); padding: .75rem .9rem;
        }
        .stat-icon {
            width: 32px; height: 32px; border-radius: 8px;
            display: flex; align-items: center; justify-content: center;
            font-size: .85rem; flex-shrink: 0;
        }
        .stat-icon.teal  { background: rgba(0,201,167,.15); color: var(--teal); }
        .stat-icon.blue  { background: rgba(99,179,237,.15); color: #63b3ed; }
        .stat-icon.green { background: rgba(72,187,120,.15); color: #48bb78; }
        .stat-label { font-size: .6rem; font-weight: 700; text-transform: uppercase; letter-spacing: .08em; color: rgba(255,255,255,.35); display: block; margin-bottom: .15rem; }
        .stat-value { font-size: .75rem; font-weight: 600; color: var(--white); line-height: 1.4; }

        .left-footer { position: relative; z-index: 1; }
        .left-footer p { font-size: .67rem; color: rgba(255,255,255,.28); line-height: 1.7; }

        /* ── RIGHT PANEL ── */
        .right-panel {
            flex: 1; background: var(--off-white);
            display: flex; align-items: center; justify-content: center;
            padding: 3rem 5rem; overflow-y: auto;
        }
        .form-box { width: 100%; max-width: 480px; }

        /* Form header */
        .form-eyebrow {
            font-size: .6rem; font-weight: 700; letter-spacing: .2em;
            text-transform: uppercase; color: var(--teal-mid);
            display: flex; align-items: center; gap: .45rem;
            margin-bottom: .65rem;
        }
        .form-eyebrow::before {
            content: ""; display: inline-block;
            width: 16px; height: 1.5px;
            background: var(--teal-mid); border-radius: 2px;
        }
        .form-title {
            font-size: 2.2rem; font-weight: 700; color: var(--text-dark);
            margin-bottom: .35rem; line-height: 1.2;
        }
        .form-subtitle {
            font-size: .88rem; color: var(--text-muted);
            line-height: 1.6; margin-bottom: 2.2rem;
        }

        /* Error */
        .alert-error {
            background: #fff5f5; border: 1px solid rgba(220,38,38,.18);
            border-left: 3px solid var(--red);
            border-radius: var(--r-sm); padding: .8rem 1rem;
            display: flex; align-items: flex-start; gap: .6rem;
            margin-bottom: 1.4rem;
        }
        .alert-error i { color: var(--red); font-size: .9rem; margin-top: 2px; flex-shrink: 0; }
        .alert-error p { font-size: .82rem; color: #7f1d1d; margin: 0; line-height: 1.6; }

        /* Section label */
        .fsec {
            font-size: .6rem; font-weight: 700; letter-spacing: .18em;
            text-transform: uppercase; color: var(--text-muted);
            display: flex; align-items: center; gap: .55rem; margin-bottom: 1.1rem;
        }
        .fsec::after { content: ""; flex: 1; height: 1px; background: var(--border); }

        /* Inputs */
        .form-label {
            font-weight: 500; font-size: .82rem;
            color: var(--text-dark); margin-bottom: .38rem; display: block;
        }
        .input-wrap { position: relative; }
        .input-icon {
            position: absolute; left: .95rem; top: 50%;
            transform: translateY(-50%);
            color: var(--text-muted); font-size: .9rem;
            pointer-events: none; z-index: 2;
        }
        .form-control {
            border-radius: var(--r-md); height: 54px;
            border: 1.5px solid var(--border);
            padding: 0 1rem 0 2.6rem;
            font-size: .88rem; font-family: 'Poppins', sans-serif;
            color: var(--text-dark); background: var(--white);
            width: 100%; transition: border-color .2s, box-shadow .2s;
            display: block;
        }
        .form-control:focus {
            border-color: var(--teal);
            box-shadow: 0 0 0 3px rgba(0,201,167,.1);
            outline: none;
        }
        .form-control::placeholder { color: var(--text-muted); font-size: .84rem; }
        .form-control.is-error { border-color: var(--red); }

        .toggle-pass {
            position: absolute; right: .9rem; top: 50%; transform: translateY(-50%);
            color: var(--text-muted); font-size: .9rem;
            cursor: pointer; background: none; border: none; padding: 0; z-index: 2;
            transition: color .2s;
        }
        .toggle-pass:hover { color: var(--text-dark); }

        .error-msg {
            font-size: .75rem; color: var(--red); margin-top: .35rem;
            display: flex; align-items: center; gap: .3rem;
        }

        /* Submit */
        .btn-submit {
            width: 100%;
            background: var(--navy); color: var(--white); border: none;
            border-radius: var(--r-md); height: 56px;
            font-weight: 600; font-size: .92rem;
            font-family: 'Poppins', sans-serif;
            display: flex; align-items: center; justify-content: center; gap: .5rem;
            cursor: pointer; transition: background .2s, transform .15s;
            margin-top: 1.5rem;
        }
        .btn-submit:hover { background: #0d2540; transform: translateY(-1px); }

        /* Back link */
        .back-link {
            display: flex; align-items: center; justify-content: center;
            gap: .35rem; margin-top: 1.2rem;
            color: var(--text-muted); font-size: .82rem; font-weight: 500;
            text-decoration: none; transition: color .2s;
        }
        .back-link:hover { color: var(--text-dark); }

        @media(max-width: 991px) {
            .left-panel { display: none; }
            .right-panel { padding: 2.5rem 2rem; }
        }
        @media(max-width: 576px) {
            .right-panel { padding: 2rem 1.2rem; }
            .form-title { font-size: 1.6rem; }
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
            <div class="left-badge"><span class="ldot"></span>Admin Panel</div>
            <h2 class="left-title">Dashboard <em>Pengelolaan</em> Assessment</h2>
            <p class="left-desc">Login untuk mengakses data assessment mahasiswa, melihat hasil analisis, dan mengelola sistem DASS-21 berbasis KNN.</p>

            <div class="left-stats">
                <div class="stat-card">
                    <div class="stat-icon teal"><i class="bi bi-shield-lock-fill"></i></div>
                    <div>
                        <span class="stat-label">Akses</span>
                        <span class="stat-value">Khusus Administrator</span>
                    </div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon blue"><i class="bi bi-cpu-fill"></i></div>
                    <div>
                        <span class="stat-label">Metode Klasifikasi</span>
                        <span class="stat-value">K-Nearest Neighbor (KNN)</span>
                    </div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon green"><i class="bi bi-clipboard2-pulse-fill"></i></div>
                    <div>
                        <span class="stat-label">Instrumen</span>
                        <span class="stat-value">DASS-21 Terstandarisasi</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="left-footer">
            <p>Akses terbatas untuk admin yang berwenang.<br>Hubungi pengelola jika ada kendala login.</p>
        </div>
    </div>

    <!-- RIGHT -->
    <div class="right-panel">
        <div class="form-box">

            <div class="form-eyebrow">Administrator</div>
            <h1 class="form-title">Masuk ke Dashboard</h1>
            <p class="form-subtitle">Gunakan kredensial admin untuk mengakses sistem.</p>

            @if(session('error'))
            <div class="alert-error">
                <i class="bi bi-exclamation-circle-fill"></i>
                <p>{{ session('error') }}</p>
            </div>
            @endif

            @if($errors->any())
            <div class="alert-error">
                <i class="bi bi-exclamation-circle-fill"></i>
                <p>{{ $errors->first() }}</p>
            </div>
            @endif

            <form action="{{ route('login', [], false) }}" method="POST">
                @csrf

                <div class="fsec">Kredensial Login</div>

                <!-- EMAIL -->
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <div class="input-wrap">
                        <i class="bi bi-envelope input-icon"></i>
                        <input type="email" name="email" value="{{ old('email') }}"
                            class="form-control @error('email') is-error @enderror"
                            placeholder="Masukkan email" required>
                    </div>
                    @error('email')
                    <div class="error-msg"><i class="bi bi-exclamation-circle" style="font-size:.72rem;"></i>{{ $message }}</div>
                    @enderror
                </div>

                <!-- PASSWORD -->
                <div class="mb-1">
                    <label class="form-label">Password</label>
                    <div class="input-wrap">
                        <i class="bi bi-lock input-icon"></i>
                        <input type="password" name="password" id="passInput"
                            class="form-control @error('password') is-error @enderror"
                            placeholder="Masukkan password" required>
                        <button type="button" class="toggle-pass" id="togglePass">
                            <i class="bi bi-eye" id="toggleIcon"></i>
                        </button>
                    </div>
                    @error('password')
                    <div class="error-msg"><i class="bi bi-exclamation-circle" style="font-size:.72rem;"></i>{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn-submit">
                    <i class=""></i>
                    Masuk Dashboard
                </button>
            </form>

            <a href="/" class="back-link">
                <i class="bi bi-chevron-left" style="font-size:.75rem;"></i>
                Kembali ke Beranda
            </a>
        </div>
    </div>
</div>

<script>
const passInput  = document.getElementById('passInput');
const togglePass = document.getElementById('togglePass');
const toggleIcon = document.getElementById('toggleIcon');
togglePass.addEventListener('click', function() {
    const isPass = passInput.type === 'password';
    passInput.type = isPass ? 'text' : 'password';
    toggleIcon.className = isPass ? 'bi bi-eye-slash' : 'bi bi-eye';
});
</script>
</body>
</html>