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
// TAMPILKAN SOAL
// =========================

function showQuestion() {

    const total    = questions.length;
    const question = questions[currentIdx];

    if (!question) {
        submitForm();
        return;
    }

    // teks soal
    document.getElementById('question-text').textContent = question.q;

    // update semua UI: progress, nomor, dots, kategori, animasi, btn prev
    syncProgressUI(currentIdx + 1, total, question.cat);

    // highlight jawaban sebelumnya kalau soal ini sudah pernah dijawab
    const prev = window._answers[currentIdx + 1];
    highlightAnswer(prev !== undefined ? prev : -1);

    // render tombol Next / Submit
    renderNextButton();
}

// =========================
// PILIH JAWABAN
// =========================

function selectAnswer(value) {

    const question = questions[currentIdx];
    if (!question) return;

    // simpan jawaban
    window._answers[currentIdx + 1] = value;

    // highlight pilihan yang dipilih
    highlightAnswer(value);

    // update tombol next (supaya langsung muncul setelah pilih jawaban)
    renderNextButton();

    // kalau bukan soal terakhir, auto maju setelah 300ms
    const isLast = (currentIdx === questions.length - 1);
    if (!isLast) {
        setTimeout(() => {
            currentIdx++;
            showQuestion();
        }, 300);
    }
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

    currentIdx++;
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

    const wrap      = document.getElementById('btn-next-wrap');
    const isLast    = (currentIdx === questions.length - 1);
    const isAnswered = window._answers[currentIdx + 1] !== undefined;

    // style dasar tombol
    const baseStyle = `
        display:inline-flex;align-items:center;gap:.5rem;
        border:none;border-radius:var(--radius-sm);
        padding:.75rem 1.6rem;
        font-size:.9rem;font-weight:700;
        font-family:'DM Sans',sans-serif;
        cursor:pointer;
        transition:background .2s,transform .2s,opacity .2s;
    `;

    if (isLast) {

        // soal terakhir — tampilkan Selesai
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

        // soal biasa — tampilkan Lanjut
        // muncul terus, tapi warna/state berubah tergantung sudah jawab atau belum
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

    // validasi semua soal sudah dijawab
    for (let i = 1; i <= questions.length; i++) {
        if (window._answers[i] === undefined) {
            alert('Harap jawab semua pertanyaan terlebih dahulu.');
            currentIdx = i - 1;
            showQuestion();
            return;
        }
    }

    // isi hidden input q1-q21
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