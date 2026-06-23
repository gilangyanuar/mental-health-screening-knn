<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Assessment | DASS-21</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        :root {
            --navy:#0f1f6e; --blue:#1b3afe; --blue-light:#e8eeff; --blue-soft:#f0f4ff;
            --green:#059669; --amber:#d97706; --red:#dc2626; --purple:#7c3aed;
            --text-1:#0d1540; --text-2:#4a5480; --text-3:#8892b8;
            --r-xl:28px; --r-lg:18px; --r-md:14px; --r-sm:10px;
            --shadow-lg:0 40px 100px rgba(15,31,110,.12);
            --shadow-md:0 20px 50px rgba(15,31,110,.08);
            --shadow-sm:0 8px 24px rgba(15,31,110,.07);
        }
        *{box-sizing:border-box;margin:0;padding:0;}
        html{scroll-behavior:smooth;}
        body{
            font-family:'Poppins',sans-serif;color:var(--text-1);
            -webkit-font-smoothing:antialiased;min-height:100vh;overflow-x:hidden;
            background:linear-gradient(135deg,#eef1fb 0%,#e8eeff 50%,#f0f6ff 100%);
        }
        body::before{
            content:"";position:fixed;inset:0;z-index:-1;
            background:
                radial-gradient(ellipse 60% 40% at 0% 0%,   rgba(27,58,254,.10) 0%,transparent 55%),
                radial-gradient(ellipse 50% 45% at 100% 0%,  rgba(124,58,237,.08) 0%,transparent 50%),
                radial-gradient(ellipse 55% 40% at 100% 100%,rgba(5,150,105,.07)  0%,transparent 50%),
                radial-gradient(ellipse 50% 40% at 0%  100%, rgba(56,189,248,.08) 0%,transparent 50%);
            pointer-events:none;
        }

        .glass{background:rgba(255,255,255,.85);backdrop-filter:blur(20px);-webkit-backdrop-filter:blur(20px);border:1px solid rgba(255,255,255,.72);}

        /* NAVBAR */
        .navbar-wrap{position:sticky;top:0;z-index:100;}
        .navbar-inner{background:rgba(255,255,255,.93);backdrop-filter:blur(20px);border-bottom:1px solid rgba(27,58,254,.08);padding:.9rem 2rem;display:flex;align-items:center;justify-content:space-between;box-shadow:0 2px 18px rgba(15,31,110,.07);}
        .nav-brand{font-weight:700;font-size:1.05rem;color:var(--blue);text-decoration:none;display:flex;align-items:center;gap:.5rem;}
        .nav-brand-icon{width:34px;height:34px;border-radius:9px;background:var(--blue);display:flex;align-items:center;justify-content:center;color:white;font-size:.9rem;}
        .navbar-steps{display:flex;align-items:center;gap:1.2rem;}
        .nstep{display:flex;align-items:center;gap:.45rem;font-size:.8rem;font-weight:600;color:var(--text-3);}
        .nstep.done{color:var(--blue);}
        .nstep.active{color:var(--text-1);}
        .nstep-dot{width:22px;height:22px;border-radius:7px;background:var(--blue-light);color:var(--blue);display:flex;align-items:center;justify-content:center;font-size:.68rem;font-weight:700;}
        .nstep.done .nstep-dot{background:var(--blue);color:white;}
        .nstep.active .nstep-dot{background:var(--text-1);color:white;}
        .nsep{width:22px;height:1px;background:rgba(27,58,254,.18);}
        @media(max-width:768px){.navbar-steps{display:none;}}

        .page-body{padding:2.5rem 0 5rem;}

        /* HERO */
        .hero-result{border-radius:var(--r-xl);padding:3rem;box-shadow:var(--shadow-lg);margin-bottom:1.5rem;position:relative;overflow:hidden;}
        @media(max-width:768px){.hero-result{padding:2rem;}}

        .result-eyebrow{display:inline-flex;align-items:center;gap:.5rem;background:var(--blue-light);color:var(--blue);font-size:.7rem;font-weight:700;letter-spacing:.18em;text-transform:uppercase;padding:.4rem 1rem;border-radius:30px;margin-bottom:1rem;border:1px solid rgba(27,58,254,.15);}
        .result-user{font-size:.87rem;color:var(--text-2);font-weight:600;margin-bottom:1rem;display:flex;align-items:center;gap:.5rem;}
        .result-user i{color:var(--blue);}

        /* KONDISI + BADGE */
        .kondisi-wrap{display:flex;align-items:center;gap:1rem;flex-wrap:wrap;margin-bottom:1.2rem;}
        .kondisi-name{font-family:'Poppins',sans-serif;font-size:3rem;line-height:1;font-weight:400;}
        .kondisi-name.normal  {color:var(--green);}
        .kondisi-name.stres   {color:var(--amber);}
        .kondisi-name.cemas   {color:var(--blue);}
        .kondisi-name.depresi {color:var(--red);}

        /* Badge level dominan */
        .level-badge{display:inline-flex;align-items:center;gap:.5rem;padding:.5rem 1.1rem;border-radius:30px;font-size:.84rem;font-weight:700;border:2px solid transparent;}
        .level-badge .ldot{width:8px;height:8px;border-radius:50%;flex-shrink:0;}
        .lb-normal {background:#d1fae5;color:#065f46;border-color:#6ee7b7;} .lb-normal  .ldot{background:#059669;}
        .lb-ringan {background:#fef9c3;color:#854d0e;border-color:#fcd34d;} .lb-ringan  .ldot{background:#ca8a04;}
        .lb-sedang {background:#ffedd5;color:#7c2d12;border-color:#fdba74;} .lb-sedang  .ldot{background:#ea580c;}
        .lb-berat  {background:#fee2e2;color:#991b1b;border-color:#fca5a5;} .lb-berat   .ldot{background:#dc2626;}
        .lb-sberat {background:#fce7f3;color:#831843;border-color:#f9a8d4;} .lb-sberat  .ldot{background:#be185d;}

        .result-desc{color:var(--text-2);line-height:1.85;font-size:.93rem;max-width:500px;margin-bottom:1.8rem;}

        /* INFO PILLS — hanya total skor */
        .info-pills{display:flex;flex-wrap:wrap;gap:.75rem;}
        .info-pill{background:rgba(255,255,255,.65);backdrop-filter:blur(8px);border:1px solid rgba(255,255,255,.75);border-radius:var(--r-lg);padding:.75rem 1.1rem;min-width:110px;box-shadow:0 4px 12px rgba(15,31,110,.05);}
        .info-pill small{display:block;font-size:.68rem;font-weight:700;text-transform:uppercase;letter-spacing:.08em;color:var(--text-3);margin-bottom:.25rem;}
        .info-pill strong{font-size:.97rem;font-weight:700;color:var(--text-1);}

        /* HERO VISUAL */
        .hero-visual{display:flex;align-items:center;justify-content:center;height:100%;}
        .hero-illus-wrap{position:relative;width:280px;height:280px;display:flex;align-items:center;justify-content:center;}
        .illus-ring-outer{position:absolute;inset:0;border-radius:50%;border:1.5px dashed rgba(27,58,254,.18);animation:spin 20s linear infinite;}
        .illus-ring-inner{position:absolute;inset:22px;border-radius:50%;border:1px dashed rgba(27,58,254,.1);animation:spin 14s linear infinite reverse;}
        @keyframes spin{from{transform:rotate(0deg);}to{transform:rotate(360deg);}}
        .illus-dot{position:absolute;border-radius:50%;animation:floatY 3s ease-in-out infinite;}
        .illus-dot.d1{width:10px;height:10px;background:rgba(27,58,254,.3);top:22px;right:58px;}
        .illus-dot.d2{width:7px;height:7px;background:rgba(5,150,105,.45);bottom:32px;left:52px;animation-delay:1s;}
        .illus-dot.d3{width:5px;height:5px;background:rgba(217,119,6,.45);top:82px;left:22px;animation-delay:2s;}
        @keyframes floatY{0%,100%{transform:translateY(0);}50%{transform:translateY(-8px);}}
        .illus-circle{position:relative;z-index:2;width:200px;height:200px;border-radius:50%;background:rgba(255,255,255,.85);backdrop-filter:blur(12px);box-shadow:0 20px 60px rgba(27,58,254,.14),0 0 0 1px rgba(255,255,255,.6);display:flex;align-items:center;justify-content:center;overflow:hidden;}
        .illus-circle svg{width:160px;height:160px;}
        .illus-float-card{position:absolute;background:rgba(255,255,255,.88);backdrop-filter:blur(12px);border:1px solid rgba(255,255,255,.75);border-radius:12px;padding:.5rem .9rem;box-shadow:0 8px 24px rgba(15,31,110,.12);display:flex;align-items:center;gap:.45rem;font-size:.75rem;font-weight:700;color:var(--text-1);z-index:3;white-space:nowrap;animation:floatY 4s ease-in-out infinite;}
        .illus-float-card.fc-top{top:12px;right:-8px;}
        .illus-float-card.fc-bot{bottom:22px;left:-8px;animation-delay:2s;}
        .fc-icon{width:24px;height:24px;border-radius:7px;display:flex;align-items:center;justify-content:center;font-size:.75rem;}
        @media(max-width:991px){.illus-float-card{display:none;}.hero-illus-wrap{width:220px;height:220px;}.illus-circle{width:160px;height:160px;}.illus-circle svg{width:130px;height:130px;}}
        @media(max-width:768px){.result-kondisi-name{font-size:2.4rem;}.hero-visual{margin-top:2rem;}}

        /* SCORE CARDS */
        .score-cards-row{display:grid;grid-template-columns:repeat(3,1fr);gap:1rem;margin-bottom:1.5rem;}
        @media(max-width:768px){.score-cards-row{grid-template-columns:1fr;}}
        .score-card{border-radius:var(--r-xl);padding:1.8rem;box-shadow:var(--shadow-sm);height:100%;position:relative;overflow:hidden;border-top:5px solid transparent;}
        .score-card.stres  {border-top-color:#f59e0b;}
        .score-card.cemas  {border-top-color:var(--blue);}
        .score-card.depresi{border-top-color:var(--red);}
        .score-card::before{content:"";position:absolute;width:130px;height:130px;border-radius:50%;bottom:-45px;right:-45px;pointer-events:none;}
        .score-card.stres::before  {background:radial-gradient(circle,rgba(245,158,11,.1),transparent 70%);}
        .score-card.cemas::before  {background:radial-gradient(circle,rgba(27,58,254,.1),transparent 70%);}
        .score-card.depresi::before{background:radial-gradient(circle,rgba(220,38,38,.08),transparent 70%);}
        .score-icon{width:50px;height:50px;border-radius:14px;display:flex;align-items:center;justify-content:center;font-size:1.3rem;margin-bottom:1rem;}
        .score-card.stres   .score-icon{background:#fef3c7;color:#d97706;}
        .score-card.cemas   .score-icon{background:var(--blue-light);color:var(--blue);}
        .score-card.depresi .score-icon{background:#fee2e2;color:var(--red);}
        .score-label{font-size:.72rem;font-weight:700;text-transform:uppercase;letter-spacing:.12em;color:var(--text-3);margin-bottom:.3rem;}
        .score-number{font-family:'Poppins',sans-serif;font-size:2.8rem;line-height:1;margin-bottom:.8rem;}
        .score-card.stres   .score-number{color:#d97706;}
        .score-card.cemas   .score-number{color:var(--blue);}
        .score-card.depresi .score-number{color:var(--red);}

        /* STATUS BADGE di score card */
        .score-status{display:inline-flex;align-items:center;gap:.45rem;padding:.45rem 1rem;border-radius:30px;font-size:.82rem;font-weight:700;border:1.5px solid transparent;}
        .score-status .sdot{width:7px;height:7px;border-radius:50%;flex-shrink:0;}
        .ss-normal {background:#d1fae5;color:#065f46;border-color:#6ee7b7;} .ss-normal  .sdot{background:#059669;}
        .ss-ringan {background:#fef9c3;color:#854d0e;border-color:#fcd34d;} .ss-ringan  .sdot{background:#ca8a04;}
        .ss-sedang {background:#ffedd5;color:#7c2d12;border-color:#fdba74;} .ss-sedang  .sdot{background:#ea580c;}
        .ss-berat  {background:#fee2e2;color:#991b1b;border-color:#fca5a5;} .ss-berat   .sdot{background:#dc2626;}
        .ss-sberat {background:#fce7f3;color:#831843;border-color:#f9a8d4;} .ss-sberat  .sdot{background:#be185d;}

        .score-bar-track{height:5px;border-radius:30px;background:rgba(27,58,254,.08);margin-top:1.1rem;overflow:hidden;}
        .score-bar-fill{height:100%;border-radius:30px;transition:width .8s ease;}
        .score-card.stres   .score-bar-fill{background:#f59e0b;}
        .score-card.cemas   .score-bar-fill{background:var(--blue);}
        .score-card.depresi .score-bar-fill{background:var(--red);}

        /* SECTION */
        .sec-label{display:inline-block;background:rgba(27,58,254,.1);color:var(--blue);font-size:.7rem;font-weight:700;letter-spacing:.2em;text-transform:uppercase;padding:.35rem .85rem;border-radius:30px;margin-bottom:.75rem;border:1px solid rgba(27,58,254,.12);}
        .sec-title{font-family:'Poppins',sans-serif;font-size:1.55rem;color:var(--text-1);margin-bottom:1.3rem;line-height:1.25;}
        .card-wrap{border-radius:var(--r-xl);padding:2.5rem;box-shadow:var(--shadow-sm);margin-bottom:1.5rem;position:relative;overflow:hidden;}
        @media(max-width:768px){.card-wrap{padding:1.8rem;}}

        /* INSIGHT */
        .insight-item{background:rgba(255,255,255,.55);border:1px solid rgba(255,255,255,.75);border-radius:var(--r-lg);padding:1.1rem 1.3rem;display:flex;align-items:flex-start;gap:.9rem;backdrop-filter:blur(8px);}
        .insight-icon{width:42px;height:42px;border-radius:12px;background:rgba(27,58,254,.1);color:var(--blue);display:flex;align-items:center;justify-content:center;font-size:1rem;flex-shrink:0;}
        .insight-text strong{display:flex;align-items:center;gap:.5rem;flex-wrap:wrap;font-size:.9rem;color:var(--text-1);margin-bottom:.25rem;}
        .insight-text p{font-size:.86rem;color:var(--text-2);line-height:1.72;margin:0;}
        .insight-alert{background:rgba(255,248,240,.75);border-color:rgba(217,119,6,.2);}
        .insight-icon-alert{background:#fef3c7;color:#d97706;}
        .insight-tag{display:inline-block;background:#fef3c7;color:#92400e;font-size:.67rem;font-weight:700;letter-spacing:.1em;text-transform:uppercase;padding:.18rem .55rem;border-radius:20px;}

        /* CTA */
        .cta-banner{background:linear-gradient(135deg,var(--navy),var(--blue));border-radius:var(--r-xl);padding:3rem;color:white;position:relative;overflow:hidden;margin-bottom:1.5rem;box-shadow:var(--shadow-md);}
        .cta-banner::before{content:"";position:absolute;width:280px;height:280px;border-radius:50%;background:rgba(255,255,255,.06);top:-120px;right:-70px;}
        .cta-banner::after{content:"";position:absolute;width:180px;height:180px;border-radius:50%;background:rgba(255,255,255,.04);bottom:-70px;left:-55px;}
        .cta-inner{position:relative;z-index:1;}
        .cta-quote-mark{font-family:'Poppins',sans-serif;font-size:4.5rem;color:rgba(255,255,255,.14);line-height:.5;margin-bottom:1rem;}
        .cta-quote{font-family:'Poppins',sans-serif;font-size:1.45rem;line-height:1.5;margin-bottom:.9rem;}
        .cta-sub{color:rgba(255,255,255,.72);font-size:.88rem;line-height:1.8;}
        @media(max-width:768px){.cta-banner{padding:2rem;}.cta-quote{font-size:1.2rem;}}

        /* NEXT STEPS */
        .next-step-item{display:flex;align-items:flex-start;gap:.9rem;padding:.9rem 0;border-bottom:1px solid rgba(27,58,254,.07);}
        .next-step-item:last-child{border-bottom:none;}
        .next-step-num{width:34px;height:34px;border-radius:10px;background:rgba(27,58,254,.1);color:var(--blue);display:flex;align-items:center;justify-content:center;font-weight:700;font-size:.83rem;flex-shrink:0;}
        .next-step-text{font-size:.88rem;color:var(--text-2);line-height:1.72;}

        /* DISCLAIMER */
        .disclaimer-box{background:rgba(240,244,255,.75);backdrop-filter:blur(8px);border:1px solid rgba(27,58,254,.1);border-left:4px solid var(--blue);border-radius:0 var(--r-sm) var(--r-sm) 0;padding:1.1rem 1.3rem;display:flex;align-items:flex-start;gap:.75rem;}
        .disclaimer-box i{color:var(--blue);font-size:.95rem;margin-top:2px;flex-shrink:0;}
        .disclaimer-box p{font-size:.84rem;color:var(--text-2);line-height:1.72;margin:0;}

        /* BUTTONS */
        .btn-primary-res{display:inline-flex;align-items:center;gap:.55rem;background:var(--blue);color:white;padding:.88rem 1.7rem;border-radius:var(--r-sm);font-weight:600;font-size:.93rem;text-decoration:none;transition:all .2s;box-shadow:0 8px 24px rgba(27,58,254,.3);}
        .btn-primary-res:hover{background:#1228dd;transform:translateY(-2px);color:white;}
        .btn-ghost-res{display:inline-flex;align-items:center;gap:.55rem;background:rgba(255,255,255,.72);backdrop-filter:blur(8px);color:var(--text-2);padding:.88rem 1.7rem;border-radius:var(--r-sm);font-weight:600;font-size:.93rem;text-decoration:none;transition:all .2s;border:1.5px solid rgba(255,255,255,.85);box-shadow:0 4px 12px rgba(15,31,110,.07);}
        .btn-ghost-res:hover{border-color:var(--blue);color:var(--blue);transform:translateY(-2px);}

        .fade-up{opacity:0;transform:translateY(24px);transition:opacity .6s ease,transform .6s ease;}
        .fade-up.visible{opacity:1;transform:translateY(0);}
    </style>
</head>
<body>

    <!-- NAVBAR -->
    <div class="navbar-wrap">
        <div class="navbar-inner">
            <a href="/" class="nav-brand">
                <div class="nav-brand-icon"><i class="bi bi-clipboard2-pulse-fill"></i></div>
                DASS-21
            </a>
            <div class="navbar-steps">
                <div class="nstep done"><div class="nstep-dot"><i class="bi bi-check2" style="font-size:.65rem;"></i></div>Data Responden</div>
                <div class="nsep"></div>
                <div class="nstep done"><div class="nstep-dot"><i class="bi bi-check2" style="font-size:.65rem;"></i></div>21 Pertanyaan</div>
                <div class="nsep"></div>
                <div class="nstep active"><div class="nstep-dot">3</div>Hasil Assessment</div>
            </div>
        </div>
    </div>

    <div class="container page-body">

    @php
        /* ── LEVEL PER DIMENSI ── */
        $stresLabel='Normal'; $stresBadge='ss-normal'; $stresBar=12;
        if($stres>=26){$stresLabel='Sangat Berat';$stresBadge='ss-sberat';$stresBar=100;}
        elseif($stres>=19){$stresLabel='Berat';$stresBadge='ss-berat';$stresBar=78;}
        elseif($stres>=15){$stresLabel='Sedang';$stresBadge='ss-sedang';$stresBar=55;}
        elseif($stres>=10){$stresLabel='Ringan';$stresBadge='ss-ringan';$stresBar=34;}

        $cemasLabel='Normal'; $cemasBadge='ss-normal'; $cemasBar=12;
        if($kecemasan>=20){$cemasLabel='Sangat Berat';$cemasBadge='ss-sberat';$cemasBar=100;}
        elseif($kecemasan>=15){$cemasLabel='Berat';$cemasBadge='ss-berat';$cemasBar=78;}
        elseif($kecemasan>=10){$cemasLabel='Sedang';$cemasBadge='ss-sedang';$cemasBar=55;}
        elseif($kecemasan>=8){$cemasLabel='Ringan';$cemasBadge='ss-ringan';$cemasBar=34;}

        $depresiLabel='Normal'; $depresiBadge='ss-normal'; $depresiBar=12;
        if($depresi>=28){$depresiLabel='Sangat Berat';$depresiBadge='ss-sberat';$depresiBar=100;}
        elseif($depresi>=21){$depresiLabel='Berat';$depresiBadge='ss-berat';$depresiBar=78;}
        elseif($depresi>=14){$depresiLabel='Sedang';$depresiBadge='ss-sedang';$depresiBar=55;}
        elseif($depresi>=10){$depresiLabel='Ringan';$depresiBadge='ss-ringan';$depresiBar=34;}

        /*
         * ── KONDISI DOMINAN dari $prediksi (dari controller/Flask) ──
         * $prediksi berisi label KNN: misal "Stres", "Kecemasan", "Depresi", "Normal"
         * $heroClass digunakan untuk warna judul
         * $lvlClass dan $lvlLabel diambil dari level dimensi yang dominan
         */
        $pl = strtolower(trim($prediksi));
        $heroClass = 'normal';
        $lvlLabel  = 'Normal';
        $lvlClass  = 'lb-normal';

        if(str_contains($pl,'stres')){
            $heroClass = 'stres';
            $lvlLabel  = $stresLabel;
            $lvlMap = ['Normal'=>'lb-normal','Ringan'=>'lb-ringan','Sedang'=>'lb-sedang','Berat'=>'lb-berat','Sangat Berat'=>'lb-sberat'];
            $lvlClass = $lvlMap[$stresLabel] ?? 'lb-normal';
        } elseif(str_contains($pl,'cemas') || str_contains($pl,'anxiety')){
            $heroClass = 'cemas';
            $lvlLabel  = $cemasLabel;
            $lvlMap = ['Normal'=>'lb-normal','Ringan'=>'lb-ringan','Sedang'=>'lb-sedang','Berat'=>'lb-berat','Sangat Berat'=>'lb-sberat'];
            $lvlClass = $lvlMap[$cemasLabel] ?? 'lb-normal';
        } elseif(str_contains($pl,'depresi') || str_contains($pl,'depression')){
            $heroClass = 'depresi';
            $lvlLabel  = $depresiLabel;
            $lvlMap = ['Normal'=>'lb-normal','Ringan'=>'lb-ringan','Sedang'=>'lb-sedang','Berat'=>'lb-berat','Sangat Berat'=>'lb-sberat'];
            $lvlClass = $lvlMap[$depresiLabel] ?? 'lb-normal';
        } else {
            /* Normal — ambil level tertinggi sebagai info */
            $lvlLabel = 'Normal';
            $lvlClass = 'lb-normal';
        }
    @endphp

        <!-- HERO -->
        <div class="hero-result glass fade-up">
            <div class="row align-items-center gx-5">
                <div class="col-lg-7">
                    <div class="result-eyebrow">
                        <i class="bi bi-clipboard2-pulse-fill"></i>Hasil Assessment DASS-21
                    </div>

                    {{-- Info singkat: nama · prodi saja, TANPA semester (biar tidak double) --}}
                    <div class="result-user">
                        <i class="bi bi-person-circle"></i>
                        {{ session('profile.nama_lengkap','Anonymous') }}
                        &nbsp;·&nbsp;
                        {{ session('profile.prodi','-') }}
                    </div>

                    {{-- Kondisi Utama --}}
                    <div class="kondisi-wrap">
                        <h1 class="kondisi-name {{ $heroClass }}">{{ $prediksi }}</h1>
                    </div>

                    <p class="result-desc">
                        Berdasarkan jawaban DASS-21 kamu, sistem mengidentifikasi kondisi psikologis
                        yang perlu diperhatikan. Hasil ini diproses menggunakan algoritma KNN dan
                        bersifat sebagai screening awal, bukan diagnosis klinis.
                    </p>

                    {{-- Info pills: Total Skor + Semester saja --}}
                    <div class="info-pills">
                        <div class="info-pill">
                            <small>Total Skor</small>
                            <strong>{{ $depresi+$kecemasan+$stres }} / 126</strong>
                        </div>
                        <div class="info-pill">
                            <small>Semester</small>
                            <strong>{{ session('profile.semester','-') }}</strong>
                        </div>
                        <div class="info-pill">
                            <small>Status TA</small>
                            <strong>{{ session('profile.status_ta') === 'SEMPRO' ? 'Seminar Proposal' : (session('profile.status_ta') === 'SEMHAS' ? 'Seminar Hasil' : '-') }}</strong>
                        </div>
                    </div>
                </div>

                <div class="col-lg-5">
                    <div class="hero-visual">
                        <div class="hero-illus-wrap">
                            <div class="illus-ring-outer"></div>
                            <div class="illus-ring-inner"></div>
                            <div class="illus-dot d1"></div>
                            <div class="illus-dot d2"></div>
                            <div class="illus-dot d3"></div>
                            <div class="illus-float-card fc-top">
                                <div class="fc-icon" style="background:#d1fae5;color:#059669;"><i class="bi bi-shield-check"></i></div>
                                Hasil Tersimpan
                            </div>
                            <div class="illus-circle">
                                <svg viewBox="0 0 180 180" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <circle cx="90" cy="90" r="85" fill="#f0f4ff"/>
                                    <rect x="42" y="50" width="96" height="110" rx="12" fill="white" stroke="#dce5ff" stroke-width="2"/>
                                    <rect x="68" y="42" width="44" height="18" rx="9" fill="#1b3afe"/>
                                    <rect x="76" y="46" width="28" height="10" rx="5" fill="white" opacity=".3"/>
                                    <rect x="56" y="80" width="68" height="5" rx="2.5" fill="#e8eeff"/>
                                    <rect x="56" y="93" width="52" height="5" rx="2.5" fill="#e8eeff"/>
                                    <rect x="56" y="106" width="60" height="5" rx="2.5" fill="#e8eeff"/>
                                    <rect x="56" y="121" width="12" height="12" rx="3" fill="#1b3afe" opacity=".15" stroke="#1b3afe" stroke-width="1.5"/>
                                    <path d="M58.5 127 L61 129.5 L66.5 123" stroke="#1b3afe" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    <rect x="72" y="121" width="52" height="5" rx="2.5" fill="#e8eeff"/>
                                    <rect x="56" y="137" width="12" height="12" rx="3" fill="#1b3afe" opacity=".15" stroke="#1b3afe" stroke-width="1.5"/>
                                    <path d="M58.5 143 L61 145.5 L66.5 139" stroke="#1b3afe" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    <rect x="72" y="137" width="38" height="5" rx="2.5" fill="#e8eeff"/>
                                    <circle cx="130" cy="55" r="22" fill="#1b3afe" opacity=".07"/>
                                    <circle cx="130" cy="55" r="16" fill="white" stroke="#dce5ff" stroke-width="1.5"/>
                                    <path d="M122 54 C122 50 125 47 129 47 C130 47 131 47.5 132 48 C133 46 135 45 137 46 C140 47 141 50 140 53 C141.5 53.5 142 55 141 57 C140.5 59 138 60 136 59.5 C135.5 61 133.5 62 131 61 C129 62 127 61 126 59.5 C124 59.5 122 57.5 122 55 Z" fill="#1b3afe" opacity=".6"/>
                                    <circle cx="45" cy="55" r="4" fill="#1b3afe" opacity=".12"/>
                                    <circle cx="50" cy="145" r="3" fill="#059669" opacity=".28"/>
                                    <circle cx="148" cy="130" r="3" fill="#d97706" opacity=".28"/>
                                </svg>
                            </div>
                            <div class="illus-float-card fc-bot">
                                <div class="fc-icon" style="background:var(--blue-light);color:var(--blue);"><i class="bi bi-cpu-fill"></i></div>
                                Analisis KNN
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- SCORE CARDS -->
        <div class="score-cards-row fade-up">
            <div class="score-card stres glass">
                <div class="score-icon"><i class="bi bi-lightning-charge-fill"></i></div>
                <div class="score-label">Tingkat Stres</div>
                <div class="score-number">{{ $stres }}</div>
                <span class="score-status {{ $stresBadge }}"><span class="sdot"></span>{{ $stresLabel }}</span>
                <div class="score-bar-track"><div class="score-bar-fill" style="width:{{ $stresBar }}%"></div></div>
            </div>
            <div class="score-card cemas glass">
                <div class="score-icon"><i class="bi bi-cloud-lightning-rain-fill"></i></div>
                <div class="score-label">Tingkat Kecemasan</div>
                <div class="score-number">{{ $kecemasan }}</div>
                <span class="score-status {{ $cemasBadge }}"><span class="sdot"></span>{{ $cemasLabel }}</span>
                <div class="score-bar-track"><div class="score-bar-fill" style="width:{{ $cemasBar }}%"></div></div>
            </div>
            <div class="score-card depresi glass">
                <div class="score-icon"><i class="bi bi-heartbreak-fill"></i></div>
                <div class="score-label">Tingkat Depresi</div>
                <div class="score-number">{{ $depresi }}</div>
                <span class="score-status {{ $depresiBadge }}"><span class="sdot"></span>{{ $depresiLabel }}</span>
                <div class="score-bar-track"><div class="score-bar-fill" style="width:{{ $depresiBar }}%"></div></div>
            </div>
        </div>

        <!-- ANALISIS -->
        @php
            $jamTidur=session('profile.jam_tidur','');
            $bekerja=session('profile.bekerja','');
            $semester=session('profile.semester','');
            $statusTA=session('profile.status_ta','');
            $jenkel=session('profile.jenis_kelamin','');

            if($jamTidur==='< 5 Jam'){$tidurIcon='bi-moon-stars-fill';$tidurJudul='Pola Tidur Sangat Kurang';$tidurTeks='Kamu hanya tidur kurang dari 5 jam per malam. Ini tergolong sangat kurang dan berisiko tinggi memicu gangguan konsentrasi, ketidakstabilan emosi, serta memperberat tekanan psikologis.';$tidurAlert=true;}
            elseif($jamTidur==='5 - 6 Jam'){$tidurIcon='bi-moon-stars-fill';$tidurJudul='Pola Tidur Kurang Ideal';$tidurTeks='Kamu tidur sekitar 5–6 jam per malam. Meskipun masih bisa berfungsi, durasi ini di bawah rekomendasi ideal dan dapat mempengaruhi fokus serta kestabilan emosi.';$tidurAlert=false;}
            elseif($jamTidur==='7 - 8 Jam'){$tidurIcon='bi-moon-fill';$tidurJudul='Pola Tidur Cukup Baik';$tidurTeks='Kamu sudah tidur 7–8 jam per malam — durasi yang direkomendasikan untuk orang dewasa. Pertahankan pola ini agar kondisi mental dan fisik tetap terjaga.';$tidurAlert=false;}
            elseif($jamTidur==='>8 Jam'||$jamTidur==='> 8 Jam'){$tidurIcon='bi-moon-fill';$tidurJudul='Durasi Tidur Lebih dari 8 Jam';$tidurTeks='Tidur berlebihan bisa menjadi tanda kelelahan mental atau gejala depresi. Perhatikan kualitas dan pola aktivitas harianmu.';$tidurAlert=false;}
            else{$tidurIcon='bi-moon-stars-fill';$tidurJudul='Pola Tidur';$tidurTeks='Pola tidur yang cukup dan teratur sangat penting untuk menjaga kestabilan emosi dan ketahanan mental.';$tidurAlert=false;}

            if($bekerja==='Ya'){$kerjaIcon='bi-briefcase-fill';$kerjaJudul='Kamu Sedang Bekerja Sambil Kuliah';$kerjaTeks='Menjalani kuliah dan pekerjaan sekaligus adalah beban yang cukup besar. Pastikan kamu menjaga batas yang jelas antara waktu kerja, belajar, dan istirahat.';$kerjaAlert=true;}
            else{$kerjaIcon='bi-person-check-fill';$kerjaJudul='Tidak Bekerja Sambil Kuliah';$kerjaTeks='Kamu saat ini fokus pada perkuliahan tanpa beban pekerjaan tambahan. Ini memberi ruang lebih untuk fokus pada tugas akhir dan menjaga keseimbangan hidup.';$kerjaAlert=false;}

            $semAngka=(int)filter_var($semester,FILTER_SANITIZE_NUMBER_INT);
            if($semAngka>=9){
                $semIcon='bi-mortarboard-fill';
                $semJudul='Semester '.$semAngka.' — Fase Kritis Tugas Akhir';
                if($statusTA==='SEMPRO') $semTeks='Kamu berada di semester '.$semAngka.' dalam tahap Seminar Proposal. Fase ini sering menjadi titik tekanan tinggi karena banyak revisi dan persiapan.';
                elseif($statusTA==='SEMHAS') $semTeks='Kamu sudah mencapai tahap Seminar Hasil — hampir sampai di garis akhir! Tekanan memang tinggi, tapi kamu sudah menempuh jalan yang sangat panjang.';
                else $semTeks='Berada di semester '.$semAngka.' berarti kamu dalam fase paling padat. Tekanan dari tugas akhir dan target kelulusan sangat berpengaruh terhadap kondisi psikologis.';
                $semAlert=true;
            } else {
                $semIcon='bi-book-fill';$semJudul='Semester '.($semAngka?:'-');
                $semTeks='Di semester ini kamu mulai memasuki fase yang semakin padat. Kelola waktu dengan baik dan jangan ragu meminta bantuan.';
                $semAlert=false;
            }
            $showJenkel=($jenkel==='Perempuan');
        @endphp

        <div class="card-wrap glass fade-up">
            <span class="sec-label">Analisis Kondisi</span>
            <h2 class="sec-title">Faktor yang Mungkin Berpengaruh pada {{ session('profile.nama_lengkap','Kamu') }}</h2>
            <div class="d-flex flex-column gap-3">
                <div class="insight-item @if($tidurAlert) insight-alert @endif">
                    <div class="insight-icon @if($tidurAlert) insight-icon-alert @endif"><i class="bi {{ $tidurIcon }}"></i></div>
                    <div class="insight-text"><strong>{{ $tidurJudul }}@if($tidurAlert)<span class="insight-tag">Perlu Perhatian</span>@endif</strong><p>{{ $tidurTeks }}</p></div>
                </div>
                <div class="insight-item @if($semAlert) insight-alert @endif">
                    <div class="insight-icon @if($semAlert) insight-icon-alert @endif"><i class="bi {{ $semIcon }}"></i></div>
                    <div class="insight-text"><strong>{{ $semJudul }}@if($semAlert)<span class="insight-tag">Fase Kritis</span>@endif</strong><p>{{ $semTeks }}</p></div>
                </div>
                <div class="insight-item @if($kerjaAlert) insight-alert @endif">
                    <div class="insight-icon @if($kerjaAlert) insight-icon-alert @endif"><i class="bi {{ $kerjaIcon }}"></i></div>
                    <div class="insight-text"><strong>{{ $kerjaJudul }}@if($kerjaAlert)<span class="insight-tag">Perlu Diperhatikan</span>@endif</strong><p>{{ $kerjaTeks }}</p></div>
                </div>
                @if($showJenkel)
                <div class="insight-item">
                    <div class="insight-icon"><i class="bi bi-gender-female"></i></div>
                    <div class="insight-text"><strong>Faktor Hormonal &amp; Emosional</strong><p>Penelitian menunjukkan mahasiswi cenderung memiliki sensitivitas emosional lebih tinggi dalam menghadapi tekanan akademik. Penting untuk menjaga dukungan sosial dan tidak menanggung beban sendiri.</p></div>
                </div>
                @endif
            </div>
        </div>

        <!-- CTA -->
        <div class="cta-banner fade-up">
            <div class="cta-inner">
                <div class="row align-items-center">
                    <div class="col-lg-8">
                        <div class="cta-quote-mark">"</div>
                        <p class="cta-quote">Tidak semua hal harus diselesaikan sekaligus. Kamu sudah berusaha sampai sejauh ini.</p>
                        <p class="cta-sub">Istirahat sejenak bukan berarti menyerah. Tetap jaga pola tidur, makan dengan baik, dan jangan ragu mencari bantuan profesional jika mulai merasa kewalahan.</p>
                    </div>
                    <div class="col-lg-4 text-lg-end mt-3 mt-lg-0" aria-hidden="true">
                        <i class="bi bi-heart-fill" style="font-size:4.5rem;opacity:.15;"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- LANGKAH -->
        <div class="card-wrap glass fade-up">
            <span class="sec-label">Langkah Selanjutnya</span>
            <h2 class="sec-title">Apa yang Bisa Kamu Lakukan?</h2>
            <div class="next-step-item"><div class="next-step-num">1</div><div class="next-step-text">Gunakan hasil ini sebagai refleksi diri dan awareness terhadap kondisi mental yang sedang kamu alami saat ini.</div></div>
            <div class="next-step-item"><div class="next-step-num">2</div><div class="next-step-text">Ceritakan kondisi yang dirasakan kepada orang terpercaya seperti keluarga, sahabat, atau lingkungan suportif di sekitarmu.</div></div>
            <div class="next-step-item"><div class="next-step-num">3</div><div class="next-step-text">Jika gejala dirasa mengganggu aktivitas sehari-hari, pertimbangkan untuk berkonsultasi dengan psikolog atau konselor profesional.</div></div>
            <div class="next-step-item"><div class="next-step-num">4</div><div class="next-step-text">Lakukan assessment secara berkala untuk memantau perubahan kondisi psikologismu dari waktu ke waktu.</div></div>
        </div>

        <!-- DISCLAIMER -->
        <div class="mb-4 fade-up">
            <div class="disclaimer-box">
                <i class="bi bi-shield-exclamation"></i>
                <p><strong>Disclaimer:</strong> Hasil assessment ini merupakan media skrining awal menggunakan instrumen DASS-21 dan algoritma K-Nearest Neighbor (KNN). Hasil bukan diagnosis klinis resmi dan tidak menggantikan pemeriksaan langsung oleh psikolog maupun psikiater profesional.</p>
            </div>
        </div>

        <!-- BUTTONS -->
        <div class="text-center pb-4 fade-up">
            <a href="/" class="btn-ghost-res me-3"><i class="bi bi-house-door"></i>Kembali ke Beranda</a>
            <a href="{{ route('assessment.form') }}" class="btn-primary-res"><i class="bi bi-arrow-repeat"></i>Ulangi Assessment</a>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(e => { if(e.isIntersecting) e.target.classList.add('visible'); });
        }, { threshold: 0.1 });
        document.querySelectorAll('.fade-up').forEach(el => observer.observe(el));
    </script>
</body>
</html>