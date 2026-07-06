<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sampai Tenang — Kesehatan Mental Mahasiswa</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,400;1,600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
        html { scroll-behavior: smooth; font-size: 16px; }
        body {
            font-family: 'Poppins', sans-serif;
            color: #0a1628;
            background: #fff;
            -webkit-font-smoothing: antialiased;
            overflow-x: hidden;
        }

        /* NAVBAR */
        .nav {
            position: fixed; top: 0; left: 0; right: 0; z-index: 100;
            height: 60px;
            display: flex; align-items: center; justify-content: space-between;
            padding: 0 48px;
            background: rgba(10,22,40,0);
            transition: background .3s, border-color .3s;
            border-bottom: 1px solid transparent;
        }
        .nav.solid {
            background: rgba(10,22,40,.96);
            border-color: rgba(255,255,255,.07);
            backdrop-filter: blur(14px);
        }
        .nav-brand { display: flex; align-items: center; gap: 10px; text-decoration: none; }
        .nav-logo {
            width: 32px; height: 32px; border-radius: 9px;
            background: #00c9a7;
            display: flex; align-items: center; justify-content: center;
            color: #0a1628; font-size: 14px;
        }
        .nav-brand-text { line-height: 1; }
        .nav-brand-name { font-size: 14px; font-weight: 600; color: #fff; display: block; }
        .nav-brand-sub  { font-size: 10px; color: rgba(255,255,255,.38); display: block; margin-top: 1px; }
        .nav-links { display: flex; align-items: center; gap: 32px; list-style: none; }
        .nav-links a { font-size: 13px; color: rgba(255,255,255,.68); text-decoration: none; transition: color .2s; }
        .nav-links a:hover { color: #fff; }
        .nav-cta {
            background: #00c9a7; color: #0a1628;
            border: none; border-radius: 100px;
            padding: 8px 20px; font-size: 13px; font-weight: 600;
            font-family: 'Poppins', sans-serif; cursor: pointer;
            text-decoration: none; transition: background .2s, transform .15s;
        }
        .nav-cta:hover { background: #00b49a; transform: translateY(-1px); color: #0a1628; }

        /* HERO */
        .hero {
            height: 600px;
            position: relative;
            display: flex; align-items: center;
            overflow: hidden;
        }
        .hero-img { position: absolute; inset: 0; }
        .hero-img img {
            width: 100%; height: 100%;
            object-fit: cover; object-position: center 60%;
            display: block;
        }
        .hero-img::after {
            content: '';
            position: absolute; inset: 0;
            background:
                linear-gradient(90deg,
                    rgba(10,22,40,.92) 0%,
                    rgba(10,22,40,.70) 40%,
                    rgba(10,22,40,.30) 70%,
                    rgba(10,22,40,.10) 100%),
                linear-gradient(180deg,
                    rgba(10,22,40,.15) 0%,
                    rgba(10,22,40,.0)  50%,
                    rgba(10,22,40,.35) 100%);
        }
        .hero-body {
            position: relative; z-index: 1;
            padding: 0 48px;
            max-width: 560px;
        }
        .hero-eyebrow {
            display: flex; align-items: center; gap: 10px;
            font-size: 10px; font-weight: 700; letter-spacing: .2em;
            text-transform: uppercase; color: #00c9a7;
            margin-bottom: 20px;
        }
        .hero-eyebrow::before {
            content: ''; width: 28px; height: 2px;
            background: #00c9a7; border-radius: 2px; flex-shrink: 0;
        }
        .hero-title {
            font-size: 44px; font-weight: 700;
            color: #fff; line-height: 1.12;
            margin-bottom: 18px;
        }
        .hero-title em { font-style: italic; color: #00c9a7; font-weight: 400; display: block; }
        .hero-desc {
            font-size: 14px; color: rgba(255,255,255,.72);
            line-height: 1.85; margin-bottom: 32px;
            max-width: 420px;
        }
        .hero-actions { display: flex; gap: 12px; flex-wrap: wrap; }
        .btn-primary-hero {
            display: inline-flex; align-items: center; gap: 8px;
            background: #00c9a7; color: #0a1628;
            border: none; border-radius: 100px;
            padding: 13px 26px; font-size: 14px; font-weight: 700;
            font-family: 'Poppins', sans-serif; cursor: pointer;
            text-decoration: none; transition: all .2s;
        }
        .btn-primary-hero:hover { background: #00b49a; transform: translateY(-2px); color: #0a1628; }
        .btn-ghost-hero {
            display: inline-flex; align-items: center; gap: 8px;
            background: transparent; color: rgba(255,255,255,.78);
            border: 1.5px solid rgba(255,255,255,.28); border-radius: 100px;
            padding: 12px 22px; font-size: 14px; font-weight: 500;
            font-family: 'Poppins', sans-serif; cursor: pointer;
            text-decoration: none; transition: all .2s;
        }
        .btn-ghost-hero:hover { border-color: rgba(255,255,255,.6); color: #fff; }

        /* INFO STRIP */
        .info-strip { background: #f5f0eb; border-bottom: 1px solid #ede8e2; }
        .info-strip-grid {
            display: grid; grid-template-columns: repeat(3, 1fr);
            max-width: 1200px; margin: 0 auto;
        }
        .info-cell { padding: 40px 48px; border-right: 1px solid #ede8e2; }
        .info-cell:last-child { border-right: none; }
        .info-cell-label {
            font-size: 10px; font-weight: 700; letter-spacing: .18em;
            text-transform: uppercase; color: #aaa; margin-bottom: 8px;
        }
        .info-cell-value {
            font-size: 40px; font-weight: 700; color: #0a1628;
            line-height: 1; margin-bottom: 4px;
            display: flex; align-items: baseline; gap: 6px;
        }
        .info-cell-value .unit { font-size: 16px; font-weight: 500; color: #00b49a; }
        .info-cell-desc { font-size: 12.5px; color: #666; line-height: 1.7; margin-top: 8px; }

        /* 3 dimensi di info strip — selaras tema navy/teal */
        .dim-list { display: flex; flex-direction: column; gap: 10px; margin-bottom: 12px; }
        .dim-item { display: flex; align-items: center; gap: 12px; }
        .dim-dot {
            width: 8px; height: 8px; border-radius: 50%; flex-shrink: 0;
        }
        .dim-name { font-size: 16px; font-weight: 600; color: #0a1628; }
        /* semua dot pakai warna navy-teal yang selaras tema */
        .dim-item.stres   .dim-dot { background: #0a1628; }
        .dim-item.cemas   .dim-dot { background: #00b49a; }
        .dim-item.depresi .dim-dot { background: #0a1628; opacity: .45; }

        /* SECTION */
        .section { padding: 88px 0; }
        .section-sm { padding: 64px 0; }
        .container { max-width: 1200px; margin: 0 auto; padding: 0 48px; }
        .eyebrow {
            font-size: 10px; font-weight: 700; letter-spacing: .18em;
            text-transform: uppercase; color: #00b49a;
            display: block; margin-bottom: 12px;
        }
        .section-title { font-size: 34px; font-weight: 700; line-height: 1.2; margin-bottom: 16px; }
        .section-title em { font-style: italic; font-weight: 400; }
        .section-sub { font-size: 14px; line-height: 1.8; }

        /* FITUR */
        .sec-fitur { background: #0d1f3c; }
        .sec-fitur .section-title { color: #fff; }
        .sec-fitur .eyebrow { color: #00c9a7; }
        .feat-cards {
            display: grid; grid-template-columns: repeat(3, 1fr);
            gap: 1px; background: rgba(255,255,255,.08);
            border: 1px solid rgba(255,255,255,.08);
            border-radius: 16px; overflow: hidden;
            margin-top: 40px;
        }
        .feat-card { background: rgba(255,255,255,.03); padding: 32px 28px; transition: background .2s; }
        .feat-card:hover  { background: rgba(255,255,255,.07); }
        .feat-card.active { background: #112240; }
        .feat-icon {
            width: 40px; height: 40px; border-radius: 11px;
            display: flex; align-items: center; justify-content: center;
            font-size: 16px; margin-bottom: 16px;
        }
        .feat-icon.teal  { background: rgba(0,201,167,.14); color: #00c9a7; }
        .feat-icon.amber { background: rgba(245,158,11,.14); color: #f59e0b; }
        .feat-card h4 { font-size: 15px; font-weight: 600; color: #fff; margin-bottom: 8px; }
        .feat-card p  { font-size: 13px; color: rgba(255,255,255,.55); line-height: 1.75; margin: 0; }

        /* TENTANG */
        .sec-tentang { background: #f5f0eb; }
        .about-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 64px; align-items: center; }
        .about-photo { border-radius: 16px; overflow: hidden; height: 420px; }
        .about-photo img { width: 100%; height: 100%; object-fit: cover; display: block; }
        .about-title { font-size: 32px; font-weight: 700; color: #0a1628; line-height: 1.25; margin-bottom: 16px; }
        .about-title em { font-style: italic; font-weight: 400; }
        .about-desc { font-size: 13.5px; color: #555; line-height: 1.85; margin-bottom: 28px; }
        .about-stats { display: flex; flex-direction: column; gap: 10px; }
        .astat {
            display: flex; align-items: center; gap: 14px;
            background: rgba(0,0,0,.04); border: 1px solid rgba(0,0,0,.07);
            border-radius: 10px; padding: 14px 18px;
        }
        .astat-icon {
            width: 36px; height: 36px; border-radius: 9px;
            background: rgba(0,180,154,.1); color: #00b49a;
            display: flex; align-items: center; justify-content: center;
            font-size: 15px; flex-shrink: 0;
        }
        .astat-title { font-size: 13.5px; font-weight: 600; color: #0a1628; }
        .astat-sub   { font-size: 12px; color: #888; margin-top: 1px; }

        /* CARA KERJA */
        .sec-cara { background: #fff; }
        .cara-head {
            display: flex; align-items: flex-end;
            justify-content: space-between; margin-bottom: 48px;
        }
        .link-mulai {
            display: inline-flex; align-items: center; gap: 6px;
            font-size: 13px; font-weight: 600; color: #00b49a;
            text-decoration: none; transition: gap .2s;
        }
        .link-mulai:hover { gap: 10px; color: #00b49a; }
        .steps-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 0; }
        .step { padding: 0 32px; border-right: 1px solid #ede8e2; }
        .step:first-child { padding-left: 0; }
        .step:last-child  { border-right: none; padding-right: 0; }
        .step-num {
            font-size: 72px; font-weight: 700; font-style: italic;
            color: rgba(0,0,0,.06); line-height: 1; margin-bottom: 12px;
        }
        .step h4 { font-size: 15px; font-weight: 600; color: #0a1628; margin-bottom: 8px; }
        .step p  { font-size: 13px; color: #666; line-height: 1.8; margin: 0; }

        /* CTA */
        .sec-cta { background: #0d1f3c; padding: 72px 0; position: relative; overflow: hidden; }
        .sec-cta::before {
            content: ''; position: absolute;
            width: 500px; height: 500px; border-radius: 50%;
            background: rgba(0,201,167,.05);
            top: -200px; right: -100px;
        }
        .cta-inner { display: flex; align-items: center; justify-content: space-between; gap: 40px; }
        .cta-badge {
            display: inline-flex; align-items: center; gap: 7px;
            background: rgba(0,201,167,.1); border: 1px solid rgba(0,201,167,.2);
            color: #00c9a7; border-radius: 100px;
            padding: 5px 14px; font-size: 10px; font-weight: 700;
            letter-spacing: .14em; text-transform: uppercase;
            margin-bottom: 16px;
        }
        .cta-badge::before { content: ''; width: 6px; height: 6px; border-radius: 50%; background: #00c9a7; }
        .cta-title { font-size: 36px; font-weight: 700; color: #fff; line-height: 1.2; }
        .cta-title em { font-style: italic; font-weight: 400; }
        .btn-cta {
            display: inline-flex; align-items: center; gap: 8px;
            background: #00c9a7; color: #0a1628;
            border: none; border-radius: 100px;
            padding: 15px 32px; font-size: 14px; font-weight: 700;
            font-family: 'Poppins', sans-serif; cursor: pointer;
            text-decoration: none; transition: all .2s;
            white-space: nowrap; flex-shrink: 0;
        }
        .btn-cta:hover { background: #00b49a; transform: translateY(-2px); color: #0a1628; }

        /* FAQ */
        .sec-faq { background: #f5f0eb; }
        .sec-faq .section-title { color: #0a1628; }
        .sec-faq .eyebrow { color: #00b49a; }
        .faq-wrap {
            max-width: 700px; margin: 48px auto 0;
            background: #fff; border-radius: 16px;
            border: 1px solid rgba(0,0,0,.07); overflow: hidden;
        }
        .faq-item { border-bottom: 1px solid rgba(0,0,0,.07); }
        .faq-item:last-child { border-bottom: none; }
        .faq-btn {
            width: 100%; background: none; border: none;
            display: flex; align-items: center; justify-content: space-between;
            padding: 18px 24px; gap: 16px;
            font-size: 14px; font-weight: 500; color: #0a1628;
            font-family: 'Poppins', sans-serif; cursor: pointer;
            text-align: left; transition: background .15s;
        }
        .faq-btn:hover { background: rgba(0,0,0,.02); }
        .faq-chevron { font-size: 14px; color: #aaa; flex-shrink: 0; transition: transform .25s; }
        .faq-body {
            font-size: 13.5px; color: #666; line-height: 1.8;
            padding: 0 24px; max-height: 0;
            overflow: hidden; transition: max-height .3s ease, padding .3s;
        }
        .faq-body.open { max-height: 200px; padding: 0 24px 18px; }
        .faq-chevron.open { transform: rotate(180deg); }

        /* FOOTER */
        .footer {
            background: #0a1628; padding: 24px 48px;
            border-top: 1px solid rgba(255,255,255,.05);
            display: flex; align-items: center; justify-content: space-between;
        }
        .footer-brand { display: flex; align-items: center; gap: 10px; }
        .footer-logo {
            width: 24px; height: 24px; border-radius: 6px;
            background: #00c9a7;
            display: flex; align-items: center; justify-content: center;
            color: #0a1628; font-size: 11px;
        }
        .footer-name { font-size: 13px; font-weight: 600; color: #fff; }
        .footer-copy { font-size: 12px; color: rgba(255,255,255,.32); }

        /* FADE */
        .fade { opacity: 0; transform: translateY(20px); transition: opacity .55s ease, transform .55s ease; }
        .fade.in { opacity: 1; transform: translateY(0); }
        .fade.d1 { transition-delay: .08s; }
        .fade.d2 { transition-delay: .16s; }
        .fade.d3 { transition-delay: .24s; }

        /* RESPONSIVE */
        @media (max-width: 1024px) {
            .hero { height: 520px; }
            .hero-title { font-size: 36px; }
            .about-grid { grid-template-columns: 1fr; gap: 40px; }
            .about-photo { height: 300px; }
            .cta-inner { flex-direction: column; text-align: center; }
        }
        @media (max-width: 768px) {
            .nav { padding: 0 24px; }
            .nav-links { display: none; }
            .hero { height: 480px; }
            .hero-body { padding: 0 24px; }
            .hero-title { font-size: 30px; }
            .container { padding: 0 24px; }
            .info-strip-grid { grid-template-columns: 1fr; }
            .info-cell { border-right: none; border-bottom: 1px solid #ede8e2; padding: 32px 24px; }
            .feat-cards { grid-template-columns: 1fr; }
            .steps-grid { grid-template-columns: 1fr; gap: 32px; }
            .step { padding: 0; border-right: none; }
            .section { padding: 64px 0; }
            .cara-head { flex-direction: column; align-items: flex-start; gap: 12px; }
            .footer { flex-direction: column; gap: 10px; text-align: center; padding: 20px 24px; }
        }
    </style>
</head>
<body>

<!-- NAVBAR -->
<nav class="nav" id="nav">
    <a href="/" class="nav-brand">
        <div class="nav-logo"><i class="bi bi-pin-angle-fill"></i></div>
        <div class="nav-brand-text">
            <span class="nav-brand-name">Sampai Tenang</span>
            <span class="nav-brand-sub">Mental Health Assessment</span>
        </div>
    </a>
    <ul class="nav-links">
        <li><a href="#tentang">Tentang</a></li>
        <li><a href="#fitur">Fitur</a></li>
        <li><a href="#cara">Cara Kerja</a></li>
        <li><a href="#faq">FAQ</a></li>
        <li><a href="{{ route('login') }}" class="nav-cta">Login Admin</a></li>
    </ul>
</nav>

<!-- HERO -->
<section class="hero">
    <div class="hero-img">
        <img src="https://images.unsplash.com/photo-1541339907198-e08756dedf3f?auto=format&fit=crop&w=1920&q=80" alt="Mahasiswa wisuda">
    </div>
    <div class="hero-body">
        <div class="hero-eyebrow">Kesehatan Mental Mahasiswa</div>
        <h1 class="hero-title">
            Kenali Kondisi<br>
            <em>Mentalmu</em>
            Lebih Awal
        </h1>
        <p class="hero-desc">Platform assessment psikologis berbasis DASS-21 untuk membantu mahasiswa memahami tingkat stres, kecemasan, dan depresi. Gratis, cepat, hasil langsung tersedia.</p>
        <div class="hero-actions">
            <a href="{{ route('assessment.form') }}" class="btn-primary-hero">
                <i class="bi bi-arrow-right"></i> Mulai Assessment
            </a>
            <a href="#tentang" class="btn-ghost-hero">Pelajari Lebih Lanjut</a>
        </div>
    </div>
</section>

<!-- INFO STRIP -->
<div class="info-strip">
    <div class="info-strip-grid">
        <div class="info-cell fade">
            <div class="info-cell-label">Jumlah Pertanyaan</div>
            <div class="info-cell-value">21 <span class="unit">Soal</span></div>
            <p class="info-cell-desc">Instrumen DASS-21 terstandarisasi yang digunakan secara luas di seluruh dunia.</p>
        </div>
        <div class="info-cell fade d1">
            <div class="info-cell-label">Estimasi Waktu</div>
            <div class="info-cell-value">5 <span class="unit">Menit</span></div>
            <p class="info-cell-desc">Selesaikan assessment dan dapatkan hasil analisis kondisi psikologismu secara instan.</p>
        </div>
        <!-- Kolom 3: 3 dimensi yang diukur — lebih informatif dari "KNN Algorithm" -->
        <div class="info-cell fade d2">
            <div class="info-cell-label">Dimensi yang Diukur</div>
            <div class="dim-list">
                <div class="dim-item stres">
                    <span class="dim-dot"></span>
                    <span class="dim-name">Stres</span>
                </div>
                <div class="dim-item cemas">
                    <span class="dim-dot"></span>
                    <span class="dim-name">Kecemasan</span>
                </div>
                <div class="dim-item depresi">
                    <span class="dim-dot"></span>
                    <span class="dim-name">Depresi</span>
                </div>
            </div>
            <p class="info-cell-desc">Tiga aspek kesehatan mental yang diukur sekaligus dalam satu sesi assessment.</p>
        </div>
    </div>
</div>

<!-- FITUR -->
<section class="section sec-fitur" id="fitur">
    <div class="container">
        <div class="fade">
            <span class="eyebrow">Fitur Unggulan</span>
            <h2 class="section-title" style="color:#fff;">Dirancang untuk<br><em>kenyamananmu</em></h2>
        </div>
        <div class="feat-cards fade d1">
            <div class="feat-card">
                <div class="feat-icon teal"><i class="bi bi-patch-check-fill"></i></div>
                <h4>Ilmiah & Terstandarisasi</h4>
                <p>Menggunakan instrumen DASS-21 yang telah divalidasi dan digunakan secara luas oleh profesional kesehatan mental di seluruh dunia.</p>
            </div>
            <div class="feat-card active">
                <div class="feat-icon teal"><i class="bi bi-shield-lock-fill"></i></div>
                <h4>Privasi Terjaga</h4>
                <p>Hasil assessment bersifat pribadi. Data kamu diproses dengan aman dan tidak dibagikan kepada siapapun tanpa izinmu.</p>
            </div>
            <div class="feat-card">
                <div class="feat-icon amber"><i class="bi bi-lightning-charge-fill"></i></div>
                <h4>Hasil Instan & Jelas</h4>
                <p>Langsung dapatkan gambaran tingkat stres, kecemasan, dan depresi beserta panduan tindak lanjut yang mudah dipahami.</p>
            </div>
        </div>
    </div>
</section>

<!-- TENTANG -->
<section class="section sec-tentang" id="tentang">
    <div class="container">
        <div class="about-grid">
            <div class="fade">
                <div class="about-photo">
                    <img src="https://images.unsplash.com/photo-1529390079861-591de354faf5?auto=format&fit=crop&w=800&q=80" alt="Mahasiswa berdiskusi">
                </div>
            </div>
            <div class="fade d1">
                <span class="eyebrow">Tentang Platform</span>
                <h2 class="about-title">Mengapa Kesehatan Mental <em>Itu Penting?</em></h2>
                <p class="about-desc">Mahasiswa menghadapi berbagai tekanan akademik, sosial, hingga finansial. Mengenali kondisi psikologis sejak dini adalah langkah pertama untuk menjaga kesejahteraan mental secara menyeluruh.</p>
                <div class="about-stats">
                    <div class="astat">
                        <div class="astat-icon"><i class="bi bi-person-check-fill"></i></div>
                        <div>
                            <div class="astat-title">Mode Anonymous</div>
                            <div class="astat-sub">Bisa diisi tanpa mencantumkan identitas asli</div>
                        </div>
                    </div>
                    <div class="astat">
                        <div class="astat-icon"><i class="bi bi-lock-fill"></i></div>
                        <div>
                            <div class="astat-title">Privasi Terjaga</div>
                            <div class="astat-sub">Data hanya digunakan untuk keperluan analisis</div>
                        </div>
                    </div>
                    <div class="astat">
                        <div class="astat-icon"><i class="bi bi-graph-up-arrow"></i></div>
                        <div>
                            <div class="astat-title">Hasil Instan</div>
                            <div class="astat-sub">Langsung muncul setelah semua pertanyaan selesai</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CARA KERJA -->
<section class="section sec-cara" id="cara">
    <div class="container">
        <div class="cara-head fade">
            <div>
                <span class="eyebrow">Cara Kerja</span>
                <h2 class="section-title" style="color:#0a1628;">Tiga langkah<br><em>menuju pemahaman diri</em></h2>
            </div>
            <a href="{{ route('assessment.form') }}" class="link-mulai">Mulai Sekarang <i class="bi bi-arrow-right"></i></a>
        </div>
        <div class="steps-grid fade d1">
            <div class="step">
                <div class="step-num">01</div>
                <h4>Buka Platform</h4>
                <p>Akses Sampai Tenang lewat browser. Tidak perlu instalasi atau registrasi langsung mulai kapan saja.</p>
            </div>
            <div class="step">
                <div class="step-num">02</div>
                <h4>Jawab 21 Pertanyaan</h4>
                <p>Jawab setiap pertanyaan DASS-21 dengan jujur dan tenang. Hanya membutuhkan sekitar 5 menit.</p>
            </div>
            <div class="step">
                <div class="step-num">03</div>
                <h4>Dapatkan Hasil</h4>
                <p>Sistem menganalisis jawabanmu dan langsung menampilkan tingkat stres, kecemasan, dan depresimu secara jelas.</p>
            </div>
        </div>
    </div>
</section>

<!-- CTA -->
<section class="sec-cta">
    <div class="container">
        <div class="cta-inner fade">
            <div>
                <div class="cta-badge">Gratis Sepenuhnya</div>
                <h2 class="cta-title">Satu langkah menuju<br><em>dirimu yang lebih baik</em></h2>
            </div>
            <a href="{{ route('assessment.form') }}" class="btn-cta">
                Mulai Assessment <i class="bi bi-arrow-right"></i>
            </a>
        </div>
    </div>
</section>

<!-- FAQ -->
<section class="section sec-faq" id="faq">
    <div class="container">
        <div class="fade" style="text-align:center;">
            <span class="eyebrow">FAQ</span>
            <h2 class="section-title" style="color:#0a1628;">Pertanyaan yang Sering <em>Ditanyakan</em></h2>
        </div>
        <div class="faq-wrap fade d1">
            @foreach([
                ['q'=>'Apakah assessment ini gratis?','a'=>'Ya, sepenuhnya gratis. Kamu bisa mengisi assessment kapan saja tanpa perlu mendaftar atau membuat akun.'],
                ['q'=>'Apakah data saya aman dan terjaga privasinya?','a'=>'Ya. Seluruh data yang kamu masukkan dijaga kerahasiaannya. Kamu juga dapat memilih mode anonymous agar identitas tidak ditampilkan.'],
                ['q'=>'Berapa lama waktu yang dibutuhkan?','a'=>'Assessment terdiri dari 21 pertanyaan dan dapat diselesaikan dalam kurang lebih 5 menit.'],
                ['q'=>'Apakah hasil assessment ini adalah diagnosis resmi?','a'=>'Tidak. Hasil assessment ini merupakan screening awal. Jika kamu memerlukan bantuan lebih lanjut, sebaiknya berkonsultasi dengan psikolog atau konselor profesional.'],
                ['q'=>'Apakah saya bisa mengisi assessment lebih dari sekali?','a'=>'Ya, kamu bisa mengisi assessment kapan saja. Disarankan secara berkala agar bisa memantau perkembangan kondisi psikologismu.'],
            ] as $i => $f)
            <div class="faq-item">
                <button class="faq-btn" onclick="toggleFaq({{ $i }},this)">
                    {{ $f['q'] }}
                    <i class="bi bi-chevron-down faq-chevron" id="chev{{ $i }}"></i>
                </button>
                <div class="faq-body" id="faqB{{ $i }}">{{ $f['a'] }}</div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- FOOTER -->
<footer class="footer">
    <div class="footer-brand">
        <div class="footer-logo"><i class="bi bi-pin-angle-fill"></i></div>
        <span class="footer-name">Sampai Tenang</span>
    </div>
    <span class="footer-copy">© 2025 Sampai Tenang · Platform Assessment Kesehatan Mental Mahasiswa</span>
</footer>

<script>
window.addEventListener('scroll', () => {
    document.getElementById('nav').classList.toggle('solid', window.scrollY > 20);
});

const io = new IntersectionObserver(entries => {
    entries.forEach(e => { if (e.isIntersecting) e.target.classList.add('in'); });
}, { threshold: 0.1 });
document.querySelectorAll('.fade').forEach(el => io.observe(el));

let cur = -1;
function toggleFaq(i, btn) {
    const body = document.getElementById('faqB' + i);
    const chev = document.getElementById('chev' + i);
    if (cur === i) {
        body.classList.remove('open');
        chev.classList.remove('open');
        cur = -1;
    } else {
        if (cur >= 0) {
            document.getElementById('faqB' + cur).classList.remove('open');
            document.getElementById('chev' + cur).classList.remove('open');
        }
        body.classList.add('open');
        chev.classList.add('open');
        cur = i;
    }
}
</script>
</body>
</html>