<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Assessment | Sampai Tenang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        :root {
            --navy:      #0b1a2e;
            --navy-mid:  #112240;
            --teal:      #00c9a7;
            --teal-mid:  #00b49a;
            --teal-light:#d4f5ef;
            --off-white: #f7f4f0;
            --white:     #ffffff;
            --text-dark: #1e293b;
            --text-mid:  #475569;
            --text-muted:#94a3b8;
            --border:    #e9edf2;
            --r-xl: 20px;
            --r-lg: 14px;
            --r-md: 10px;
            --r-sm: 8px;
            --shadow-sm: 0 4px 16px rgba(0,0,0,.04);
            --soft-stres:    #f59e0b;
            --soft-stres-bg: #fffbeb;
            --soft-stres-soft:#fef3c7;
            --soft-cemas:    #0e7490;
            --soft-cemas-bg: #ecfdf5;
            --soft-cemas-soft:#d1fae5;
            --soft-depresi:  #7c3aed;
            --soft-depresi-bg:#f5f3ff;
            --soft-depresi-soft:#ede9fe;
        }
        * { box-sizing: border-box; margin: 0; padding: 0; }
        html { scroll-behavior: smooth; }
        body {
            font-family: 'Poppins', sans-serif;
            -webkit-font-smoothing: antialiased;
            background: var(--off-white);
            color: var(--text-dark);
            min-height: 100vh;
        }

        /* ── NAVBAR ── */
        .navbar-wrap {
            position: sticky; top: 0; z-index: 100;
            background: var(--navy);
            padding: 0 2.5rem;
            height: 52px;
            display: flex; align-items: center; justify-content: space-between;
            border-bottom: 1px solid rgba(255,255,255,.06);
        }
        .nav-brand { display: flex; align-items: center; gap: .5rem; text-decoration: none; }
        .nav-brand-icon {
            width: 26px; height: 26px; border-radius: 7px;
            background: var(--teal);
            display: flex; align-items: center; justify-content: center;
            color: var(--navy); font-size: .7rem;
        }
        .nav-brand-text { font-size: .88rem; font-weight: 600; color: var(--white); }
        .nav-steps { display: flex; align-items: center; gap: .6rem; }
        .nstep {
            display: inline-flex; align-items: center; gap: .4rem;
            font-size: .75rem; font-weight: 500;
            color: rgba(255,255,255,.35); padding: .3rem .75rem;
            border-radius: 20px;
        }
        .nstep .ndot {
            width: 18px; height: 18px; border-radius: 5px;
            display: flex; align-items: center; justify-content: center;
            font-size: .65rem; font-weight: 700;
            background: rgba(255,255,255,.1); color: rgba(255,255,255,.4);
        }
        .nstep.done { color: rgba(255,255,255,.55); }
        .nstep.done .ndot { background: rgba(0,201,167,.2); color: var(--teal); }
        .nstep.active { background: var(--teal); color: var(--navy); font-weight: 600; }
        .nstep.active .ndot { background: rgba(0,0,0,.15); color: var(--navy); }
        .nsep { width: 20px; height: 1px; background: rgba(255,255,255,.15); }
        @media(max-width: 768px) { .nav-steps { display: none; } }

        .page-body { padding: 2rem 0 5rem; }

        /* ── HERO CARD ── */
        .hero-card {
            background: var(--white);
            border-radius: var(--r-xl);
            padding: 2.5rem 3rem;
            margin-bottom: 1.2rem;
            position: relative; overflow: hidden;
            box-shadow: var(--shadow-sm);
        }
        .hero-card::after {
            content: ""; position: absolute;
            width: 300px; height: 300px; border-radius: 50%;
            background: rgba(0,201,167,.04);
            top: -100px; right: -100px; pointer-events: none;
        }
        .result-eyebrow {
            display: inline-flex; align-items: center; gap: .4rem;
            font-size: .6rem; font-weight: 700; letter-spacing: .18em;
            text-transform: uppercase; color: var(--teal-mid);
            margin-bottom: .75rem;
        }
        .result-eyebrow::before {
            content: ""; width: 16px; height: 1.5px;
            background: var(--teal-mid); border-radius: 2px; display: inline-block;
        }
        .result-user {
            font-size: .82rem; color: var(--text-muted); font-weight: 500;
            display: flex; align-items: center; gap: .35rem;
            margin-bottom: .85rem;
        }
        .kondisi-name {
            font-size: 2.8rem; font-weight: 600; line-height: 1.1;
            margin-bottom: 1rem;
        }
        .kondisi-name.stres   { color: var(--soft-stres); }
        .kondisi-name.cemas   { color: var(--soft-cemas); }
        .kondisi-name.depresi { color: var(--soft-depresi); }
        .kondisi-name.normal  { color: var(--teal-mid); }
        .result-desc {
            font-size: .85rem; color: var(--text-mid);
            line-height: 1.8; margin-bottom: 1.5rem; max-width: 480px;
        }
        .info-pills { display: flex; flex-wrap: wrap; gap: .6rem; }
        .info-pill {
            background: var(--off-white);
            border: 1px solid var(--border);
            border-radius: var(--r-lg); padding: .6rem .9rem;
        }
        .info-pill small {
            display: block; font-size: .6rem; font-weight: 700;
            text-transform: uppercase; letter-spacing: .08em;
            color: var(--text-muted); margin-bottom: .2rem;
        }
        .info-pill strong { font-size: .88rem; font-weight: 600; color: var(--text-dark); }

        /* ── ILUSTRASI HERO ── */
        .hero-illus-wrap {
            position: relative; width: 240px; height: 220px;
            margin: auto;
            display: flex; align-items: center; justify-content: center;
        }
        .hero-illus-content {
            width: 220px; height: 200px;
            border-radius: 18px; overflow: hidden;
            box-shadow: 0 16px 48px rgba(11,26,46,.18), 0 2px 8px rgba(0,0,0,.08);
            position: relative; z-index: 2;
        }
        .hero-illus-content svg { width: 100%; height: 100%; display: block; }

        /* float card lebih kecil dan subtil */
        .float-card {
            position: absolute; z-index: 3;
            background: rgba(255,255,255,.92);
            backdrop-filter: blur(8px);
            border: 1px solid rgba(0,201,167,.2);
            border-radius: 30px;
            padding: .35rem .85rem;
            display: flex; align-items: center; gap: .35rem;
            font-size: .7rem; font-weight: 600;
            color: var(--navy);
            box-shadow: 0 4px 16px rgba(0,0,0,.08);
            white-space: nowrap;
            animation: floatY 4s ease-in-out infinite;
        }
        .float-card.bot { bottom: 10px; left: 50%; transform: translateX(-50%); animation-delay: 0s; }
        .fc-dot {
            width: 7px; height: 7px; border-radius: 50%;
            background: var(--teal); flex-shrink: 0;
            animation: pulse 2s infinite;
        }
        @keyframes floatY { 0%,100%{transform:translateX(-50%) translateY(0)} 50%{transform:translateX(-50%) translateY(-5px)} }
        @keyframes pulse { 0%,100%{opacity:1;transform:scale(1)} 50%{opacity:.5;transform:scale(1.3)} }
        @media(max-width: 991px) { .hero-illus-wrap { width: 200px; height: 190px; } }

        /* ── SCORE CARDS ── */
        .score-grid {
            display: grid; grid-template-columns: repeat(3,1fr);
            gap: 1rem; margin-bottom: 1.2rem;
        }
        @media(max-width: 768px) { .score-grid { grid-template-columns: 1fr; } }
        .score-card {
            background: var(--white);
            border-radius: var(--r-xl);
            padding: 1.6rem 1.8rem;
            border-top: 4px solid transparent;
            position: relative; overflow: hidden;
            box-shadow: var(--shadow-sm);
            transition: transform .2s ease, box-shadow .2s ease;
        }
        .score-card:hover { transform: translateY(-3px); box-shadow: 0 12px 32px rgba(0,0,0,.06); }
        .score-card.stres   { border-top-color: var(--soft-stres); }
        .score-card.cemas   { border-top-color: var(--soft-cemas); }
        .score-card.depresi { border-top-color: var(--soft-depresi); }
        .score-icon {
            width: 44px; height: 44px; border-radius: 12px;
            display: flex; align-items: center; justify-content: center;
            font-size: 1.1rem; margin-bottom: .85rem;
        }
        .score-card.stres   .score-icon { background: var(--soft-stres-soft); color: var(--soft-stres); }
        .score-card.cemas   .score-icon { background: var(--soft-cemas-soft); color: var(--soft-cemas); }
        .score-card.depresi .score-icon { background: var(--soft-depresi-soft); color: var(--soft-depresi); }
        .score-label { font-size: .65rem; font-weight: 700; text-transform: uppercase; letter-spacing: .1em; color: var(--text-muted); margin-bottom: .3rem; }
        .score-number { font-size: 2.6rem; font-weight: 600; line-height: 1; margin-bottom: .75rem; }
        .score-card.stres   .score-number { color: var(--soft-stres); }
        .score-card.cemas   .score-number { color: var(--soft-cemas); }
        .score-card.depresi .score-number { color: var(--soft-depresi); }
        .score-badge {
            display: inline-flex; align-items: center; gap: .35rem;
            padding: .3rem .85rem; border-radius: 20px;
            font-size: .72rem; font-weight: 600; border: 1px solid transparent;
        }
        .score-badge .bdot { width: 6px; height: 6px; border-radius: 50%; flex-shrink: 0; }
        .sb-normal  { background: #d1fae5; color: #065f46; border-color: #a7f3d0; } .sb-normal  .bdot { background: #059669; }
        .sb-ringan  { background: #dbeafe; color: #1e40af; border-color: #bfdbfe; } .sb-ringan  .bdot { background: #2563eb; }
        .sb-sedang  { background: #fef3c7; color: #92400e; border-color: #fde68a; } .sb-sedang  .bdot { background: #d97706; }
        .sb-berat   { background: #ffedd5; color: #9a3412; border-color: #fed7aa; } .sb-berat   .bdot { background: #ea580c; }
        .sb-sberat  { background: #fce7f3; color: #831843; border-color: #fbcfe8; } .sb-sberat  .bdot { background: #db2777; }
        .score-bar-track { height: 4px; border-radius: 20px; background: rgba(0,0,0,.06); margin-top: 1rem; overflow: hidden; }
        .score-bar-fill { height: 100%; border-radius: 20px; transition: width .8s ease; }
        .score-card.stres   .score-bar-fill { background: var(--soft-stres); }
        .score-card.cemas   .score-bar-fill { background: var(--soft-cemas); }
        .score-card.depresi .score-bar-fill { background: var(--soft-depresi); }

        /* ── SECTION CARD ── */
        .sec-card { background: var(--white); border-radius: var(--r-xl); padding: 2rem 2.5rem; margin-bottom: 1.2rem; box-shadow: var(--shadow-sm); }
        .sec-eyebrow {
            display: inline-flex; align-items: center; gap: .4rem;
            background: rgba(0,201,167,.08); border: 1px solid rgba(0,201,167,.15);
            color: var(--teal-mid); font-size: .6rem; font-weight: 700;
            letter-spacing: .15em; text-transform: uppercase;
            padding: .25rem .8rem; border-radius: 20px; margin-bottom: .7rem;
        }
        .sec-eyebrow i { font-size: .7rem; }
        .sec-title { font-size: 1.3rem; font-weight: 600; color: var(--text-dark); margin-bottom: 1.3rem; line-height: 1.3; }
        .insight-item {
            display: flex; align-items: flex-start; gap: .85rem;
            background: #faf9f7; border: 1px solid var(--border);
            border-radius: var(--r-lg); padding: 1rem 1.2rem;
        }
        .insight-item.alert { background: var(--soft-stres-bg); border-color: rgba(245,158,11,.2); }
        .insight-icon {
            width: 38px; height: 38px; border-radius: 10px;
            background: rgba(0,201,167,.08); color: var(--teal-mid);
            display: flex; align-items: center; justify-content: center;
            font-size: .9rem; flex-shrink: 0;
        }
        .insight-item.alert .insight-icon { background: var(--soft-stres-soft); color: var(--soft-stres); }
        .insight-title { font-size: .86rem; font-weight: 600; color: var(--text-dark); margin-bottom: .2rem; display: flex; align-items: center; gap: .5rem; flex-wrap: wrap; }
        .insight-desc { font-size: .8rem; color: var(--text-mid); line-height: 1.7; }
        .alert-tag { display: inline-block; background: #fef3c7; color: #92400e; font-size: .6rem; font-weight: 700; letter-spacing: .08em; text-transform: uppercase; padding: .1rem .5rem; border-radius: 20px; }

        /* ── CTA ── */
        .cta-banner { background: var(--navy); border-radius: var(--r-xl); padding: 2.5rem 3rem; margin-bottom: 1.2rem; position: relative; overflow: hidden; }
        .cta-banner::before { content: ""; position: absolute; width: 260px; height: 260px; border-radius: 50%; background: rgba(0,201,167,.06); top: -100px; right: -80px; }
        .cta-banner::after  { content: ""; position: absolute; width: 180px; height: 180px; border-radius: 50%; background: rgba(0,201,167,.04); bottom: -60px; left: -50px; }
        .cta-inner { position: relative; z-index: 1; }
        .cta-quote-mark { font-size: 4rem; color: rgba(255,255,255,.12); line-height: .5; margin-bottom: .8rem; font-style: italic; font-weight: 700; }
        .cta-quote { font-size: 1.35rem; font-weight: 600; color: var(--white); line-height: 1.5; margin-bottom: .7rem; }
        .cta-sub { font-size: .83rem; color: rgba(255,255,255,.55); line-height: 1.8; }

        /* ── STEPS ── */
        .step-item { display: flex; align-items: flex-start; gap: .85rem; padding: .85rem 0; border-bottom: 1px solid var(--border); }
        .step-item:last-child { border-bottom: none; padding-bottom: 0; }
        .step-num { width: 30px; height: 30px; border-radius: 8px; background: rgba(0,201,167,.08); color: var(--teal-mid); display: flex; align-items: center; justify-content: center; font-size: .78rem; font-weight: 700; flex-shrink: 0; }
        .step-text { font-size: .85rem; color: var(--text-mid); line-height: 1.75; }

        /* ── DISCLAIMER ── */
        .disclaimer-box { background: var(--white); border: 1px solid var(--border); border-left: 4px solid var(--teal); border-radius: 0 var(--r-sm) var(--r-sm) 0; padding: 1rem 1.2rem; display: flex; align-items: flex-start; gap: .65rem; margin-bottom: 1.5rem; box-shadow: var(--shadow-sm); }
        .disclaimer-box i { color: var(--teal-mid); font-size: .9rem; margin-top: 2px; flex-shrink: 0; }
        .disclaimer-box p { font-size: .8rem; color: var(--text-mid); line-height: 1.7; margin: 0; }

        /* ── BUTTONS ── */
        .btn-primary-res { display: inline-flex; align-items: center; gap: .5rem; background: var(--teal); color: var(--navy); padding: .85rem 1.8rem; border-radius: 30px; font-weight: 700; font-size: .88rem; text-decoration: none; transition: background .2s, transform .15s; }
        .btn-primary-res:hover { background: var(--teal-mid); color: var(--navy); transform: translateY(-1px); }
        .btn-ghost-res { display: inline-flex; align-items: center; gap: .5rem; background: transparent; color: var(--text-mid); border: 1.5px solid var(--border); padding: .85rem 1.6rem; border-radius: 30px; font-weight: 600; font-size: .88rem; text-decoration: none; transition: all .2s; }
        .btn-ghost-res:hover { border-color: var(--text-dark); color: var(--text-dark); }

        .fade-up { opacity: 0; transform: translateY(20px); transition: opacity .55s ease, transform .55s ease; }
        .fade-up.visible { opacity: 1; transform: translateY(0); }
    </style>
</head>
<body>

<!-- NAVBAR -->
<div class="navbar-wrap">
    <a href="/" class="nav-brand">
        <div class="nav-brand-icon"><i class="bi bi-pin-angle-fill"></i></div>
        <span class="nav-brand-text">Sampai Tenang</span>
    </a>
    <div class="nav-steps">
        <div class="nstep done"><div class="ndot"><i class="bi bi-check2" style="font-size:.6rem;"></i></div>Data</div>
        <div class="nsep"></div>
        <div class="nstep done"><div class="ndot"><i class="bi bi-check2" style="font-size:.6rem;"></i></div>Kuesioner</div>
        <div class="nsep"></div>
        <div class="nstep active"><div class="ndot">3</div>Hasil</div>
    </div>
</div>

<div class="container page-body">

@php
    $stresLabel='Normal'; $stresBadge='sb-normal'; $stresBar=10;
    if($stres>=26){$stresLabel='Sangat Berat';$stresBadge='sb-sberat';$stresBar=100;}
    elseif($stres>=19){$stresLabel='Berat';$stresBadge='sb-berat';$stresBar=76;}
    elseif($stres>=15){$stresLabel='Sedang';$stresBadge='sb-sedang';$stresBar=54;}
    elseif($stres>=10){$stresLabel='Ringan';$stresBadge='sb-ringan';$stresBar=32;}

    $cemasLabel='Normal'; $cemasBadge='sb-normal'; $cemasBar=10;
    if($kecemasan>=20){$cemasLabel='Sangat Berat';$cemasBadge='sb-sberat';$cemasBar=100;}
    elseif($kecemasan>=15){$cemasLabel='Berat';$cemasBadge='sb-berat';$cemasBar=76;}
    elseif($kecemasan>=10){$cemasLabel='Sedang';$cemasBadge='sb-sedang';$cemasBar=54;}
    elseif($kecemasan>=8){$cemasLabel='Ringan';$cemasBadge='sb-ringan';$cemasBar=32;}

    $depresiLabel='Normal'; $depresiBadge='sb-normal'; $depresiBar=10;
    if($depresi>=28){$depresiLabel='Sangat Berat';$depresiBadge='sb-sberat';$depresiBar=100;}
    elseif($depresi>=21){$depresiLabel='Berat';$depresiBadge='sb-berat';$depresiBar=76;}
    elseif($depresi>=14){$depresiLabel='Sedang';$depresiBadge='sb-sedang';$depresiBar=54;}
    elseif($depresi>=10){$depresiLabel='Ringan';$depresiBadge='sb-ringan';$depresiBar=32;}

    $pl = strtolower(trim($prediksi));
    $heroClass = 'normal';
    if(str_contains($pl,'stres')) $heroClass='stres';
    elseif(str_contains($pl,'cemas')||str_contains($pl,'kecemasan')) $heroClass='cemas';
    elseif(str_contains($pl,'depresi')) $heroClass='depresi';

    $jamTidur = session('profile.jam_tidur','');
    $bekerja  = session('profile.bekerja','');
    $semester = session('profile.semester','');
    $statusTA = session('profile.status_ta','');

    if($jamTidur==='< 5 Jam'){$tIcon='bi-moon-stars-fill';$tJudul='Pola Tidur Sangat Kurang';$tTeks='Kamu hanya tidur kurang dari 5 jam per malam. Ini tergolong sangat kurang dan berisiko memicu gangguan konsentrasi, ketidakstabilan emosi, serta memperberat tekanan psikologis.';$tAlert=true;}
    elseif($jamTidur==='5 - 6 Jam'){$tIcon='bi-moon-stars-fill';$tJudul='Pola Tidur Kurang Ideal';$tTeks='Kamu tidur sekitar 5–6 jam per malam. Durasi ini di bawah rekomendasi ideal dan dapat mempengaruhi fokus serta kestabilan emosi.';$tAlert=false;}
    elseif($jamTidur==='7 - 8 Jam'){$tIcon='bi-moon-fill';$tJudul='Pola Tidur Cukup Baik';$tTeks='Kamu sudah tidur 7–8 jam per malam — durasi yang direkomendasikan. Pertahankan pola ini agar kondisi mental dan fisik tetap terjaga.';$tAlert=false;}
    else{$tIcon='bi-moon-fill';$tJudul='Durasi Tidur Lebih dari 8 Jam';$tTeks='Tidur berlebihan bisa menjadi tanda kelelahan mental. Perhatikan kualitas dan pola aktivitas harianmu.';$tAlert=false;}

    if($bekerja==='Ya'){$kIcon='bi-briefcase-fill';$kJudul='Bekerja Sambil Kuliah';$kTeks='Menjalani kuliah dan pekerjaan sekaligus adalah beban yang cukup besar. Pastikan kamu menjaga batas yang jelas antara waktu kerja, belajar, dan istirahat.';$kAlert=true;}
    else{$kIcon='bi-person-check-fill';$kJudul='Fokus pada Perkuliahan';$kTeks='Kamu saat ini fokus pada perkuliahan. Ini memberi ruang lebih untuk fokus pada tugas akhir dan menjaga keseimbangan hidup.';$kAlert=false;}

    $semAngka=(int)filter_var($semester,FILTER_SANITIZE_NUMBER_INT);
    if($semAngka>=9){
        $sIcon='bi-mortarboard-fill';$sJudul='Semester '.$semAngka.' — Fase Kritis';
        $sTeks=$statusTA==='SEMPRO'?'Kamu berada di semester '.$semAngka.' dalam tahap Seminar Proposal. Fase ini sering menjadi titik tekanan tinggi karena banyak revisi dan persiapan.':($statusTA==='SEMHAS'?'Kamu sudah mencapai tahap Seminar Hasil — hampir sampai di garis akhir! Tekanan memang tinggi, tapi kamu sudah menempuh jalan yang sangat panjang.':'Berada di semester '.$semAngka.' berarti kamu dalam fase paling padat. Tekanan dari tugas akhir dan target kelulusan sangat berpengaruh terhadap kondisi psikologis.');
        $sAlert=true;
    } else {
        $sIcon='bi-book-fill';$sJudul='Semester '.($semAngka?:'-');
        $sTeks='Di semester ini kamu mulai memasuki fase yang semakin padat. Kelola waktu dengan baik dan jangan ragu meminta bantuan.';
        $sAlert=false;
    }
@endphp

    <!-- HERO -->
    <div class="hero-card fade-up">
        <div class="row align-items-center gx-5">
            <div class="col-lg-7">
                <div class="result-eyebrow">Hasil Assessment DASS-21</div>
                <div class="result-user">
                    <i class="bi bi-person-circle" style="color:var(--teal-mid);"></i>
                    {{ session('profile.nama_lengkap','Anonymous') }}
                    &nbsp;·&nbsp;
                    {{ session('profile.semester','-') }}
                    &nbsp;·&nbsp;
                    {{ session('profile.prodi','-') }}
                </div>
                <h1 class="kondisi-name {{ $heroClass }}">{{ $prediksi }}</h1>
                <p class="result-desc">Berdasarkan jawaban DASS-21 kamu, sistem mengidentifikasi kondisi psikologis yang perlu diperhatikan. Hasil ini merupakan skrining awal, bukan diagnosis klinis.</p>
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
                        <strong>{{ session('profile.status_ta')==='SEMPRO'?'Seminar Proposal':(session('profile.status_ta')==='SEMHAS'?'Seminar Hasil':'-') }}</strong>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 mt-4 mt-lg-0">
                <div class="hero-illus-wrap">
                    <!-- Ilustrasi malam yang tenang — selaras tema navy & teal -->
                    <div class="hero-illus-content">
                        <svg viewBox="0 0 220 200" xmlns="http://www.w3.org/2000/svg" width="220" height="200">
                            <defs>
                                <radialGradient id="skyGrad" cx="55%" cy="25%" r="75%">
                                    <stop offset="0%" stop-color="#152a45"/>
                                    <stop offset="100%" stop-color="#0a1628"/>
                                </radialGradient>
                                <radialGradient id="moonGlow" cx="50%" cy="50%" r="50%">
                                    <stop offset="0%" stop-color="#00c9a7" stop-opacity="0.18"/>
                                    <stop offset="100%" stop-color="#00c9a7" stop-opacity="0"/>
                                </radialGradient>
                                <radialGradient id="groundGrad" cx="50%" cy="0%" r="100%">
                                    <stop offset="0%" stop-color="#0f2540"/>
                                    <stop offset="100%" stop-color="#081422"/>
                                </radialGradient>
                            </defs>

                            <!-- Langit -->
                            <rect width="220" height="200" fill="url(#skyGrad)"/>

                            <!-- Glow bulan — halus -->
                            <circle cx="155" cy="46" r="32" fill="url(#moonGlow)"/>
                            <!-- Bulan -->
                            <circle cx="155" cy="46" r="16" fill="#c8e8e2" opacity=".88"/>
                            <!-- Bayangan sabit — membentuk crescent -->
                            <circle cx="162" cy="42" r="12.5" fill="#152a45"/>

                            <!-- Bintang — halus, tidak mencolok -->
                            <circle cx="38"  cy="20" r="1"   fill="#ffffff" opacity=".5"/>
                            <circle cx="70"  cy="12" r=".8"  fill="#ffffff" opacity=".4"/>
                            <circle cx="98"  cy="28" r="1.1" fill="#ffffff" opacity=".45"/>
                            <circle cx="28"  cy="46" r=".7"  fill="#ffffff" opacity=".4"/>
                            <circle cx="52"  cy="58" r=".9"  fill="#ffffff" opacity=".35"/>
                            <circle cx="188" cy="18" r="1"   fill="#ffffff" opacity=".45"/>
                            <circle cx="18"  cy="72" r=".6"  fill="#ffffff" opacity=".3"/>
                            <circle cx="122" cy="16" r=".8"  fill="#ffffff" opacity=".4"/>
                            <circle cx="80"  cy="44" r=".6"  fill="#ffffff" opacity=".3"/>
                            <circle cx="140" cy="32" r=".7"  fill="#ffffff" opacity=".35"/>

                            <!-- Bukit belakang — lebih subtle -->
                            <ellipse cx="48"  cy="188" rx="105" ry="50" fill="#0d2438" opacity=".75"/>
                            <ellipse cx="188" cy="192" rx="85"  ry="46" fill="#0b1e30" opacity=".85"/>

                            <!-- Bukit depan -->
                            <ellipse cx="110" cy="212" rx="148" ry="56" fill="url(#groundGrad)"/>

                            <!-- Refleksi air — sangat halus -->
                            <rect x="0"  y="148" width="220" height="6" fill="#00c9a7" opacity=".04" rx="2"/>
                            <rect x="30" y="155" width="160" height="3" fill="#00c9a7" opacity=".03" rx="2"/>

                            <!-- Tanaman kiri -->
                            <path d="M16 202 Q20 168 26 150"
                                stroke="#00c9a7" stroke-width="1.6" fill="none"
                                stroke-linecap="round" opacity=".4"/>
                            <path d="M26 150 Q16 140  8 144 Q14 132 26 150"
                                fill="#00c9a7" opacity=".28"/>
                            <path d="M22 162 Q10 156  6 162 Q12 150 22 162"
                                fill="#00c9a7" opacity=".2"/>

                            <!-- Tanaman kanan -->
                            <path d="M204 202 Q200 170 194 152"
                                stroke="#00c9a7" stroke-width="1.6" fill="none"
                                stroke-linecap="round" opacity=".4"/>
                            <path d="M194 152 Q204 142 212 146 Q206 134 194 152"
                                fill="#00c9a7" opacity=".28"/>
                            <path d="M198 164 Q210 158 214 164 Q208 154 198 164"
                                fill="#00c9a7" opacity=".2"/>

                            <!-- Sparkle — sangat halus -->
                            <path d="M86 88 L87.6 83 L89.2 88 L94 89.6 L89.2 91.2 L87.6 96 L86 91.2 L81 89.6 Z"
                                fill="#00c9a7" opacity=".22"/>
                            <path d="M128 73 L129 70 L130 73 L133 74 L130 75 L129 78 L128 75 L125 74 Z"
                                fill="#c8e8e2" opacity=".28"/>

                            <!-- Pill bawah — diperbesar agar teks lebih besar -->
                            <rect x="35" y="170" width="150" height="24" rx="12"
                                fill="rgba(0,201,167,0.12)"/>
                            <rect x="35" y="170" width="150" height="24" rx="12"
                                fill="none" stroke="#00c9a7" stroke-width=".8" stroke-opacity=".3"/>
                            <circle cx="55" cy="182" r="4" fill="#00c9a7" opacity=".8"/>
                            <text x="66" y="187"
                                font-family="'Poppins',sans-serif"
                                font-size="11" font-weight="600"
                                fill="white" opacity=".9">Hasil tersimpan</text>
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- SCORE CARDS -->
    <div class="score-grid fade-up" style="transition-delay:.1s">
        <div class="score-card stres">
            <div class="score-icon"><i class="bi bi-exclamation-triangle-fill"></i></div>
            <div class="score-label">Tingkat Stres</div>
            <div class="score-number">{{ $stres }}</div>
            <span class="score-badge {{ $stresBadge }}"><span class="bdot"></span>{{ $stresLabel }}</span>
            <div class="score-bar-track"><div class="score-bar-fill" style="width:{{ $stresBar }}%"></div></div>
        </div>
        <div class="score-card cemas">
            <div class="score-icon"><i class="bi bi-cloud-lightning-rain-fill"></i></div>
            <div class="score-label">Tingkat Kecemasan</div>
            <div class="score-number">{{ $kecemasan }}</div>
            <span class="score-badge {{ $cemasBadge }}"><span class="bdot"></span>{{ $cemasLabel }}</span>
            <div class="score-bar-track"><div class="score-bar-fill" style="width:{{ $cemasBar }}%"></div></div>
        </div>
        <div class="score-card depresi">
            <div class="score-icon"><i class="bi bi-heartbreak-fill"></i></div>
            <div class="score-label">Tingkat Depresi</div>
            <div class="score-number">{{ $depresi }}</div>
            <span class="score-badge {{ $depresiBadge }}"><span class="bdot"></span>{{ $depresiLabel }}</span>
            <div class="score-bar-track"><div class="score-bar-fill" style="width:{{ $depresiBar }}%"></div></div>
        </div>
    </div>

    <!-- ANALISIS -->
    <div class="sec-card fade-up" style="transition-delay:.15s">
        <div class="sec-eyebrow"><i class="bi bi-clipboard2-pulse-fill me-1"></i> Analisis Kondisi</div>
        <h2 class="sec-title">Faktor yang Mungkin Berpengaruh pada {{ session('profile.nama_lengkap','Kamu') }}</h2>
        <div class="d-flex flex-column gap-3">
            <div class="insight-item">
                <div class="insight-icon"><i class="bi {{ $tIcon }}"></i></div>
                <div>
                    <div class="insight-title">{{ $tJudul }}@if($tAlert)<span class="alert-tag">Perlu Perhatian</span>@endif</div>
                    <div class="insight-desc">{{ $tTeks }}</div>
                </div>
            </div>
            <div class="insight-item @if($sAlert) alert @endif">
                <div class="insight-icon @if($sAlert) style='background:var(--soft-stres-soft);color:var(--soft-stres);' @endif"><i class="bi {{ $sIcon }}"></i></div>
                <div>
                    <div class="insight-title">{{ $sJudul }}@if($sAlert)<span class="alert-tag">Fase Kritis</span>@endif</div>
                    <div class="insight-desc">{{ $sTeks }}</div>
                </div>
            </div>
            <div class="insight-item @if($kAlert) alert @endif">
                <div class="insight-icon"><i class="bi {{ $kIcon }}"></i></div>
                <div>
                    <div class="insight-title">{{ $kJudul }}@if($kAlert)<span class="alert-tag">Perlu Diperhatikan</span>@endif</div>
                    <div class="insight-desc">{{ $kTeks }}</div>
                </div>
            </div>
        </div>
    </div>

    <!-- CTA -->
    <div class="cta-banner fade-up" style="transition-delay:.2s">
        <div class="cta-inner">
            <div class="row align-items-center">
                <div class="col-lg-9">
                    <div class="cta-quote-mark">"</div>
                    <p class="cta-quote">Tidak semua hal harus diselesaikan sekaligus. Kamu sudah berusaha sampai sejauh ini.</p>
                    <p class="cta-sub">Istirahat sejenak bukan berarti menyerah. Tetap jaga pola tidur, makan dengan baik, dan jangan ragu mencari bantuan profesional jika mulai merasa kewalahan.</p>
                </div>
                <div class="col-lg-3 text-lg-end mt-3 mt-lg-0" aria-hidden="true">
                    <i class="bi bi-heart-fill" style="font-size:3.5rem;opacity:.1;color:var(--teal);"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- LANGKAH -->
    <div class="sec-card fade-up" style="transition-delay:.25s">
        <div class="sec-eyebrow"><i class="bi bi-lightbulb-fill me-1"></i> Langkah Selanjutnya</div>
        <h2 class="sec-title">Apa yang Bisa Kamu Lakukan?</h2>
        <div class="step-item"><div class="step-num">1</div><div class="step-text">Gunakan hasil ini sebagai refleksi diri dan awareness terhadap kondisi mental yang sedang kamu alami saat ini.</div></div>
        <div class="step-item"><div class="step-num">2</div><div class="step-text">Ceritakan kondisi yang dirasakan kepada orang terpercaya seperti keluarga, sahabat, atau lingkungan suportif di sekitarmu.</div></div>
        <div class="step-item"><div class="step-num">3</div><div class="step-text">Jika gejala dirasa mengganggu aktivitas sehari-hari, pertimbangkan untuk berkonsultasi dengan psikolog atau konselor profesional.</div></div>
        <div class="step-item"><div class="step-num">4</div><div class="step-text">Lakukan assessment secara berkala untuk memantau perubahan kondisi psikologismu dari waktu ke waktu.</div></div>
    </div>

    <!-- DISCLAIMER -->
    <div class="disclaimer-box fade-up" style="transition-delay:.3s">
        <i class="bi bi-info-circle-fill"></i>
        <p><strong>Disclaimer:</strong> Hasil assessment ini merupakan media skrining awal menggunakan instrumen DASS-21. Hasil bukan diagnosis klinis resmi dan tidak menggantikan pemeriksaan langsung oleh psikolog maupun psikiater profesional.</p>
    </div>

    <!-- BUTTONS -->
    <div class="text-center pb-4 fade-up" style="transition-delay:.35s">
        <a href="/" class="btn-ghost-res me-3"><i class="bi bi-house-door"></i>Kembali ke Beranda</a>
        <a href="{{ route('assessment.form') }}" class="btn-primary-res"><i class="bi bi-arrow-repeat"></i>Ulangi Assessment</a>
    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
const obs = new IntersectionObserver(entries => {
    entries.forEach(e => { if(e.isIntersecting) e.target.classList.add('visible'); });
}, { threshold: 0.08 });
document.querySelectorAll('.fade-up').forEach(el => obs.observe(el));
</script>
</body>
</html>