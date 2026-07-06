const questions = [

    // STRES
    { q: "Saya merasa sulit untuk tenang", cat: "Stres" },
    { q: "Saya cenderung bereaksi berlebihan terhadap situasi", cat: "Stres" },
    { q: "Saya merasa menggunakan banyak energi untuk merasa cemas", cat: "Stres" },
    { q: "Saya menemukan diri saya menjadi gelisah", cat: "Stres" },
    { q: "Saya merasa sulit untuk bersantai", cat: "Stres" },
    { q: "Saya tidak dapat memaklumi hal yang menghalangi saya", cat: "Stres" },
    { q: "Saya merasa bahwa saya agak mudah tersinggung", cat: "Stres" },

    // KECEMASAN
    { q: "Saya menyadari mulut saya terasa kering", cat: "Kecemasan" },
    { q: "Saya mengalami kesulitan bernapas", cat: "Kecemasan" },
    { q: "Saya merasa gemetar (pada tangan)", cat: "Kecemasan" },
    { q: "Saya merasa khawatir dengan situasi panik", cat: "Kecemasan" },
    { q: "Saya merasa hampir panik", cat: "Kecemasan" },
    { q: "Saya menyadari detak jantung tanpa olahraga", cat: "Kecemasan" },
    { q: "Saya merasa takut tanpa alasan jelas", cat: "Kecemasan" },

    // DEPRESI
    { q: "Saya tidak dapat merasakan perasaan positif sama sekali", cat: "Depresi" },
    { q: "Saya merasa sulit untuk memulai suatu kegiatan", cat: "Depresi" },
    { q: "Saya merasa tidak ada hal baik di masa depan", cat: "Depresi" },
    { q: "Saya merasa sedih dan tertekan", cat: "Depresi" },
    { q: "Saya tidak merasa antusias terhadap apa pun", cat: "Depresi" },
    { q: "Saya merasa tidak berharga sebagai manusia", cat: "Depresi" },
    { q: "Saya merasa hidup tidak berarti", cat: "Depresi" }

];

let currentIdx   = 0;
window._answers  = {};

// =========================
// COOLDOWN — cegah spam klik jawaban
// =========================
let _answerLocked = false;
const ANSWER_DELAY = 600; // ms jeda antar klik jawaban

// =========================
// TOAST NOTIFICATION
// =========================

(function injectToast() {

    if (document.getElementById('dass-toast')) return;

    const style = document.createElement('style');
    style.textContent = `
        #dass-toast {
            position: fixed;
            bottom: 2rem;
            left: 50%;
            transform: translateX(-50%) translateY(30px);
            z-index: 9999;
            display: flex;
            align-items: flex-start;
            gap: 1rem;
            background: #fff;
            border: 1.5px solid rgba(27,58,254,.15);
            border-left: 5px solid #1b3afe;
            border-radius: 20px;
            box-shadow: 0 24px 64px rgba(15,31,110,.18), 0 4px 16px rgba(15,31,110,.08);
            padding: 1.3rem 1.4rem 1.3rem 1.25rem;
            width: 460px;
            max-width: calc(100vw - 2rem);
            font-family: 'Poppins', sans-serif;
            opacity: 0;
            pointer-events: none;
            transition: opacity .32s ease, transform .36s cubic-bezier(.22,.8,.36,1);
        }
        #dass-toast.show {
            opacity: 1;
            transform: translateX(-50%) translateY(0);
            pointer-events: auto;
        }
        #dass-toast .toast-icon {
            width: 48px;
            height: 48px;
            border-radius: 14px;
            background: #e8eeff;
            color: #1b3afe;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.35rem;
            flex-shrink: 0;
        }
        #dass-toast .toast-body {
            flex: 1;
            min-width: 0;
        }
        #dass-toast .toast-title {
            font-weight: 700;
            font-size: .95rem;
            color: #0d1540;
            margin-bottom: .3rem;
            line-height: 1.3;
        }
        #dass-toast .toast-msg {
            font-size: .83rem;
            color: #4a5480;
            line-height: 1.6;
            margin-bottom: .75rem;
        }
        #dass-toast .toast-chips {
            display: flex;
            flex-wrap: wrap;
            gap: .4rem;
        }
        #dass-toast .toast-chip {
            background: #f0f4ff;
            color: #1b3afe;
            border: 1.5px solid rgba(27,58,254,.2);
            border-radius: 20px;
            font-size: .75rem;
            font-weight: 700;
            padding: .32rem .82rem;
            cursor: pointer;
            transition: background .18s, color .18s, border-color .18s;
            font-family: 'Poppins', sans-serif;
        }
        #dass-toast .toast-chip:hover {
            background: #1b3afe;
            color: #fff;
            border-color: #1b3afe;
        }
        #dass-toast .toast-close {
            width: 32px;
            height: 32px;
            border-radius: 10px;
            background: #f0f4ff;
            border: none;
            color: #8892b8;
            font-size: .95rem;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            flex-shrink: 0;
            font-family: 'Poppins', sans-serif;
            transition: background .15s, color .15s;
            margin-top: -2px;
        }
        #dass-toast .toast-close:hover {
            background: #e8eeff;
            color: #1b3afe;
        }

        /* Visual feedback saat jawaban dikunci */
        .answer-locked {
            pointer-events: none !important;
            opacity: 0.7 !important;
        }

        @media (max-width: 576px) {
            #dass-toast {
                width: calc(100vw - 1.5rem);
                bottom: 1rem;
                border-radius: 16px;
                padding: 1.1rem 1.1rem 1.1rem 1rem;
            }
            #dass-toast .toast-icon {
                width: 42px;
                height: 42px;
                font-size: 1.15rem;
            }
        }
    `;
    document.head.appendChild(style);

    const toast = document.createElement('div');
    toast.id = 'dass-toast';
    toast.innerHTML = `
        <div class="toast-icon"><i class="bi bi-exclamation-circle-fill"></i></div>
        <div class="toast-body">
            <div class="toast-title" id="toast-title">Ada soal yang belum dijawab</div>
            <div class="toast-msg"  id="toast-msg"></div>
            <div class="toast-chips" id="toast-chips"></div>
        </div>
        <button class="toast-close" onclick="hideToast()" title="Tutup">✕</button>
    `;
    document.body.appendChild(toast);

})();

let _toastTimer = null;

function showSkippedToast(skippedList) {

    const total = skippedList.length;

    document.getElementById('toast-title').textContent =
        total === 1
            ? 'Ada 1 soal yang belum dijawab'
            : `Ada ${total} soal yang belum dijawab`;

    document.getElementById('toast-msg').textContent =
        'Ketuk nomor soal di bawah untuk langsung ke soal tersebut, atau klik "Lanjutkan" untuk mengisinya satu per satu.';

    const chips = document.getElementById('toast-chips');
    chips.innerHTML = '';

    skippedList.forEach(idx => {
        const chip = document.createElement('button');
        chip.className = 'toast-chip';
        chip.textContent = `Soal ${idx}`;
        chip.onclick = () => {
            currentIdx = idx - 1;
            showQuestion();
            hideToast();
        };
        chips.appendChild(chip);
    });

    const btn = document.createElement('button');
    btn.className = 'toast-chip';
    btn.style.background = '#1b3afe';
    btn.style.color = '#fff';
    btn.style.borderColor = '#1b3afe';
    btn.innerHTML = '<i class="bi bi-arrow-right" style="font-size:.7rem;margin-right:.25rem;"></i>Lanjutkan';
    btn.onclick = () => {
        currentIdx = skippedList[0] - 1;
        showQuestion();
        hideToast();
    };
    chips.appendChild(btn);

    const toast = document.getElementById('dass-toast');
    toast.classList.add('show');

    clearTimeout(_toastTimer);
    _toastTimer = setTimeout(hideToast, 10000);
}

function hideToast() {
    clearTimeout(_toastTimer);
    const toast = document.getElementById('dass-toast');
    if (toast) toast.classList.remove('show');
}

// =========================
// TAMPILKAN SOAL
// =========================

function showQuestion() {

    const total    = questions.length;
    const question = questions[currentIdx];

    if (!question) {
        submitForm();
        return;
    }

    document.getElementById('question-text').textContent = question.q;
    syncProgressUI(currentIdx + 1, total, question.cat);

    const prev = window._answers[currentIdx + 1];
    highlightAnswer(prev !== undefined ? prev : -1);

    renderNextButton();
}

// =========================
// PILIH JAWABAN — dengan cooldown anti-spam
// =========================

function selectAnswer(value) {

    // Tolak klik jika masih dalam jeda
    if (_answerLocked) return;

    const question = questions[currentIdx];
    if (!question) return;

    // Kunci input segera
    _answerLocked = true;
    lockAnswerButtons(true);

    // Simpan jawaban & update UI
    window._answers[currentIdx + 1] = value;
    highlightAnswer(value);
    renderNextButton();

    // Tutup/update toast jika sedang tampil
    const toast = document.getElementById('dass-toast');
    if (toast && toast.classList.contains('show')) {
        const remaining = getSkippedList();
        if (remaining.length === 0) {
            hideToast();
        } else {
            showSkippedToast(remaining);
        }
    }

    const isLast = (currentIdx === questions.length - 1);

    if (!isLast) {
        // Auto maju ke soal berikutnya setelah ANSWER_DELAY ms
        setTimeout(() => {
            currentIdx = findNextUnanswered(currentIdx);
            showQuestion();
            // Buka kunci SETELAH soal baru tampil
            // (tambah 50ms buffer agar transisi selesai dulu)
            setTimeout(() => {
                _answerLocked = false;
                lockAnswerButtons(false);
            }, 50);
        }, ANSWER_DELAY);
    } else {
        // Soal terakhir — buka kunci lebih cepat (tidak auto-submit)
        setTimeout(() => {
            _answerLocked = false;
            lockAnswerButtons(false);
        }, ANSWER_DELAY);
    }
}

// =========================
// KUNCI / BUKA TOMBOL JAWABAN
// =========================

function lockAnswerButtons(lock) {
    const btns = document.querySelectorAll('[onclick^="selectAnswer"]');
    btns.forEach(btn => {
        if (lock) {
            btn.classList.add('answer-locked');
        } else {
            btn.classList.remove('answer-locked');
        }
    });
}

// =========================
// CARI SOAL KOSONG BERIKUTNYA
// =========================

function findNextUnanswered(afterIdx) {

    const total = questions.length;

    for (let i = afterIdx + 1; i < total; i++) {
        if (window._answers[i + 1] === undefined) return i;
    }

    for (let i = 0; i < afterIdx; i++) {
        if (window._answers[i + 1] === undefined) return i;
    }

    return total - 1;
}

// =========================
// AMBIL DAFTAR SOAL BELUM DIJAWAB
// =========================

function getSkippedList() {
    const skipped = [];
    for (let i = 1; i <= questions.length; i++) {
        if (window._answers[i] === undefined) skipped.push(i);
    }
    return skipped;
}

// =========================
// LANJUT MANUAL (tombol Next)
// =========================

function nextQuestion() {

    const isAnswered = window._answers[currentIdx + 1] !== undefined;
    if (!isAnswered) return;

    const isLast = (currentIdx === questions.length - 1);
    if (isLast) {
        submitForm();
        return;
    }

    currentIdx = findNextUnanswered(currentIdx);
    showQuestion();
}

// =========================
// KEMBALI KE SOAL SEBELUMNYA
// =========================

function prevQuestion() {
    if (currentIdx <= 0) return;
    currentIdx--;
    showQuestion();
}

// =========================
// RENDER TOMBOL NEXT / SUBMIT
// =========================

function renderNextButton() {

    const wrap       = document.getElementById('btn-next-wrap');
    const isLast     = (currentIdx === questions.length - 1);
    const isAnswered = window._answers[currentIdx + 1] !== undefined;

    const baseStyle = `
        display:inline-flex;align-items:center;gap:.5rem;
        border:none;border-radius:var(--radius-sm);
        padding:.75rem 1.6rem;
        font-size:.9rem;font-weight:700;
        font-family:'Poppins',sans-serif;
        cursor:pointer;
        transition:background .2s,transform .2s,opacity .2s;
    `;

    if (isLast) {
        wrap.innerHTML = `
            <button
                type="button"
                onclick="submitForm()"
                ${!isAnswered ? 'disabled' : ''}
                style="
                    ${baseStyle}
                    background:${isAnswered ? 'var(--blue-main)' : '#c7d2fe'};
                    color:white;
                    box-shadow:${isAnswered ? '0 8px 24px rgba(27,58,254,.28)' : 'none'};
                    cursor:${isAnswered ? 'pointer' : 'not-allowed'};
                "
            >
                <i class="bi bi-check2-circle"></i>
                Selesai & Lihat Hasil
            </button>`;
    } else {
        wrap.innerHTML = `
            <button
                type="button"
                onclick="nextQuestion()"
                ${!isAnswered ? 'disabled' : ''}
                style="
                    ${baseStyle}
                    background:${isAnswered ? 'var(--blue-main)' : '#c7d2fe'};
                    color:white;
                    box-shadow:${isAnswered ? '0 8px 24px rgba(27,58,254,.28)' : 'none'};
                    cursor:${isAnswered ? 'pointer' : 'not-allowed'};
                "
            >
                Lanjut
                <i class="bi bi-arrow-right"></i>
            </button>`;
    }
}

// =========================
// SUBMIT FORM
// =========================

function submitForm() {

    const skipped = getSkippedList();

    if (skipped.length > 0) {
        showSkippedToast(skipped);
        currentIdx = skipped[0] - 1;
        showQuestion();
        return;
    }

    for (let i = 1; i <= 21; i++) {
        const el = document.getElementById('q' + i);
        if (el) el.value = window._answers[i] ?? 0;
    }

    document.getElementById('assessmentForm').submit();
}

// =========================
// INIT
// =========================

window.onload = function () {
    showQuestion();
};