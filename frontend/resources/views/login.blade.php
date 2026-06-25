<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin | DASS-21</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        :root {
            --blue-dark:   #0f1f6e;
            --blue-main:   #1b3afe;
            --blue-light:  #e8eeff;
            --blue-soft:   #f0f4ff;
            --text-dark:   #0d1540;
            --text-mid:    #4a5480;
            --text-light:  #8892b8;
            --white:       #ffffff;
            --bg:          #f4f7fe;
            --radius-lg:   28px;
            --radius-md:   18px;
            --radius-sm:   12px;
            --shadow-lg:   0 40px 100px rgba(15,31,110,.10);
            --shadow-md:   0 20px 50px rgba(15,31,110,.07);
        }

        * { box-sizing: border-box; }

        body {
            background: var(--bg);
            font-family: 'Poppins', sans-serif;
            color: var(--text-dark);
            min-height: 100vh;
            -webkit-font-smoothing: antialiased;
        }

        /* ==================== PAGE WRAPPER ==================== */

        .page-wrapper {
            display: flex;
            min-height: 100vh;
        }

        /* ==================== LEFT PANEL ==================== */

        .left-panel {
            width: 420px;
            flex-shrink: 0;
            background: linear-gradient(160deg, var(--blue-dark) 0%, var(--blue-main) 100%);
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
            width: 300px; height: 300px;
            border-radius: 50%;
            background: rgba(255,255,255,.05);
            top: -100px; right: -100px;
        }

        .left-panel::after {
            content: "";
            position: absolute;
            width: 200px; height: 200px;
            border-radius: 50%;
            background: rgba(255,255,255,.04);
            bottom: -60px; left: -60px;
        }

        .left-brand {
            display: flex;
            align-items: center;
            gap: .6rem;
            color: white;
            font-weight: 700;
            font-size: 1.1rem;
            text-decoration: none;
            position: relative;
            z-index: 1;
        }

        .left-brand .brand-dot {
            width: 8px; height: 8px;
            border-radius: 50%;
            background: rgba(255,255,255,.7);
        }

        .left-content {
            position: relative;
            z-index: 1;
        }

        .left-badge {
            display: inline-flex;
            align-items: center;
            gap: .5rem;
            background: rgba(255,255,255,.12);
            color: rgba(255,255,255,.9);
            font-size: .75rem;
            font-weight: 700;
            letter-spacing: .18em;
            text-transform: uppercase;
            padding: .45rem 1rem;
            border-radius: 30px;
            margin-bottom: 1.5rem;
        }

        .left-badge .dot {
            width: 6px; height: 6px;
            border-radius: 50%;
            background: #7fffb0;
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0%,100% { opacity:1; transform:scale(1); }
            50% { opacity:.4; transform:scale(1.5); }
        }

        .left-title {
            font-family: 'Poppins', sans-serif;
            font-size: 2.2rem;
            color: white;
            line-height: 1.2;
            margin-bottom: 1.2rem;
        }

        .left-title em {
            font-style: italic;
            color: rgba(255,255,255,.75);
        }

        .left-desc {
            color: rgba(255,255,255,.7);
            font-size: .9rem;
            line-height: 1.85;
            margin-bottom: 2rem;
        }

        /* Stats */
        .left-stats {
            display: flex;
            flex-direction: column;
            gap: .75rem;
        }

        .left-stat-item {
            display: flex;
            align-items: center;
            gap: .9rem;
            background: rgba(255,255,255,.08);
            border-radius: 14px;
            padding: .9rem 1.1rem;
        }

        .left-stat-icon {
            width: 36px; height: 36px;
            border-radius: 10px;
            background: rgba(255,255,255,.15);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1rem;
            flex-shrink: 0;
        }

        .left-stat-text small {
            display: block;
            font-size: .72rem;
            color: rgba(255,255,255,.55);
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: .08em;
        }

        .left-stat-text strong {
            font-size: .92rem;
            color: white;
            font-weight: 600;
        }

        .left-footer {
            position: relative;
            z-index: 1;
        }

        .left-footer p {
            color: rgba(255,255,255,.4);
            font-size: .77rem;
            line-height: 1.7;
            margin: 0;
        }

        /* ==================== RIGHT PANEL ==================== */

        .right-panel {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 3rem 3.5rem;
            overflow-y: auto;
        }

        .form-box {
            width: 100%;
            max-width: 440px;
        }

        /* ==================== FORM HEADER ==================== */

        .form-header {
            margin-bottom: 2.5rem;
        }

        .form-header-label {
            display: inline-block;
            background: var(--blue-light);
            color: var(--blue-main);
            font-size: .72rem;
            font-weight: 700;
            letter-spacing: .2em;
            text-transform: uppercase;
            padding: .35rem .85rem;
            border-radius: 30px;
            margin-bottom: .9rem;
        }

        .form-header h1 {
            font-family: 'Poppins', sans-serif;
            font-size: 2rem;
            color: var(--text-dark);
            margin-bottom: .4rem;
            line-height: 1.2;
        }

        .form-header p {
            color: var(--text-mid);
            font-size: .9rem;
            margin: 0;
            line-height: 1.6;
        }

        /* ==================== ALERT ==================== */

        .alert-error {
            background: #fff0f0;
            border: 1px solid rgba(220,38,38,.2);
            border-left: 4px solid #dc2626;
            border-radius: var(--radius-sm);
            padding: .9rem 1.1rem;
            display: flex;
            align-items: flex-start;
            gap: .7rem;
            margin-bottom: 1.5rem;
        }

        .alert-error i {
            color: #dc2626;
            font-size: 1rem;
            margin-top: 1px;
            flex-shrink: 0;
        }

        .alert-error p {
            font-size: .87rem;
            color: #991b1b;
            margin: 0;
            line-height: 1.6;
        }

        /* ==================== FORM ELEMENTS ==================== */

        .form-section-title {
            font-size: .72rem;
            font-weight: 700;
            letter-spacing: .18em;
            text-transform: uppercase;
            color: var(--text-light);
            margin-bottom: 1.2rem;
            display: flex;
            align-items: center;
            gap: .6rem;
        }

        .form-section-title::after {
            content: "";
            flex: 1;
            height: 1px;
            background: rgba(27,58,254,.1);
        }

        .form-label {
            font-weight: 600;
            font-size: .85rem;
            color: var(--text-dark);
            margin-bottom: .5rem;
        }

        .input-wrap {
            position: relative;
        }

        .input-icon {
            position: absolute;
            left: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: var(--text-light);
            font-size: 1rem;
            pointer-events: none;
            z-index: 2;
        }

        .form-control {
            border-radius: var(--radius-sm);
            min-height: 52px;
            border: 1.5px solid #dce5ff;
            padding: .7rem 1rem .7rem 2.8rem;
            font-size: .92rem;
            font-family: 'Poppins', sans-serif;
            color: var(--text-dark);
            background: var(--white);
            transition: border-color .2s, box-shadow .2s;
            width: 100%;
        }

        .form-control:focus {
            border-color: var(--blue-main);
            box-shadow: 0 0 0 3px rgba(27,58,254,.08);
            outline: none;
        }

        .form-control::placeholder { color: var(--text-light); }

        .form-control.input-error { border-color: #dc2626; }

        .error-text {
            font-size: .8rem;
            color: #dc2626;
            margin-top: .4rem;
            display: flex;
            align-items: center;
            gap: .3rem;
        }

        /* Toggle password */
        .toggle-pass {
            position: absolute;
            right: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: var(--text-light);
            font-size: 1rem;
            cursor: pointer;
            background: none;
            border: none;
            padding: 0;
            z-index: 2;
            transition: color .2s;
        }

        .toggle-pass:hover { color: var(--blue-main); }

        /* ==================== SUBMIT BUTTON ==================== */

        .btn-submit {
            width: 100%;
            background: var(--blue-main);
            color: white;
            border: none;
            border-radius: var(--radius-sm);
            padding: 1rem;
            font-weight: 700;
            font-size: 1rem;
            font-family: 'Poppins', sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: .6rem;
            transition: background .2s, transform .2s, box-shadow .2s;
            box-shadow: 0 8px 24px rgba(27,58,254,.28);
            cursor: pointer;
            margin-top: 1.8rem;
        }

        .btn-submit:hover {
            background: #1228dd;
            transform: translateY(-2px);
            box-shadow: 0 14px 32px rgba(27,58,254,.35);
        }

        .btn-submit:active { transform: translateY(0); }

        /* Back link */
        .back-link {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: .4rem;
            margin-top: 1.5rem;
            color: var(--text-mid);
            font-size: .87rem;
            text-decoration: none;
            font-weight: 500;
            transition: color .2s;
        }

        .back-link:hover { color: var(--blue-main); }

        /* ==================== RESPONSIVE ==================== */

        @media(max-width: 991px) {
            .left-panel { display: none; }
            .right-panel { padding: 2.5rem 2rem; }
        }

        @media(max-width: 576px) {
            .right-panel { padding: 2rem 1.2rem; }
            .form-header h1 { font-size: 1.7rem; }
        }
    </style>
</head>
<body>

<div class="page-wrapper">

    <!-- ==================== LEFT PANEL ==================== -->
    <div class="left-panel">

        <a href="/" class="left-brand">
            <span class="brand-dot"></span>
            Sampai Tenang
        </a>

        <div class="left-content">

            <div class="left-badge">
                <span class="dot"></span>
                Admin Panel
            </div>

            <h2 class="left-title">
                Dashboard <em>Pengelolaan</em> Assessment
            </h2>

            <p class="left-desc">
                Login untuk mengakses data assessment mahasiswa, melihat hasil analisis,
                dan mengelola sistem DASS-21 berbasis KNN.
            </p>

            <div class="left-stats">

                <div class="left-stat-item">
                    <div class="left-stat-icon">
                        <i class="bi bi-shield-lock-fill"></i>
                    </div>
                    <div class="left-stat-text">
                        <small>Akses</small>
                        <strong>Khusus Administrator</strong>
                    </div>
                </div>

                <div class="left-stat-item">
                    <div class="left-stat-icon">
                        <i class="bi bi-cpu-fill"></i>
                    </div>
                    <div class="left-stat-text">
                        <small>Metode Klasifikasi</small>
                        <strong>K-Nearest Neighbor (KNN)</strong>
                    </div>
                </div>

                <div class="left-stat-item">
                    <div class="left-stat-icon">
                        <i class="bi bi-clipboard2-pulse-fill"></i>
                    </div>
                    <div class="left-stat-text">
                        <small>Instrumen</small>
                        <strong>DASS-21 Terstandarisasi</strong>
                    </div>
                </div>

            </div>

        </div>

        <div class="left-footer">
            <p>
                Akses terbatas untuk admin yang berwenang.<br>
                Hubungi peneliti jika lupa kredensial login.
            </p>
        </div>

    </div>

    <!-- ==================== RIGHT PANEL ==================== -->
    <div class="right-panel">

        <div class="form-box">

            <!-- HEADER -->
            <div class="form-header">
                <span class="form-header-label">Administrator</span>
                <h1>Masuk ke Dashboard</h1>
                <p>Gunakan kredensial admin untuk mengakses sistem.</p>
            </div>

            <!-- ERROR GLOBAL -->
            @if(session('error'))
                <div class="alert-error">
                    <i class="bi bi-exclamation-circle-fill"></i>
                    <p>{{ session('error') }}</p>
                </div>
            @endif

            <!-- ERROR VALIDASI -->
            @if($errors->any())
                <div class="alert-error">
                    <i class="bi bi-exclamation-circle-fill"></i>
                    <p>{{ $errors->first() }}</p>
                </div>
            @endif

            <!-- FORM -->
            <form action="{{ route('login', [], false) }}" method="POST">
                @csrf

                <div class="form-section-title">Kredensial Login</div>

                <!-- EMAIL -->
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <div class="input-wrap">
                        <i class="bi bi-envelope-fill input-icon"></i>
                        <input
                            type="email"
                            name="email"
                            value="{{ old('email') }}"
                            class="form-control @error('email') input-error @enderror"
                            placeholder="Masukkan email"
                            required
                        >
                    </div>
                    @error('email')
                        <div class="error-text">
                            <i class="bi bi-exclamation-circle" style="font-size:.75rem;"></i>
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <!-- PASSWORD -->
                <div class="mb-1">
                    <label class="form-label">Password</label>
                    <div class="input-wrap">
                        <i class="bi bi-lock-fill input-icon"></i>
                        <input
                            type="password"
                            name="password"
                            id="passwordInput"
                            class="form-control @error('password') input-error @enderror"
                            placeholder="Masukkan password"
                            required
                        >
                        <button type="button" class="toggle-pass" id="togglePass" aria-label="Tampilkan password">
                            <i class="bi bi-eye-fill" id="toggleIcon"></i>
                        </button>
                    </div>
                    @error('password')
                        <div class="error-text">
                            <i class="bi bi-exclamation-circle" style="font-size:.75rem;"></i>
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <!-- SUBMIT -->
                <button type="submit" class="btn-submit">
                    <i class="bi bi-box-arrow-in-right"></i>
                    Masuk Dashboard
                </button>

            </form>

            <a href="/" class="back-link">
                <i class="bi bi-arrow-left"></i>
                Kembali ke Beranda
            </a>

        </div>

    </div>

</div>

<script>
    const togglePass = document.getElementById('togglePass');
    const passwordInput = document.getElementById('passwordInput');
    const toggleIcon = document.getElementById('toggleIcon');

    togglePass.addEventListener('click', function () {
        const isPass = passwordInput.type === 'password';
        passwordInput.type = isPass ? 'text' : 'password';
        toggleIcon.className = isPass ? 'bi bi-eye-slash-fill' : 'bi bi-eye-fill';
    });
</script>

</body>
</html>
