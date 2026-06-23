<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DASS-21 — Assessment Kesehatan Mental Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        :root {
            --navy: #0f1f6e;
            --blue: #1b3afe;
            --blue-mid: #5f7cff;
            --blue-light: #e8eeff;
            --blue-soft: #f0f4ff;
            --green: #059669;
            --amber: #d97706;
            --text-1: #0d1540;
            --text-2: #4a5480;
            --text-3: #8892b8;
            --r-xl: 28px; --r-lg: 20px; --r-md: 14px; --r-sm: 10px;
            --shadow-lg: 0 32px 80px rgba(15,31,110,.13);
            --shadow-md: 0 16px 48px rgba(15,31,110,.09);
            --shadow-sm: 0 6px 20px rgba(15,31,110,.06);
        }
        * { box-sizing: border-box; margin: 0; padding: 0; }
        html { scroll-behavior: smooth; }

        /* ══════════════════════════════════════
           BACKGROUND
        ══════════════════════════════════════ */
        body {
            font-family: 'Poppins', sans-serif;
            color: var(--text-1);
            -webkit-font-smoothing: antialiased;
            overflow-x: hidden;
            background-color: #edf0fb;
        }
        /* Layer dot pattern di atas semua section putih */
        body::before {
            content: "";
            position: fixed;
            inset: 0;
            z-index: -1;
            background-image: radial-gradient(circle, rgba(27,58,254,.22) 1.5px, transparent 1.5px);
            background-size: 26px 26px;
            background-color: #edf0fb;
            pointer-events: none;
        }

        /* ══════════════════════════════════════
           NAVBAR — sticky, selalu nempel atas
        ══════════════════════════════════════ */
        .navbar-wrap {
            background: rgba(255,255,255,.97);
            border-bottom: 2px solid #e8eeff;
            box-shadow: 0 2px 18px rgba(15,31,110,.09);
            position: -webkit-sticky;
            position: sticky;
            top: 0;
            z-index: 9999;
        }
        .navbar-inner {
            height: 68px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .nav-brand {
            display: flex; align-items: center; gap: .65rem;
            text-decoration: none;
        }
        .nav-brand-icon {
            width: 42px; height: 42px; border-radius: 11px;
            background: var(--blue);
            display: flex; align-items: center; justify-content: center;
            color: white; font-size: 1.1rem;
            box-shadow: 0 4px 14px rgba(27,58,254,.35);
            flex-shrink: 0;
        }
        .nav-brand-text { font-weight: 700; font-size: 1.15rem; color: var(--navy); line-height: 1.1; }
        .nav-brand-sub  { font-size: .66rem; color: var(--text-3); font-weight: 500; }
        .nav-links {
            display: flex; align-items: center;
            gap: 2rem; list-style: none;
        }
        .nav-links a {
            color: var(--text-2); text-decoration: none;
            font-size: .9rem; font-weight: 500;
            transition: color .2s;
        }
        .nav-links a:hover { color: var(--blue); }
        /* ── tombol Login Admin — kotak biru dengan padding seimbang ── */
        .btn-nav {
            display: inline-flex;
            align-items: center;
            background: var(--blue);
            color: #fff !important;
            padding: .55rem 1.4rem;
            border-radius: var(--r-sm);
            font-weight: 600;
            font-size: .88rem;
            text-decoration: none;
            white-space: nowrap;
            box-shadow: 0 4px 14px rgba(27,58,254,.3);
            transition: background .2s, transform .2s, box-shadow .2s;
            line-height: 1;
        }
        .btn-nav:hover {
            background: #1228dd;
            transform: translateY(-1px);
            box-shadow: 0 8px 22px rgba(27,58,254,.42);
            color: #fff !important;
        }

        /* ══════════════════════════════════════
           HERO — proporsional seperti Novena
        ══════════════════════════════════════ */
        .hero-section {
            position: relative;
            height: 70vh;
            min-height: 460px;
            max-height: 660px;
            display: flex; align-items: center;
            overflow: hidden;
        }
        .hero-bg { position: absolute; inset: 0; z-index: 0; }
        .hero-bg img {
            width: 100%; height: 100%;
            object-fit: cover; object-position: center 30%;
            display: block;
        }
        .hero-bg::after {
            content: ""; position: absolute; inset: 0;
            background: linear-gradient(
                108deg,
                rgba(9,17,57,.92) 0%,
                rgba(9,17,57,.76) 38%,
                rgba(9,17,57,.28) 64%,
                transparent 100%
            );
        }
        .hero-content {
            position: relative; z-index: 1;
            max-width: 560px;
        }
        .hero-eyebrow {
            display: inline-flex; align-items: center; gap: .5rem;
            font-size: .7rem; font-weight: 700; letter-spacing: .22em;
            text-transform: uppercase; color: rgba(255,255,255,.6);
            margin-bottom: 1rem;
        }
        .hero-eyebrow::before {
            content: ""; width: 24px; height: 2px;
            background: var(--blue-mid); border-radius: 2px; flex-shrink: 0;
        }
        .hero-title {
            font-family: 'Poppins', sans-serif;
            font-size: 2.9rem; line-height: 1.1;
            color: white; margin-bottom: 1rem;
        }
        .hero-title em { font-style: italic; color: var(--blue-mid); }
        .hero-desc {
            color: rgba(255,255,255,.70); line-height: 1.8;
            font-size: .95rem; margin-bottom: 1.8rem; max-width: 450px;
        }
        .hero-actions { display: flex; align-items: center; gap: .85rem; flex-wrap: wrap; }
        .btn-primary-hero {
            display: inline-flex; align-items: center; gap: .55rem;
            background: var(--blue); color: white;
            padding: .88rem 1.9rem; border-radius: var(--r-sm);
            font-weight: 700; font-size: .95rem; text-decoration: none;
            transition: all .2s; box-shadow: 0 8px 24px rgba(27,58,254,.45);
        }
        .btn-primary-hero:hover { background: #1228dd; transform: translateY(-2px); color: white; }
        .btn-outline-hero {
            display: inline-flex; align-items: center; gap: .55rem;
            background: rgba(255,255,255,.1); color: white;
            border: 1.5px solid rgba(255,255,255,.3);
            padding: .88rem 1.6rem; border-radius: var(--r-sm);
            font-weight: 600; font-size: .95rem; text-decoration: none;
            transition: all .2s;
        }
        .btn-outline-hero:hover { background: rgba(255,255,255,.18); border-color: rgba(255,255,255,.5); color: white; }

        /* ══════════════════════════════════════
           INFO CARDS — overlap bawah hero
        ══════════════════════════════════════ */
        .info-cards-wrap { position: relative; z-index: 2; margin-top: -56px; }
        .info-card {
            background: white; border-radius: var(--r-xl);
            padding: 1.8rem;
            box-shadow: 0 20px 60px rgba(15,31,110,.14), 0 0 0 1px rgba(27,58,254,.05);
            height: 100%; display: flex; flex-direction: column;
            border-top: 4px solid transparent;
            transition: transform .25s, box-shadow .25s;
        }
        .info-card:hover { transform: translateY(-4px); box-shadow: 0 28px 68px rgba(15,31,110,.17); }
        .ic-1 { border-top-color: var(--blue); }
        .ic-2 { border-top-color: var(--amber); }
        .ic-3 { border-top-color: var(--green); }
        .ic-icon { width: 48px; height: 48px; border-radius: 13px; display: flex; align-items: center; justify-content: center; font-size: 1.2rem; margin-bottom: 1rem; }
        .ic-1 .ic-icon { background: var(--blue-light); color: var(--blue); }
        .ic-2 .ic-icon { background: #fef3c7; color: var(--amber); }
        .ic-3 .ic-icon { background: #d1fae5; color: var(--green); }
        .ic-label { font-size: .68rem; font-weight: 700; letter-spacing: .12em; text-transform: uppercase; color: var(--text-3); margin-bottom: .25rem; }
        .ic-value { font-family: 'Poppins', sans-serif; font-size: 1.5rem; color: var(--text-1); margin-bottom: .4rem; line-height: 1.1; }
        .ic-desc { color: var(--text-2); font-size: .83rem; line-height: 1.65; margin: 0; }

        /* ══════════════════════════════════════
           SECTIONS — bergantian putih & soft
        ══════════════════════════════════════ */
        .sec-white { background: white; }
        .sec-soft  { background: var(--blue-soft); }
        .sec-py    { padding: 5.5rem 0; }

        .sec-label {
            display: inline-block; background: var(--blue-light); color: var(--blue);
            font-size: .7rem; font-weight: 700; letter-spacing: .2em;
            text-transform: uppercase; padding: .35rem .88rem; border-radius: 30px; margin-bottom: .9rem;
        }
        .sec-title { font-family: 'Poppins', sans-serif; font-size: 2.1rem; color: var(--text-1); margin-bottom: .9rem; line-height: 1.22; }
        .sec-sub   { color: var(--text-2); font-size: .93rem; line-height: 1.8; max-width: 540px; }

        /* ══════════════════════════════════════
           ABOUT
        ══════════════════════════════════════ */
        .about-photo { border-radius: var(--r-xl); overflow: hidden; box-shadow: var(--shadow-md); height: 100%; min-height: 420px; }
        .about-photo img { width: 100%; height: 100%; object-fit: cover; display: block; }
        .about-stat { display: flex; flex-direction: column; gap: .85rem; margin-top: 2rem; }
        .astat { display: flex; align-items: center; gap: .9rem; background: var(--blue-soft); border-radius: var(--r-lg); padding: .9rem 1.2rem; border: 1px solid rgba(27,58,254,.08); }
        .astat-icon { width: 42px; height: 42px; border-radius: 11px; background: var(--blue-light); color: var(--blue); display: flex; align-items: center; justify-content: center; font-size: 1rem; flex-shrink: 0; }
        .astat-val { font-size: .97rem; font-weight: 700; color: var(--text-1); }
        .astat-lbl { font-size: .78rem; color: var(--text-3); margin-top: 1px; }

        /* ══════════════════════════════════════
           FEATURE CARDS
        ══════════════════════════════════════ */
        .feature-card {
            background: white; border: 1px solid rgba(27,58,254,.07);
            border-radius: var(--r-xl); padding: 1.8rem; height: 100%;
            transition: transform .25s, box-shadow .25s; position: relative; overflow: hidden;
        }
        .feature-card::after { content: ""; position: absolute; width: 120px; height: 120px; border-radius: 50%; bottom: -40px; right: -40px; pointer-events: none; }
        .fc-s::after { background: radial-gradient(circle, rgba(217,119,6,.09), transparent 70%); }
        .fc-a::after { background: radial-gradient(circle, rgba(27,58,254,.09), transparent 70%); }
        .fc-d::after { background: radial-gradient(circle, rgba(220,38,38,.07), transparent 70%); }
        .feature-card:hover { transform: translateY(-6px); box-shadow: var(--shadow-md); }
        .feat-icon { width: 52px; height: 52px; border-radius: 15px; display: flex; align-items: center; justify-content: center; font-size: 1.3rem; margin-bottom: 1.2rem; }
        .fi-s { background: #fef3c7; color: #d97706; }
        .fi-a { background: var(--blue-light); color: var(--blue); }
        .fi-d { background: #fee2e2; color: #dc2626; }
        .feature-card h5 { font-weight: 700; color: var(--text-1); margin-bottom: .5rem; font-size: .97rem; }
        .feature-card p  { color: var(--text-2); font-size: .87rem; line-height: 1.78; margin: 0; }

        /* ══════════════════════════════════════
           STEPS
        ══════════════════════════════════════ */
        .steps-box { background: white; border-radius: var(--r-xl); padding: 2.8rem; border: 1px solid rgba(27,58,254,.07); box-shadow: var(--shadow-sm); }
        .step-item { display: flex; gap: 1.2rem; padding: 1.2rem 0; border-bottom: 1px solid rgba(27,58,254,.07); }
        .step-item:last-child { border-bottom: none; padding-bottom: 0; }
        .step-num { width: 42px; height: 42px; border-radius: 11px; background: var(--blue); color: white; display: flex; align-items: center; justify-content: center; font-weight: 700; font-size: 1rem; flex-shrink: 0; box-shadow: 0 6px 16px rgba(27,58,254,.3); }
        .step-title { font-weight: 700; color: var(--text-1); font-size: .95rem; margin-bottom: .25rem; }
        .step-desc  { color: var(--text-2); font-size: .86rem; line-height: 1.72; margin: 0; }

        /* ══════════════════════════════════════
           CTA
        ══════════════════════════════════════ */
        .cta-section {
            background: linear-gradient(135deg, var(--navy) 0%, #1b3afe 100%);
            border-radius: var(--r-xl); padding: 4.5rem 4rem; text-align: center;
            position: relative; overflow: hidden;
            box-shadow: 0 28px 72px rgba(15,31,110,.22);
        }
        .cta-section::before { content: ""; position: absolute; width: 380px; height: 380px; border-radius: 50%; background: rgba(255,255,255,.04); top: -160px; right: -110px; }
        .cta-section::after  { content: ""; position: absolute; width: 280px; height: 280px; border-radius: 50%; background: rgba(255,255,255,.03); bottom: -110px; left: -70px; }
        .cta-section h2 { font-family: 'Poppins', sans-serif; font-size: 2.4rem; color: white; margin-bottom: 1rem; position: relative; z-index: 1; }
        .cta-section p  { color: rgba(255,255,255,.70); max-width: 480px; margin: 0 auto 2.2rem; line-height: 1.8; font-size: .93rem; position: relative; z-index: 1; }
        .btn-cta-white {
            display: inline-flex; align-items: center; gap: .55rem;
            background: white; color: var(--navy);
            padding: 1rem 2.2rem; border-radius: var(--r-sm);
            font-weight: 700; font-size: .97rem; text-decoration: none;
            position: relative; z-index: 1;
            box-shadow: 0 10px 32px rgba(0,0,0,.2);
            transition: transform .2s, box-shadow .2s;
        }
        .btn-cta-white:hover { transform: translateY(-2px); box-shadow: 0 16px 40px rgba(0,0,0,.28); color: var(--navy); }

        /* ══════════════════════════════════════
           FAQ
        ══════════════════════════════════════ */
        .faq-item { border: 1px solid rgba(27,58,254,.09) !important; border-radius: var(--r-lg) !important; overflow: hidden; margin-bottom: .65rem; box-shadow: none !important; background: white; }
        .accordion-button { font-weight: 600; color: var(--text-1); font-size: .92rem; background: white; padding: 1.1rem 1.4rem; }
        .accordion-button:not(.collapsed) { background: var(--blue-soft); color: var(--blue); box-shadow: none; }
        .accordion-button:focus { box-shadow: none; }
        .accordion-body { color: var(--text-2); line-height: 1.78; font-size: .87rem; padding: .9rem 1.4rem 1.3rem; background: var(--blue-soft); }

        /* ══════════════════════════════════════
           FOOTER
        ══════════════════════════════════════ */
        .footer-section { background: var(--navy); padding: 4rem 0 0; }
        .footer-brand-row  { display: flex; align-items: center; gap: .6rem; margin-bottom: .9rem; }
        .footer-brand-icon { width: 36px; height: 36px; border-radius: 9px; background: var(--blue); display: flex; align-items: center; justify-content: center; color: white; font-size: .92rem; }
        .footer-brand-name { font-weight: 700; color: white; font-size: 1.05rem; }
        .footer-desc { color: rgba(255,255,255,.32); font-size: .82rem; line-height: 1.72; }
        .footer-heading { font-weight: 700; color: rgba(255,255,255,.45); font-size: .7rem; letter-spacing: .15em; text-transform: uppercase; margin-bottom: 1.1rem; display: block; }
        .footer-links-list { list-style: none; display: flex; flex-direction: column; gap: .6rem; padding: 0; }
        .footer-links-list li a { color: rgba(255,255,255,.35); text-decoration: none; font-size: .86rem; transition: color .2s; display: inline-flex; align-items: center; gap: .4rem; }
        .footer-links-list li a:hover { color: rgba(255,255,255,.78); }
        .footer-bottom { margin-top: 3rem; padding: 1.4rem 0; border-top: 1px solid rgba(255,255,255,.07); display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: .5rem; }
        .footer-copy  { color: rgba(255,255,255,.2); font-size: .77rem; }
        .footer-badge { display: flex; align-items: center; gap: .4rem; background: rgba(255,255,255,.06); border: 1px solid rgba(255,255,255,.1); color: rgba(255,255,255,.35); font-size: .7rem; font-weight: 600; padding: .3rem .85rem; border-radius: 20px; }
        .fbdot { width: 5px; height: 5px; border-radius: 50%; background: var(--blue-mid); }

        /* ══════════════════════════════════════
           FADE UP ANIMATION
        ══════════════════════════════════════ */
        .fade-up { opacity: 0; transform: translateY(24px); transition: opacity .6s ease, transform .6s ease; }
        .fade-up.visible { opacity: 1; transform: translateY(0); }

        /* ══════════════════════════════════════
           RESPONSIVE
        ══════════════════════════════════════ */
        @media(max-width: 991px) {
            .hero-title { font-size: 2.5rem; }
            .info-cards-wrap { margin-top: 2rem; }
            .cta-section { padding: 3rem 2rem; }
            .steps-box { padding: 2rem 1.8rem; }
        }
        @media(max-width: 768px) {
            .hero-title { font-size: 2rem; }
            .nav-links { display: none; }
            .hero-section { height: 60vh; min-height: 400px; }
            .cta-section h2 { font-size: 1.9rem; }
            .sec-title { font-size: 1.75rem; }
            .about-photo { min-height: 260px; margin-bottom: 2rem; }
            .sec-py { padding: 4rem 0; }
        }
    </style>
</head>
<body>

<!-- ═══ NAVBAR ═══ -->
<div class="navbar-wrap">
    <div class="container">
        <div class="navbar-inner">
            <a href="/" class="nav-brand">
                <div class="nav-brand-icon"><i class="bi bi-clipboard2-pulse-fill"></i></div>
                <div>
                    <div class="nav-brand-text">DASS-21</div>
                    <div class="nav-brand-sub">Mental Health Assessment</div>
                </div>
            </a>
            <ul class="nav-links">
                <li><a href="#about">Tentang</a></li>
                <li><a href="#fitur">Fitur</a></li>
                <li><a href="#cara">Cara Kerja</a></li>
                <li><a href="#faq">FAQ</a></li>
                <li><a href="{{ route('login') }}" class="btn-nav">Login Admin</a></li>
            </ul>
        </div>
    </div>
</div>

<!-- ═══ HERO ═══ -->
<section class="hero-section">
    <div class="hero-bg">
        <img src="https://images.unsplash.com/photo-1541339907198-e08756dedf3f?auto=format&fit=crop&w=1920&q=80" alt="Suasana kampus" loading="eager">
    </div>
    <div class="container">
        <div class="hero-content">
            <div class="hero-eyebrow">Kesehatan Mental Mahasiswa</div>
            <h1 class="hero-title">Kenali Kondisi<br><em>Mentalmu</em><br>Lebih Awal</h1>
            <p class="hero-desc">Platform assessment psikologis berbasis DASS-21 untuk membantu mahasiswa memahami tingkat stres, kecemasan, dan depresi. Gratis, cepat, dan hasil langsung tersedia.</p>
            <div class="hero-actions">
                <a href="{{ route('assessment.form') }}" class="btn-primary-hero">
                    <i class="bi bi-clipboard2-pulse-fill"></i>Mulai Assessment
                </a>
                <a href="#about" class="btn-outline-hero">
                    Pelajari Lebih Lanjut <i class="bi bi-arrow-down"></i>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- ═══ INFO CARDS ═══ -->
<div class="sec-white">
    <div class="container">
        <div class="info-cards-wrap">
            <div class="row g-4">
                <div class="col-md-4 fade-up">
                    <div class="info-card ic-1">
                        <div class="ic-icon"><i class="bi bi-ui-checks-grid"></i></div>
                        <div class="ic-label">Jumlah Pertanyaan</div>
                        <div class="ic-value">21 Soal</div>
                        <p class="ic-desc">Berdasarkan instrumen DASS-21 yang telah terstandarisasi dan digunakan secara luas di seluruh dunia.</p>
                    </div>
                </div>
                <div class="col-md-4 fade-up" style="transition-delay:.1s">
                    <div class="info-card ic-2">
                        <div class="ic-icon"><i class="bi bi-clock-history"></i></div>
                        <div class="ic-label">Estimasi Waktu</div>
                        <div class="ic-value">5 Menit</div>
                        <p class="ic-desc">Selesaikan assessment dengan cepat dan dapatkan hasil analisis kondisi psikologismu secara instan.</p>
                    </div>
                </div>
                <div class="col-md-4 fade-up" style="transition-delay:.2s">
                    <div class="info-card ic-3">
                        <div class="ic-icon"><i class="bi bi-cpu-fill"></i></div>
                        <div class="ic-label">Metode Analisis</div>
                        <div class="ic-value">KNN Algorithm</div>
                        <p class="ic-desc">Klasifikasi hasil menggunakan algoritma K-Nearest Neighbor dengan tingkat akurasi yang telah terukur.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- ═══ ABOUT — putih ═══ -->
<section id="about" class="sec-white sec-py" style="padding-top:7rem">
    <div class="container">
        <div class="row align-items-center gx-5">
            <div class="col-lg-5 mb-5 mb-lg-0 fade-up">
                <div class="about-photo">
                    <img src="https://images.unsplash.com/photo-1529390079861-591de354faf5?auto=format&fit=crop&w=800&q=80" alt="Mahasiswa berdiskusi">
                </div>
            </div>
            <div class="col-lg-7 fade-up" style="transition-delay:.15s">
                <span class="sec-label">Tentang Platform</span>
                <h2 class="sec-title">Mengapa Kesehatan Mental Itu Penting?</h2>
                <p class="sec-sub">Mahasiswa menghadapi berbagai tekanan — akademik, sosial, hingga finansial. Mengenali kondisi psikologis sejak dini adalah langkah pertama untuk menjaga kesejahteraan mental secara menyeluruh.</p>
                <div class="about-stat">
                    <div class="astat"><div class="astat-icon"><i class="bi bi-person-check-fill"></i></div><div><div class="astat-val">Mode Anonymous</div><div class="astat-lbl">Bisa diisi tanpa mencantumkan identitas asli</div></div></div>
                    <div class="astat"><div class="astat-icon"><i class="bi bi-lock-fill"></i></div><div><div class="astat-val">Privasi Terjaga</div><div class="astat-lbl">Data hanya digunakan untuk keperluan analisis</div></div></div>
                    <div class="astat"><div class="astat-icon"><i class="bi bi-graph-up-arrow"></i></div><div><div class="astat-val">Hasil Instan</div><div class="astat-lbl">Langsung muncul setelah semua pertanyaan selesai</div></div></div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ═══ FITUR — biru soft ═══ -->
<section id="fitur" class="sec-soft sec-py">
    <div class="container">
        <div class="text-center mb-5 fade-up">
            <span class="sec-label">Dimensi Pengukuran</span>
            <h2 class="sec-title">Apa yang Diukur dalam Assessment?</h2>
            <p class="sec-sub mx-auto text-center">Tiga dimensi psikologis utama yang diukur menggunakan instrumen DASS-21 yang telah terstandarisasi secara internasional.</p>
        </div>
        <div class="row g-4">
            <div class="col-md-4 fade-up"><div class="feature-card fc-s"><div class="feat-icon fi-s"><i class="bi bi-lightning-charge-fill"></i></div><h5>Tingkat Stres</h5><p>Mengukur sejauh mana tekanan akademik dan aktivitas sehari-hari berdampak pada kondisi emosional dan fisik kamu.</p></div></div>
            <div class="col-md-4 fade-up" style="transition-delay:.1s"><div class="feature-card fc-a"><div class="feat-icon fi-a"><i class="bi bi-cloud-lightning-rain-fill"></i></div><h5>Tingkat Kecemasan</h5><p>Mendeteksi indikasi kecemasan yang muncul akibat tekanan perkuliahan, ujian, tugas akhir, maupun aktivitas kampus.</p></div></div>
            <div class="col-md-4 fade-up" style="transition-delay:.2s"><div class="feature-card fc-d"><div class="feat-icon fi-d"><i class="bi bi-heartbreak-fill"></i></div><h5>Tingkat Depresi</h5><p>Menganalisis kondisi emosional secara menyeluruh dan memberikan gambaran awal tentang kesejahteraan psikologis kamu.</p></div></div>
        </div>
    </div>
</section>

<!-- ═══ CARA KERJA — putih ═══ -->
<section id="cara" class="sec-white sec-py">
    <div class="container">
        <div class="row align-items-center gx-5">
            <div class="col-lg-5 mb-5 mb-lg-0 fade-up">
                <span class="sec-label">Cara Kerja</span>
                <h2 class="sec-title">Hanya 3 Langkah Mudah</h2>
                <p class="sec-sub">Proses assessment dirancang sesederhana mungkin agar kamu bisa menyelesaikannya kapan saja dan di mana saja.</p>
            </div>
            <div class="col-lg-7 fade-up" style="transition-delay:.15s">
                <div class="steps-box">
                    <div class="step-item"><div class="step-num">1</div><div><div class="step-title">Isi Data Diri</div><p class="step-desc">Lengkapi informasi dasar seperti universitas, prodi, dan semester. Tersedia mode anonymous jika tidak ingin mencantumkan nama.</p></div></div>
                    <div class="step-item"><div class="step-num">2</div><div><div class="step-title">Jawab 21 Pertanyaan</div><p class="step-desc">Jawab setiap pertanyaan dengan jujur sesuai kondisi yang kamu rasakan selama 1 minggu terakhir. Tidak ada jawaban benar atau salah.</p></div></div>
                    <div class="step-item"><div class="step-num">3</div><div><div class="step-title">Lihat Hasil Assessment</div><p class="step-desc">Dapatkan hasil analisis lengkap mencakup skor stres, kecemasan, dan depresi beserta rekomendasi langkah selanjutnya secara instan.</p></div></div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ═══ CTA — biru soft ═══ -->
<section class="sec-soft sec-py">
    <div class="container fade-up">
        <div class="cta-section">
            <h2>Mulai Kenali Kondisi Mentalmu</h2>
            <p>Assessment berlangsung hanya 5 menit. Jawab 21 pertanyaan dengan jujur dan dapatkan hasil analisis kondisi psikologismu secara langsung.</p>
            <a href="{{ route('assessment.form') }}" class="btn-cta-white"><i class="bi bi-clipboard2-pulse-fill"></i>Mulai Assessment Sekarang</a>
        </div>
    </div>
</section>

<!-- ═══ FAQ — putih ═══ -->
<section id="faq" class="sec-white sec-py">
    <div class="container">
        <div class="text-center mb-5 fade-up">
            <span class="sec-label">FAQ</span>
            <h2 class="sec-title">Pertanyaan yang Sering Ditanyakan</h2>
        </div>
        <div class="row justify-content-center fade-up">
            <div class="col-lg-8">
                <div class="accordion" id="faqAccordion">
                    <div class="accordion-item faq-item"><h2 class="accordion-header"><button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">Apakah assessment ini gratis?</button></h2><div id="faq1" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion"><div class="accordion-body">Ya, sepenuhnya gratis. Kamu bisa mengisi assessment kapan saja tanpa perlu mendaftar atau membuat akun.</div></div></div>
                    <div class="accordion-item faq-item"><h2 class="accordion-header"><button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">Apakah data saya aman dan terjaga privasinya?</button></h2><div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion"><div class="accordion-body">Ya. Seluruh data yang kamu masukkan dijaga kerahasiaannya. Kamu juga dapat memilih mode anonymous agar identitas tidak ditampilkan.</div></div></div>
                    <div class="accordion-item faq-item"><h2 class="accordion-header"><button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq3">Berapa lama waktu yang dibutuhkan?</button></h2><div id="faq3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion"><div class="accordion-body">Assessment terdiri dari 21 pertanyaan dan dapat diselesaikan dalam kurang lebih 5 menit.</div></div></div>
                    <div class="accordion-item faq-item"><h2 class="accordion-header"><button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq4">Apakah hasil assessment ini adalah diagnosis resmi?</button></h2><div id="faq4" class="accordion-collapse collapse" data-bs-parent="#faqAccordion"><div class="accordion-body">Tidak. Hasil assessment ini merupakan screening awal. Jika kamu merasa memerlukan bantuan lebih lanjut, sebaiknya berkonsultasi dengan psikolog atau konselor profesional.</div></div></div>
                    <div class="accordion-item faq-item"><h2 class="accordion-header"><button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq5">Apakah saya bisa mengisi assessment lebih dari sekali?</button></h2><div id="faq5" class="accordion-collapse collapse" data-bs-parent="#faqAccordion"><div class="accordion-body">Ya, kamu bisa mengisi assessment kapan saja. Disarankan untuk melakukannya secara berkala agar bisa memantau perkembangan kondisi psikologismu.</div></div></div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ═══ FOOTER ═══ -->
<footer class="footer-section">
    <div class="container">
        <div class="row g-5 align-items-start">
            <div class="col-lg-4 col-md-12">
                <div class="footer-brand-row">
                    <div class="footer-brand-icon"><i class="bi bi-clipboard2-pulse-fill"></i></div>
                    <div class="footer-brand-name">DASS-21</div>
                </div>
                <p class="footer-desc">Platform assessment kesehatan mental untuk mahasiswa berbasis instrumen DASS-21 dengan metode klasifikasi K-Nearest Neighbor.</p>
            </div>
            <div class="col-lg-2 col-md-4 col-6">
                <span class="footer-heading">Menu</span>
                <ul class="footer-links-list">
                    <li><a href="#about">Tentang</a></li>
                    <li><a href="#fitur">Dimensi Ukur</a></li>
                    <li><a href="#cara">Cara Kerja</a></li>
                    <li><a href="#faq">FAQ</a></li>
                </ul>
            </div>
            <div class="col-lg-2 col-md-4 col-6">
                <span class="footer-heading">Legal</span>
                <ul class="footer-links-list">
                    <li><a href="#">Kebijakan Privasi</a></li>
                    <li><a href="#">Ketentuan Penggunaan</a></li>
                    <li><a href="#">Disclaimer</a></li>
                </ul>
            </div>
            <div class="col-lg-3 col-md-4 col-12 offset-lg-1">
                <span class="footer-heading">Mulai Sekarang</span>
                <ul class="footer-links-list">
                    <li><a href="{{ route('assessment.form') }}"><i class="bi bi-clipboard2-pulse"></i>Mulai Assessment</a></li>
                    <li><a href="#cara"><i class="bi bi-info-circle"></i>Cara Kerja</a></li>
                    <li><a href="{{ route('login') }}"><i class="bi bi-shield-lock"></i>Login Admin</a></li>
                </ul>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="footer-copy">© 2026 DASS-21 Mental Health Assessment. Seluruh hak dilindungi.</div>
            <div class="footer-badge"><span class="fbdot"></span>DASS-21 · KNN Algorithm · Laravel</div>
        </div>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(e => { if(e.isIntersecting) e.target.classList.add('visible'); });
    }, { threshold: 0.08 });
    document.querySelectorAll('.fade-up').forEach(el => observer.observe(el));
</script>
</body>
</html>