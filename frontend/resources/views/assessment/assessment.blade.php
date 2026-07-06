<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assessment Sampai Tenang | Mahasiswa</title>
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
            --r-lg: 16px;
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
            font-size: 1.3rem; font-weight: 700; line-height: 1.3;
            color: var(--white); margin-bottom: .8rem;
        }
        .left-title em { font-style: italic; color: var(--teal); font-weight: 300; }
        .left-desc {
            font-size: .74rem; color: rgba(255,255,255,.45);
            line-height: 1.8; margin-bottom: 1.8rem;
        }

        /* Steps */
        .left-steps { display: flex; flex-direction: column; gap: .55rem; margin-bottom: 1.6rem; }
        .step-row { display: flex; align-items: center; gap: .7rem; }
        .step-num {
            width: 26px; height: 26px; border-radius: 7px;
            display: flex; align-items: center; justify-content: center;
            font-size: .72rem; font-weight: 700; flex-shrink: 0;
        }
        .step-row.done     .step-num { background: rgba(0,201,167,.18); color: var(--teal); }
        .step-row.active   .step-num { background: var(--teal); color: var(--navy); }
        .step-row.inactive .step-num { background: rgba(255,255,255,.07); color: rgba(255,255,255,.25); }
        .step-label { font-size: .76rem; font-weight: 500; }
        .step-row.done     .step-label { color: rgba(255,255,255,.55); }
        .step-row.active   .step-label { color: var(--white); font-weight: 600; }
        .step-row.inactive .step-label { color: rgba(255,255,255,.28); }

        /* Progress left */
        .left-prog-label {
            display: flex; justify-content: space-between;
            font-size: .65rem; font-weight: 600; color: rgba(255,255,255,.45);
            text-transform: uppercase; letter-spacing: .1em;
            margin-bottom: .45rem;
        }
        .left-prog-track {
            height: 4px; background: rgba(255,255,255,.1);
            border-radius: 20px; overflow: hidden;
        }
        .left-prog-fill {
            height: 100%; background: var(--teal);
            border-radius: 20px; transition: width .4s ease;
            width: 0%;
        }

        .left-footer { position: relative; z-index: 1; }
        .left-footer p { font-size: .67rem; color: rgba(255,255,255,.27); line-height: 1.7; }

        /* ── RIGHT PANEL ── */
        .right-panel {
            flex: 1; background: #f4efe9;
            padding: 2rem 3rem;
            display: flex; flex-direction: column;
            min-height: 100vh;
        }

        /* Top bar */
        .top-bar {
            display: flex; align-items: center; justify-content: space-between;
            margin-bottom: 1.2rem;
        }
        .cat-badge {
            display: inline-flex; align-items: center; gap: .4rem;
            background: rgba(0,201,167,.12);
            border: 1px solid rgba(0,201,167,.25);
            color: var(--teal-mid);
            font-size: .68rem; font-weight: 700; letter-spacing: .15em;
            text-transform: uppercase; padding: .28rem .78rem;
            border-radius: 30px;
        }
        .cat-badge .dot { width: 5px; height: 5px; border-radius: 50%; background: var(--teal); }
        .q-counter {
            font-size: .85rem; font-weight: 500; color: var(--text-muted);
        }
        .q-counter strong {
            color: var(--teal-mid);
            font-weight: 700;
            font-size: 1rem;
        }

        /* Progress bar */
        .prog-track {
            height: 4px; background: rgba(0,0,0,.07);
            border-radius: 20px; overflow: hidden; margin-bottom: 1.8rem;
        }
        .prog-fill {
            height: 100%; background: var(--teal);
            border-radius: 20px; transition: width .4s ease;
        }

        /* Question card */
        .q-card {
            background: var(--white);
            border-radius: var(--r-lg);
            padding: 3rem 3.5rem;
            flex: 1;
            position: relative; overflow: hidden;
            box-shadow: 0 2px 20px rgba(0,0,0,.05);
            border: 1px solid rgba(0,0,0,.04);
            border: 1px solid rgba(0,0,0,.06);
        }
        .q-num-big {
            font-size: 7rem;
            font-weight: 700;
            line-height: 1;
            color: var(--teal-mid);
            opacity: 0.3;
            margin-bottom: .5rem;
            font-style: italic;
            user-select: none;
        }
        .q-text {
            font-size: 1.5rem; font-weight: 500;
            color: var(--text-dark); line-height: 1.45;
            margin-bottom: 2.2rem; min-height: 60px;
        }

        /* Answer options — horizontal list */
        .answer-list { display: flex; flex-direction: column; gap: .7rem; }
        .answer-btn {
            display: flex; align-items: center; gap: 1.2rem;
            background: #fafafa;
            border: 1.5px solid #ebebeb;
            border-radius: var(--r-md);
            padding: 1rem 1.4rem;
            cursor: pointer; text-align: left;
            transition: border-color .18s, background .18s, transform .15s, box-shadow .18s;
            width: 100%;
        }
        .answer-btn:hover {
            border-color: var(--teal);
            background: rgba(0,201,167,.04);
            transform: translateX(3px);
            box-shadow: 0 2px 12px rgba(0,201,167,.1);
        }
        .answer-btn.selected {
            border-color: var(--teal);
            background: rgba(0,201,167,.07);
            box-shadow: 0 2px 14px rgba(0,201,167,.12);
        }
        .answer-score {
            width: 36px; height: 36px; border-radius: 9px;
            background: var(--off-white); border: 1.5px solid #e0e0e0;
            display: flex; align-items: center; justify-content: center;
            font-size: .88rem; font-weight: 700; color: var(--text-muted);
            flex-shrink: 0; transition: all .18s;
        }
        .answer-btn.selected .answer-score {
            background: var(--teal); border-color: var(--teal); color: var(--navy);
        }
        .answer-info { flex: 1; }
        .answer-title {
            font-size: .9rem; font-weight: 600; color: var(--text-dark);
            margin-bottom: 2px;
        }
        .answer-desc { font-size: .78rem; color: var(--text-muted); line-height: 1.4; }
        .answer-btn.selected .answer-title { color: var(--navy); }

        /* Info note */
        .info-note {
            display: flex; align-items: flex-start; gap: .7rem;
            background: rgba(0,201,167,.05); border-radius: var(--r-sm);
            padding: .85rem 1.1rem; margin-top: 1.5rem;
            border: 1px solid rgba(0,201,167,.15);
        }
        .info-note i { color: var(--teal-mid); font-size: .9rem; margin-top: 1px; flex-shrink: 0; }
        .info-note p { font-size: .8rem; color: var(--text-muted); line-height: 1.65; margin: 0; }

        /* Navigation */
        .nav-bar {
            display: flex; align-items: center; justify-content: space-between;
            padding: 1.2rem 0 0; margin-top: .5rem;
        }
        .answered-count {
            font-size: .8rem; color: var(--text-muted); font-weight: 500;
        }
        .answered-count strong {
            color: var(--teal-mid);
            font-weight: 700;
        }
        .btn-prev {
            display: inline-flex; align-items: center; gap: .4rem;
            background: transparent; border: 1.5px solid #ddd;
            border-radius: var(--r-sm); padding: .6rem 1.2rem;
            font-size: .83rem; font-weight: 600; color: var(--text-muted);
            font-family: 'Poppins', sans-serif; cursor: pointer;
            transition: all .18s;
        }
        .btn-prev:hover:not(:disabled) { border-color: var(--navy); color: var(--navy); }
        .btn-prev:disabled { opacity: .3; cursor: not-allowed; }

        /* Fade animation */
        .fade-q { animation: fadeQ .28s ease; }
        @keyframes fadeQ {
            from { opacity: 0; transform: translateY(8px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        /* Next button override — selaraskan ke tema teal/navy */
        #btn-next-wrap button {
            background: var(--navy) !important;
            border-radius: var(--r-sm) !important;
            font-family: 'Poppins', sans-serif !important;
            font-size: .83rem !important;
            font-weight: 600 !important;
            transition: background .18s, transform .15s !important;
        }
        #btn-next-wrap button:not(:disabled):hover {
            background: #0d2540 !important;
            transform: translateY(-1px) !important;
        }
        #btn-next-wrap button:disabled {
            background: #c8d0dc !important;
            cursor: not-allowed !important;
            box-shadow: none !important;
        }

        /* Responsive */
        @media(max-width: 991px) {
            .left-panel { display: none; }
            .right-panel { padding: 1.5rem; }
        }
        @media(max-width: 576px) {
            .q-card { padding: 1.8rem 1.4rem; }
            .q-text { font-size: 1.2rem; }
            .q-num-big { font-size: 5rem; opacity: 0.25; }
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
            <h2 class="left-title">Jawab dengan <em>Jujur</em></h2>
            <p class="left-desc">Tidak ada jawaban benar atau salah. Pilih jawaban yang paling sesuai dengan kondisi yang kamu rasakan selama 1 minggu terakhir.</p>

            <div class="left-steps">
                <div class="step-row done">
                    <div class="step-num"><i class="bi bi-check2"></i></div>
                    <div class="step-label">Isi Data Responden</div>
                </div>
                <div class="step-row active">
                    <div class="step-num">2</div>
                    <div class="step-label">Jawab 21 Pertanyaan</div>
                </div>
                <div class="step-row inactive">
                    <div class="step-num">3</div>
                    <div class="step-label">Lihat Hasil Assessment</div>
                </div>
            </div>

            <div class="left-prog-label">
                <span>Progress</span>
                <span id="prog-text-left">0 / 21</span>
            </div>
            <div class="left-prog-track">
                <div class="left-prog-fill" id="prog-fill-left"></div>
            </div>
        </div>

        <div class="left-footer">
            <p>Hasil assessment bukan diagnosis klinis resmi. Konsultasikan ke profesional jika diperlukan.</p>
        </div>
    </div>

    <!-- RIGHT -->
    <div class="right-panel">

        <!-- Top bar -->
        <div class="top-bar">
            <div class="cat-badge">
                <span class="dot"></span>
                <span id="cat-label">Stres</span>
            </div>
            <div class="q-counter">Pertanyaan <strong id="cur-num">1</strong> dari 21</div>
        </div>

        <!-- Progress -->
        <div class="prog-track">
            <div class="prog-fill" id="prog-bar" style="width:4.76%"></div>
        </div>

        <!-- Hidden form -->
        <form id="assessmentForm" action="{{ route('predict', [], false) }}" method="POST" class="d-none">
            @csrf
            <input type="hidden" name="nama_lengkap"  value="{{ session('profile.nama_lengkap') }}">
            <input type="hidden" name="universitas"   value="{{ session('profile.universitas') }}">
            <input type="hidden" name="prodi"         value="{{ session('profile.prodi') }}">
            <input type="hidden" name="jenis_kelamin" value="{{ session('profile.jenis_kelamin') }}">
            <input type="hidden" name="semester"      value="{{ session('profile.semester') }}">
            <input type="hidden" name="usia"          value="{{ session('profile.usia') }}">
            <input type="hidden" name="status_ta"     value="{{ session('profile.status_ta') }}">
            <input type="hidden" name="jam_tidur"     value="{{ session('profile.jam_tidur') }}">
            <input type="hidden" name="bekerja"       value="{{ session('profile.bekerja') }}">
            @for($i = 1; $i <= 21; $i++)
            <input type="hidden" name="q{{ $i }}" id="q{{ $i }}">
            @endfor
        </form>

        <!-- Question card -->
        <div class="q-card fade-q" id="q-card">
            <div class="q-num-big" id="q-num-big">1</div>
            <div class="q-text" id="question-text">Memuat pertanyaan...</div>

            <div class="answer-list">
                <button type="button" class="answer-btn" onclick="selectAnswer(0)">
                    <div class="answer-score">0</div>
                    <div class="answer-info">
                        <div class="answer-title">Tidak Pernah</div>
                        <div class="answer-desc">Tidak sesuai dengan kondisi saya</div>
                    </div>
                </button>
                <button type="button" class="answer-btn" onclick="selectAnswer(1)">
                    <div class="answer-score">1</div>
                    <div class="answer-info">
                        <div class="answer-title">Kadang Terjadi</div>
                        <div class="answer-desc">Sedikit sesuai dengan kondisi ini</div>
                    </div>
                </button>
                <button type="button" class="answer-btn" onclick="selectAnswer(2)">
                    <div class="answer-score">2</div>
                    <div class="answer-info">
                        <div class="answer-title">Cukup Sering</div>
                        <div class="answer-desc">Saya cukup sering mengalaminya</div>
                    </div>
                </button>
                <button type="button" class="answer-btn" onclick="selectAnswer(3)">
                    <div class="answer-score">3</div>
                    <div class="answer-info">
                        <div class="answer-title">Sangat Sering</div>
                        <div class="answer-desc">Hampir selalu saya rasakan</div>
                    </div>
                </button>
            </div>

            <div class="info-note">
                <i class="bi bi-info-circle"></i>
                <p>Jawab berdasarkan kondisi yang kamu rasakan selama <strong>1 minggu terakhir</strong>. Tidak ada jawaban benar atau salah.</p>
            </div>
        </div>

        <!-- Navigation -->
        <div class="nav-bar">
            <button type="button" class="btn-prev" id="btn-prev" onclick="prevQuestion()" disabled>
                <i class="bi bi-chevron-left"></i> Sebelumnya
            </button>
            <div class="answered-count">
                <strong id="answered-count">0</strong> dari 21 terjawab
            </div>
            <div id="btn-next-wrap"></div>
        </div>

    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
// ── SYNC UI ──
function syncProgressUI(current, total, categoryName) {
    const pct = Math.round((current / total) * 100);

    // progress bars
    const pb = document.getElementById('prog-bar');
    if (pb) pb.style.width = pct + '%';
    const pfl = document.getElementById('prog-fill-left');
    if (pfl) pfl.style.width = pct + '%';

    // text
    document.getElementById('prog-text-left').textContent = current + ' / ' + total;
    document.getElementById('cur-num').textContent = current;
    document.getElementById('q-num-big').textContent = current;

    // category
    if (categoryName) document.getElementById('cat-label').textContent = categoryName;

    // answered count
    const ans = window._answers || {};
    const cnt = Object.keys(ans).length;
    document.getElementById('answered-count').textContent = cnt;

    // prev button
    document.getElementById('btn-prev').disabled = (current <= 1);

    // card animation
    const card = document.getElementById('q-card');
    if (card) {
        card.classList.remove('fade-q');
        void card.offsetWidth;
        card.classList.add('fade-q');
    }
}

// ── HIGHLIGHT ANSWER ──
function highlightAnswer(value) {
    document.querySelectorAll('.answer-btn').forEach((btn, i) => {
        btn.classList.toggle('selected', i === value);
    });
}

// ── BUILD DOTS (tidak dipakai di desain ini tapi dipertahankan agar js assessment tetap jalan) ──
function buildDots(currentIdx, total) {}
</script>

<script src="/js/assessment.js"></script>
</body>
</html>