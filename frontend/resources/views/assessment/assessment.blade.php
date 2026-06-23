<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>
        Assessment DASS-21 | Mahasiswa
    </title>

    <!-- Bootstrap -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet"
    >

    <!-- Bootstrap Icons -->
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
    >

    <style>

        :root{

            --blue-dark:#0f1f6e;
            --blue-main:#1b3afe;
            --blue-light:#e8eeff;
            --blue-soft:#f0f4ff;

            --text-dark:#0d1540;
            --text-mid:#4a5480;
            --text-light:#8892b8;

            --white:#ffffff;
            --bg:#f4f7fe;

            --radius-lg:28px;
            --radius-md:18px;
            --radius-sm:12px;

            --shadow-lg:0 40px 100px rgba(15,31,110,.10);
            --shadow-md:0 20px 50px rgba(15,31,110,.07);
            --shadow-sm:0 8px 24px rgba(15,31,110,.06);

        }

        *{
            box-sizing:border-box;
        }

        body{

            background:var(--bg);
            font-family:'Poppins',sans-serif;
            color:var(--text-dark);
            min-height:100vh;
            -webkit-font-smoothing:antialiased;

        }

        /* =========================
           PAGE WRAPPER
        ========================= */

        .page-wrapper{

            display:flex;
            min-height:100vh;

        }

        /* =========================
           LEFT PANEL
        ========================= */

        .left-panel{

            width:380px;
            flex-shrink:0;

            background:
                linear-gradient(
                    160deg,
                    var(--blue-dark) 0%,
                    var(--blue-main) 100%
                );

            padding:3rem 2.5rem;

            display:flex;
            flex-direction:column;
            justify-content:space-between;

            position:sticky;
            top:0;

            height:100vh;
            overflow:hidden;

        }

        .left-panel::before{

            content:"";

            position:absolute;

            width:300px;
            height:300px;

            border-radius:50%;

            background:rgba(255,255,255,.05);

            top:-100px;
            right:-100px;

        }

        .left-panel::after{

            content:"";

            position:absolute;

            width:220px;
            height:220px;

            border-radius:50%;

            background:rgba(255,255,255,.04);

            bottom:-80px;
            left:-80px;

        }

        .left-brand{

            display:flex;
            align-items:center;
            gap:.6rem;

            color:white;
            text-decoration:none;

            font-weight:700;
            font-size:1.1rem;

            position:relative;
            z-index:2;

        }

        .brand-dot{

            width:8px;
            height:8px;

            border-radius:50%;
            background:white;

        }

        .left-content{

            position:relative;
            z-index:2;

        }

        .left-badge{

            display:inline-flex;
            align-items:center;
            gap:.5rem;

            background:rgba(255,255,255,.12);

            color:rgba(255,255,255,.9);

            padding:.45rem 1rem;

            border-radius:30px;

            font-size:.72rem;
            font-weight:700;
            letter-spacing:.18em;

            text-transform:uppercase;

            margin-bottom:1.5rem;

        }

        .left-badge .dot{

            width:6px;
            height:6px;

            border-radius:50%;
            background:#7fffb0;

            animation:pulse 2s infinite;

        }

        @keyframes pulse{

            0%,100%{
                opacity:1;
                transform:scale(1);
            }

            50%{
                opacity:.4;
                transform:scale(1.4);
            }

        }

        .left-title{

            font-family:'Poppins',sans-serif;
            font-size:2rem;

            color:white;

            line-height:1.2;

            margin-bottom:1rem;

        }

        .left-title em{

            color:rgba(255,255,255,.75);

        }

        .left-desc{

            color:rgba(255,255,255,.72);

            line-height:1.85;
            font-size:.9rem;

            margin-bottom:2rem;

        }

        /* STEPS */

        .left-steps{

            display:flex;
            flex-direction:column;
            gap:.9rem;

        }

        .step-item{

            display:flex;
            align-items:center;
            gap:.9rem;

            color:rgba(255,255,255,.55);

            font-size:.88rem;
            font-weight:500;

        }

        .step-item.done{

            color:rgba(255,255,255,.75);

        }

        .step-item.active{

            color:white;
            font-weight:700;

        }

        .step-num{

            width:32px;
            height:32px;

            border-radius:10px;

            background:rgba(255,255,255,.1);

            display:flex;
            align-items:center;
            justify-content:center;

            font-size:.82rem;
            font-weight:700;

            flex-shrink:0;

            color:rgba(255,255,255,.6);

        }

        .step-item.done .step-num{

            background:rgba(127,255,176,.2);
            color:#7fffb0;

        }

        .step-item.active .step-num{

            background:white;
            color:var(--blue-main);

        }

        /* PROGRESS LEFT */

        .left-progress-wrap{

            margin-top:2rem;

        }

        .left-progress-label{

            display:flex;
            justify-content:space-between;

            color:rgba(255,255,255,.65);

            font-size:.78rem;

            margin-bottom:.5rem;

        }

        .left-progress-bar-bg{

            height:6px;
            background:rgba(255,255,255,.15);

            border-radius:30px;
            overflow:hidden;

        }

        .left-progress-bar-fill{

            height:100%;
            width:0%;

            background:#7fffb0;

            border-radius:30px;

            transition:width .4s ease;

        }

        .left-footer{

            position:relative;
            z-index:2;

        }

        .left-footer p{

            color:rgba(255,255,255,.45);

            font-size:.77rem;
            line-height:1.7;

            margin:0;

        }

        /* =========================
           RIGHT PANEL
        ========================= */

        .right-panel{

            flex:1;

            padding:3rem 3.5rem;

            overflow-y:auto;

            display:flex;
            flex-direction:column;

        }

        /* TOPBAR */

        .top-bar{

            display:flex;
            align-items:center;
            justify-content:space-between;

            margin-bottom:2rem;

        }

        .category-badge{

            display:inline-flex;
            align-items:center;
            gap:.5rem;

            background:var(--blue-light);
            color:var(--blue-main);

            padding:.45rem 1rem;

            border-radius:30px;

            font-size:.75rem;
            font-weight:700;
            letter-spacing:.18em;

            text-transform:uppercase;

        }

        .category-badge .dot{

            width:6px;
            height:6px;

            border-radius:50%;
            background:var(--blue-main);

        }

        .question-counter{

            font-size:.9rem;
            font-weight:600;

            color:var(--text-mid);

        }

        .question-counter span{

            color:var(--blue-main);
            font-weight:700;

        }

        /* PROGRESS BAR */

        .progress-wrap{

            margin-bottom:2rem;

        }

        .progress-track{

            height:6px;

            background:var(--blue-light);

            border-radius:30px;

            overflow:hidden;

        }

        .progress-fill{

            height:100%;
            width:4.76%;

            background:var(--blue-main);

            border-radius:30px;

            transition:width .4s ease;

        }

        /* QUESTION CARD */

        .question-card{

            background:white;

            border-radius:var(--radius-lg);

            padding:3rem;

            box-shadow:var(--shadow-md);

            position:relative;
            overflow:hidden;

            margin-bottom:1.5rem;

        }

        .question-card::before{

            content:"";

            position:absolute;

            width:300px;
            height:300px;

            border-radius:50%;

            background:
                radial-gradient(
                    circle,
                    rgba(27,58,254,.04),
                    transparent 65%
                );

            top:-120px;
            right:-120px;

        }

        .question-number-tag{

            width:44px;
            height:44px;

            border-radius:14px;

            background:var(--blue-light);
            color:var(--blue-main);

            display:flex;
            align-items:center;
            justify-content:center;

            font-weight:700;
            font-size:1rem;

            margin-bottom:1.5rem;

        }

        .question-text{

            font-family:'Poppins',sans-serif;

            font-size:1.65rem;

            line-height:1.45;

            color:var(--text-dark);

            margin-bottom:2rem;

            min-height:80px;

        }

        /* ANSWERS */

        .answer-grid{

            display:grid;
            grid-template-columns:1fr 1fr;

            gap:.9rem;

        }

        .answer-btn{

            background:var(--blue-soft);

            border:1.5px solid rgba(27,58,254,.1);

            border-radius:var(--radius-md);

            padding:1.2rem 1.4rem;

            display:flex;
            align-items:center;
            gap:1rem;

            cursor:pointer;

            text-align:left;

            transition:all .22s ease;

            width:100%;

        }

        .answer-btn:hover{

            background:var(--blue-light);

            border-color:var(--blue-main);

            transform:translateY(-2px);

            box-shadow:var(--shadow-sm);

        }

        .answer-btn.selected{

            background:var(--blue-main);

            border-color:var(--blue-main);

            box-shadow:0 10px 25px rgba(27,58,254,.25);

        }

        .answer-score{

            width:44px;
            height:44px;

            border-radius:14px;

            background:var(--blue-light);
            color:var(--blue-main);

            display:flex;
            align-items:center;
            justify-content:center;

            font-weight:700;
            font-size:1rem;

            flex-shrink:0;

        }

        .answer-btn.selected .answer-score{

            background:rgba(255,255,255,.18);
            color:white;

        }

        .answer-info{

            flex:1;

        }

        .answer-title{

            font-size:.92rem;
            font-weight:700;

            color:var(--text-dark);

            margin-bottom:2px;

        }

        .answer-btn.selected .answer-title{

            color:white;

        }

        .answer-desc{

            font-size:.8rem;

            color:var(--text-mid);

            line-height:1.4;

        }

        .answer-btn.selected .answer-desc{

            color:rgba(255,255,255,.78);

        }

        /* INFO BOX */

        .info-box{

            background:var(--blue-soft);

            border:1px solid rgba(27,58,254,.1);

            border-radius:var(--radius-md);

            padding:1rem 1.3rem;

            display:flex;
            align-items:flex-start;
            gap:.8rem;

            margin-top:1.5rem;

        }

        .info-box i{

            color:var(--blue-main);

            font-size:1rem;

            margin-top:2px;

            flex-shrink:0;

        }

        .info-box p{

            margin:0;

            color:var(--text-mid);

            line-height:1.7;
            font-size:.85rem;

        }

        /* NAVIGATION */

        .nav-actions{

            display:flex;
            align-items:center;
            justify-content:space-between;

            margin-top:auto;

            padding-top:1.5rem;

        }

        .btn-prev{

            background:white;

            border:1.5px solid #dce5ff;

            border-radius:var(--radius-sm);

            padding:.75rem 1.4rem;

            color:var(--text-mid);

            display:inline-flex;
            align-items:center;
            gap:.5rem;

            font-size:.9rem;
            font-weight:600;

            transition:.2s;

        }

        .btn-prev:hover{

            border-color:var(--blue-main);
            color:var(--blue-main);

        }

        .btn-prev:disabled{

            opacity:.35;
            cursor:not-allowed;

        }

        .q-dots{

            display:flex;
            flex-wrap:wrap;
            gap:6px;

            justify-content:center;

            max-width:300px;

        }

        .q-dot{

            width:8px;
            height:8px;

            border-radius:50%;

            background:#dce5ff;

            transition:.2s;

        }

        .q-dot.answered{

            background:var(--blue-main);

        }

        .q-dot.current{

            background:var(--blue-main);

            transform:scale(1.5);

        }

        /* RESPONSIVE */

        @media(max-width:991px){

            .left-panel{
                display:none;
            }

            .right-panel{
                padding:2rem 1.5rem;
            }

        }

        @media(max-width:576px){

            .right-panel{
                padding:1.5rem 1rem;
            }

            .question-card{
                padding:1.8rem 1.4rem;
            }

            .question-text{
                font-size:1.3rem;
            }

            .answer-grid{
                grid-template-columns:1fr;
            }

        }

        /* ANIMATION */

        .fade-question{

            animation:fadeQ .3s ease;

        }

        @keyframes fadeQ{

            from{
                opacity:0;
                transform:translateY(10px);
            }

            to{
                opacity:1;
                transform:translateY(0);
            }

        }

    </style>

</head>

<body>

<div class="page-wrapper">

    <!-- LEFT PANEL -->

    <div class="left-panel">

        <a href="/" class="left-brand">

            <span class="brand-dot"></span>

            DASS-21

        </a>

        <div class="left-content">

            <div class="left-badge">

                <span class="dot"></span>

                Student Assessment

            </div>

            <h2 class="left-title">

                Jawab dengan <em>Jujur</em>

            </h2>

            <p class="left-desc">

                Tidak ada jawaban benar atau salah.
                Pilih jawaban yang paling sesuai dengan kondisi
                yang kamu rasakan selama 1 minggu terakhir.

            </p>

            <div class="left-steps">

                <div class="step-item done">

                    <div class="step-num">
                        <i class="bi bi-check2"></i>
                    </div>

                    Isi Data Responden

                </div>

                <div class="step-item active">

                    <div class="step-num">
                        2
                    </div>

                    Jawab 21 Pertanyaan

                </div>

                <div class="step-item">

                    <div class="step-num">
                        3
                    </div>

                    Lihat Hasil Assessment

                </div>

            </div>

            <div class="left-progress-wrap">

                <div class="left-progress-label">

                    <span>Progress</span>

                    <span id="progress-text-left">
                        0 / 21
                    </span>

                </div>

                <div class="left-progress-bar-bg">

                    <div
                        class="left-progress-bar-fill"
                        id="progress-fill-left"
                        style="width:0%"
                    ></div>

                </div>

            </div>

        </div>

        <div class="left-footer">

            <p>

                Hasil assessment bukan diagnosis klinis resmi.
                Konsultasikan ke profesional jika diperlukan.

            </p>

        </div>

    </div>

    <!-- RIGHT PANEL -->

    <div class="right-panel">

        <!-- TOP BAR -->

        <div class="top-bar">

            <div class="category-badge">

                <span class="dot"></span>

                <span id="category-label">
                    Stres
                </span>

            </div>

            <div class="question-counter">

                Pertanyaan
                <span id="current-number">1</span>
                dari
                <span>21</span>

            </div>

        </div>

        <!-- PROGRESS -->

        <div class="progress-wrap">

            <div class="progress-track">

                <div
                    class="progress-fill"
                    id="progress-bar"
                    style="width:4.76%"
                ></div>

            </div>

        </div>

        <!-- FORM -->

        <form
            id="assessmentForm"
            action="{{ route('predict', [], false) }}"
            method="POST"
            class="d-none"
        >

            @csrf

            <!-- PROFILE -->
            <input type="hidden" name="nama_lengkap" value="{{ session('profile.nama_lengkap') }}">
            <input type="hidden" name="universitas" value="{{ session('profile.universitas') }}">
            <input type="hidden" name="prodi" value="{{ session('profile.prodi') }}">
            <input type="hidden" name="jenis_kelamin" value="{{ session('profile.jenis_kelamin') }}">
            <input type="hidden" name="semester" value="{{ session('profile.semester') }}">
            <input type="hidden" name="usia" value="{{ session('profile.usia') }}">
            <input type="hidden" name="status_ta" value="{{ session('profile.status_ta') }}">
            <input type="hidden" name="jam_tidur" value="{{ session('profile.jam_tidur') }}">
            <input type="hidden" name="bekerja" value="{{ session('profile.bekerja') }}">

            <!-- QUESTIONS -->
            @for($i = 1; $i <= 21; $i++)

                <input
                    type="hidden"
                    name="q{{ $i }}"
                    id="q{{ $i }}"
                >

            @endfor

        </form>

        <!-- QUESTION CARD -->

        <div
            id="question-card"
            class="question-card fade-question"
        >

            <div
                class="question-number-tag"
                id="q-num-tag"
            >
                1
            </div>

            <div
                id="question-text"
                class="question-text"
            >
                Memuat pertanyaan...
            </div>

            <!-- ANSWERS -->

            <div
                class="answer-grid"
                id="answer-options"
            >

                <button
                    type="button"
                    class="answer-btn"
                    onclick="selectAnswer(0)"
                >

                    <div class="answer-score">
                        0
                    </div>

                    <div class="answer-info">

                        <div class="answer-title">
                            Tidak Pernah
                        </div>

                        <div class="answer-desc">
                            Tidak sesuai dengan kondisi saya
                        </div>

                    </div>

                </button>

                <button
                    type="button"
                    class="answer-btn"
                    onclick="selectAnswer(1)"
                >

                    <div class="answer-score">
                        1
                    </div>

                    <div class="answer-info">

                        <div class="answer-title">
                            Kadang Terjadi
                        </div>

                        <div class="answer-desc">
                            Sesekali saya merasakan kondisi ini
                        </div>

                    </div>

                </button>

                <button
                    type="button"
                    class="answer-btn"
                    onclick="selectAnswer(2)"
                >

                    <div class="answer-score">
                        2
                    </div>

                    <div class="answer-info">

                        <div class="answer-title">
                            Cukup Sering
                        </div>

                        <div class="answer-desc">
                            Saya cukup sering mengalaminya
                        </div>

                    </div>

                </button>

                <button
                    type="button"
                    class="answer-btn"
                    onclick="selectAnswer(3)"
                >

                    <div class="answer-score">
                        3
                    </div>

                    <div class="answer-info">

                        <div class="answer-title">
                            Sangat Sering
                        </div>

                        <div class="answer-desc">
                            Hampir selalu saya rasakan
                        </div>

                    </div>

                </button>

            </div>

            <!-- INFO -->

            <div class="info-box">

                <i class="bi bi-info-circle-fill"></i>

                <p>

                    Jawab berdasarkan kondisi yang kamu rasakan selama
                    <strong>1 minggu terakhir</strong>.
                    Tidak ada jawaban benar atau salah.

                </p>

            </div>

        </div>

        <!-- NAVIGATION -->

        <div class="nav-actions">

            <button
                type="button"
                class="btn-prev"
                id="btn-prev"
                onclick="prevQuestion()"
                disabled
            >

                <i class="bi bi-arrow-left"></i>

                Sebelumnya

            </button>

            <div
                class="q-dots"
                id="q-dots"
            ></div>

            <!-- NEXT BUTTON -->
            <div id="btn-next-wrap"></div>

        </div>

    </div>

</div>

<!-- BOOTSTRAP -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>

    // =========================
    // SYNC PROGRESS UI
    // =========================

    function syncProgressUI(current,total,categoryName){

        const pct = Math.round((current / total) * 100);

        // RIGHT BAR
        const pb = document.getElementById('progress-bar');

        if(pb){

            pb.style.width = pct + '%';

        }

        // LEFT BAR
        const pfl = document.getElementById('progress-fill-left');

        if(pfl){

            pfl.style.width = pct + '%';

        }

        // TEXT LEFT
        const ptl = document.getElementById('progress-text-left');

        if(ptl){

            ptl.textContent = current + ' / ' + total;

        }

        // CURRENT NUMBER
        const cn = document.getElementById('current-number');

        if(cn){

            cn.textContent = current;

        }

        // TAG NUMBER
        const qt = document.getElementById('q-num-tag');

        if(qt){

            qt.textContent = current;

        }

        // CATEGORY
        const cl = document.getElementById('category-label');

        if(cl && categoryName){

            cl.textContent = categoryName;

        }

        // DOTS
        buildDots(current - 1,total);

        // ANIMATION
        const card = document.getElementById('question-card');

        if(card){

            card.classList.remove('fade-question');

            void card.offsetWidth;

            card.classList.add('fade-question');

        }

        // PREV BUTTON
        const btnPrev = document.getElementById('btn-prev');

        if(btnPrev){

            btnPrev.disabled = (current <= 1);

        }

    }

    // =========================
    // HIGHLIGHT ANSWER
    // =========================

    function highlightAnswer(value){

        document.querySelectorAll('.answer-btn').forEach((btn,index)=>{

            btn.classList.toggle('selected',index === value);

        });

    }

    // =========================
    // BUILD DOTS
    // =========================

    function buildDots(currentIdx,total){

        const wrap = document.getElementById('q-dots');

        if(!wrap) return;

        wrap.innerHTML = '';

        const answers = window._answers || [];

        for(let i = 0; i < total; i++){

            const d = document.createElement('div');

            d.className = 'q-dot';

            if(i === currentIdx){

                d.classList.add('current');

            }else if(answers[i] !== undefined){

                d.classList.add('answered');

            }

            wrap.appendChild(d);

        }

    }

    // INIT DOTS
    buildDots(0,21);

</script>

<!-- JS ASSESSMENT -->
<script src="/js/assessment.js"></script>

</body>
</html>
