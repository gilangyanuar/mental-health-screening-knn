<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin | DASS-21</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        :root {
            --blue-dark:  #0f1f6e;
            --blue-main:  #1b3afe;
            --blue-light: #e8eeff;
            --blue-soft:  #f0f4ff;
            --text-dark:  #0d1540;
            --text-mid:   #4a5480;
            --text-light: #8892b8;
            --white:      #ffffff;
            --bg:         #f4f7fe;
            --radius-lg:  28px;
            --radius-md:  18px;
            --radius-sm:  12px;
            --shadow-lg:  0 40px 100px rgba(15,31,110,.10);
            --shadow-md:  0 20px 50px rgba(15,31,110,.07);
            --shadow-sm:  0 8px 24px rgba(15,31,110,.06);
        }

        * { box-sizing: border-box; margin: 0; padding: 0; }
        body { background: var(--bg); font-family: 'Poppins', sans-serif; color: var(--text-dark); -webkit-font-smoothing: antialiased; }
        .page-wrapper { display: flex; min-height: 100vh; }

        /* ── SIDEBAR ─────────────────────────────── */
        .sidebar {
            width: 260px; flex-shrink: 0;
            background: linear-gradient(160deg, var(--blue-dark) 0%, var(--blue-main) 100%);
            padding: 2rem 1.5rem;
            display: flex; flex-direction: column; justify-content: space-between;
            position: sticky; top: 0; height: 100vh; overflow: hidden;
        }
        .sidebar::before { content:""; position:absolute; width:220px; height:220px; border-radius:50%; background:rgba(255,255,255,.05); top:-80px; right:-80px; }
        .sidebar::after  { content:""; position:absolute; width:160px; height:160px; border-radius:50%; background:rgba(255,255,255,.04); bottom:-50px; left:-50px; }
        .sidebar-brand { display:flex; align-items:center; gap:.6rem; color:white; font-weight:700; font-size:1.1rem; text-decoration:none; position:relative; z-index:1; margin-bottom:2.5rem; }
        .sidebar-brand .brand-dot { width:8px; height:8px; border-radius:50%; background:rgba(255,255,255,.7); }
        .sidebar-sep { font-size:.68rem; font-weight:700; letter-spacing:.18em; text-transform:uppercase; color:rgba(255,255,255,.35); margin-bottom:.75rem; padding-left:.5rem; position:relative; z-index:1; }
        .sidebar-nav { display:flex; flex-direction:column; gap:.35rem; position:relative; z-index:1; flex:1; }
        .sidebar-link { display:flex; align-items:center; gap:.75rem; padding:.75rem 1rem; border-radius:var(--radius-sm); color:rgba(255,255,255,.65); text-decoration:none; font-size:.88rem; font-weight:500; transition:all .2s; }
        .sidebar-link:hover { background:rgba(255,255,255,.1); color:white; }
        .sidebar-link.active { background:rgba(255,255,255,.15); color:white; font-weight:700; }
        .sidebar-link i { font-size:1rem; width:20px; }
        .sidebar-footer { position:relative; z-index:1; }
        .sidebar-user { display:flex; align-items:center; gap:.75rem; background:rgba(255,255,255,.08); border-radius:var(--radius-sm); padding:.8rem 1rem; margin-bottom:.75rem; }
        .sidebar-avatar { width:36px; height:36px; border-radius:10px; background:rgba(255,255,255,.2); color:white; display:flex; align-items:center; justify-content:center; font-size:.9rem; flex-shrink:0; }
        .sidebar-user small { display:block; font-size:.7rem; color:rgba(255,255,255,.5); }
        .sidebar-user strong { font-size:.85rem; color:white; }
        .btn-logout { display:flex; align-items:center; justify-content:center; gap:.5rem; width:100%; background:rgba(255,255,255,.1); color:rgba(255,255,255,.8); border:1px solid rgba(255,255,255,.15); border-radius:var(--radius-sm); padding:.65rem; font-size:.85rem; font-weight:600; font-family:'Poppins',sans-serif; cursor:pointer; transition:all .2s; }
        .btn-logout:hover { background:rgba(220,38,38,.25); border-color:rgba(220,38,38,.4); color:#fca5a5; }

        /* ── MAIN ────────────────────────────────── */
        .main-content { flex:1; padding:2rem 2.5rem; overflow-x:hidden; display:flex; flex-direction:column; gap:1.5rem; }

        /* ── TOPBAR ──────────────────────────────── */
        .topbar { background:var(--white); border-radius:var(--radius-lg); padding:1.4rem 2rem; box-shadow:var(--shadow-sm); display:flex; align-items:center; justify-content:space-between; }
        .topbar-title { font-family:'Poppins',sans-serif; font-size:1.5rem; color:var(--text-dark); line-height:1.2; }
        .topbar-sub { font-size:.82rem; color:var(--text-light); margin-top:.15rem; }
        .total-badge { display:inline-flex; align-items:center; gap:.5rem; background:var(--blue-soft); border:1px solid rgba(27,58,254,.12); color:var(--blue-main); font-size:.82rem; font-weight:700; padding:.5rem 1.1rem; border-radius:30px; }

        /* ── KNN METRIC CARDS ────────────────────── */
        .metric-card { background:var(--white); border-radius:var(--radius-lg); padding:1.6rem; box-shadow:var(--shadow-sm); position:relative; overflow:hidden; height:100%; }
        .metric-card::after { content:""; position:absolute; width:100px; height:100px; border-radius:50%; bottom:-35px; right:-35px; }
        .metric-card.accuracy::after  { background:radial-gradient(circle,rgba(27,58,254,.09),transparent 70%); }
        .metric-card.precision::after { background:radial-gradient(circle,rgba(5,150,105,.09),transparent 70%); }
        .metric-card.recall::after    { background:radial-gradient(circle,rgba(217,119,6,.09),transparent 70%); }
        .metric-card.f1::after        { background:radial-gradient(circle,rgba(124,58,237,.09),transparent 70%); }
        .metric-icon { width:46px; height:46px; border-radius:14px; display:flex; align-items:center; justify-content:center; font-size:1.2rem; margin-bottom:.9rem; }
        .metric-card.accuracy  .metric-icon { background:var(--blue-light); color:var(--blue-main); }
        .metric-card.precision .metric-icon { background:#d1fae5; color:#059669; }
        .metric-card.recall    .metric-icon { background:#fef3c7; color:#d97706; }
        .metric-card.f1        .metric-icon { background:#ede9fe; color:#7c3aed; }
        .metric-label { font-size:.7rem; font-weight:700; text-transform:uppercase; letter-spacing:.12em; color:var(--text-light); margin-bottom:.25rem; }
        .metric-value { font-family:'Poppins',sans-serif; font-size:2.3rem; line-height:1; margin-bottom:.3rem; }
        .metric-card.accuracy  .metric-value { color:var(--blue-main); }
        .metric-card.precision .metric-value { color:#059669; }
        .metric-card.recall    .metric-value { color:#d97706; }
        .metric-card.f1        .metric-value { color:#7c3aed; }
        .metric-desc { font-size:.78rem; color:var(--text-light); line-height:1.5; }

        /* ── DISTRIBUSI ──────────────────────────── */
        .section-card { background:var(--white); border-radius:var(--radius-lg); padding:2rem; box-shadow:var(--shadow-sm); }
        .section-card-title { font-family:'Poppins',sans-serif; font-size:1.2rem; color:var(--text-dark); margin-bottom:1.3rem; display:flex; align-items:center; gap:.6rem; }
        .section-card-title span { display:inline-block; width:4px; height:18px; border-radius:4px; background:var(--blue-main); }

        .distrib-grid { display:grid; grid-template-columns:repeat(5,1fr); gap:.85rem; }
        .distrib-item { background:var(--blue-soft); border:1px solid rgba(27,58,254,.07); border-radius:var(--radius-md); padding:1.1rem 1rem; position:relative; overflow:hidden; transition:transform .2s,box-shadow .2s; }
        .distrib-item:hover { transform:translateY(-3px); box-shadow:var(--shadow-sm); }
        .distrib-item::before { content:""; position:absolute; top:0; left:0; right:0; height:4px; border-radius:4px 4px 0 0; }
        .distrib-item.di-normal::before  { background:#059669; }
        .distrib-item.di-ringan::before  { background:#0ea5e9; }
        .distrib-item.di-sedang::before  { background:#d97706; }
        .distrib-item.di-berat::before   { background:#ea580c; }
        .distrib-item.di-sberat::before  { background:#dc2626; }
        .distrib-icon { width:36px; height:36px; border-radius:10px; display:flex; align-items:center; justify-content:center; font-size:.95rem; margin-bottom:.8rem; }
        .distrib-item.di-normal  .distrib-icon { background:#d1fae5; color:#059669; }
        .distrib-item.di-ringan  .distrib-icon { background:#e0f2fe; color:#0ea5e9; }
        .distrib-item.di-sedang  .distrib-icon { background:#fef3c7; color:#d97706; }
        .distrib-item.di-berat   .distrib-icon { background:#ffedd5; color:#ea580c; }
        .distrib-item.di-sberat  .distrib-icon { background:#fee2e2; color:#dc2626; }
        .distrib-label { font-size:.7rem; font-weight:700; text-transform:uppercase; letter-spacing:.1em; color:var(--text-light); margin-bottom:.25rem; }
        .distrib-value { font-family:'Poppins',sans-serif; font-size:2rem; line-height:1; margin-bottom:.2rem; }
        .distrib-item.di-normal  .distrib-value { color:#059669; }
        .distrib-item.di-ringan  .distrib-value { color:#0ea5e9; }
        .distrib-item.di-sedang  .distrib-value { color:#d97706; }
        .distrib-item.di-berat   .distrib-value { color:#ea580c; }
        .distrib-item.di-sberat  .distrib-value { color:#dc2626; }
        .distrib-pct { font-size:.75rem; color:var(--text-light); font-weight:600; }

        /* ── TABLE ───────────────────────────────── */
        .table-header { display:flex; align-items:center; justify-content:space-between; margin-bottom:1.4rem; flex-wrap:wrap; gap:1rem; }
        .table-actions { display:flex; gap:.6rem; align-items:center; flex-wrap:wrap; }
        .filter-select { border:1.5px solid #dce5ff; border-radius:var(--radius-sm); padding:.5rem .85rem; font-size:.82rem; font-family:'Poppins',sans-serif; color:var(--text-dark); background:var(--blue-soft); cursor:pointer; transition:border-color .2s; }
        .filter-select:focus { outline:none; border-color:var(--blue-main); }
        .search-wrap { position:relative; }
        .search-wrap i { position:absolute; left:.85rem; top:50%; transform:translateY(-50%); color:var(--text-light); font-size:.88rem; }
        .search-input { border:1.5px solid #dce5ff; border-radius:var(--radius-sm); padding:.55rem .9rem .55rem 2.3rem; font-size:.84rem; font-family:'Poppins',sans-serif; color:var(--text-dark); background:var(--blue-soft); width:200px; transition:border-color .2s,background .2s; }
        .search-input:focus { outline:none; border-color:var(--blue-main); background:var(--white); }
        .search-input::placeholder { color:var(--text-light); }

        .data-table { width:100%; border-collapse:collapse; font-size:.84rem; }
        .data-table thead tr { background:var(--blue-soft); }
        .data-table thead th { padding:.8rem 1rem; font-size:.69rem; font-weight:700; text-transform:uppercase; letter-spacing:.1em; color:var(--text-mid); border-bottom:1px solid rgba(27,58,254,.08); white-space:nowrap; }
        .data-table tbody tr { border-bottom:1px solid rgba(27,58,254,.05); transition:background .15s; }
        .data-table tbody tr:last-child { border-bottom:none; }
        .data-table tbody tr:hover { background:var(--blue-soft); }
        .data-table tbody td { padding:.8rem 1rem; vertical-align:middle; }

        .td-name strong { display:block; font-weight:600; color:var(--text-dark); font-size:.86rem; }
        .td-name small  { font-size:.75rem; color:var(--text-light); }
        .td-chips { display:flex; flex-wrap:wrap; gap:.28rem; margin-top:.3rem; }

        .chip { display:inline-flex; align-items:center; gap:.22rem; font-size:.69rem; font-weight:600; padding:.17rem .52rem; border-radius:6px; }
        .chip-blue   { background:var(--blue-light); color:var(--blue-main); }
        .chip-male   { background:#dbeafe; color:#1d4ed8; }
        .chip-female { background:#fce7f3; color:#be185d; }
        .chip-work   { background:#fef3c7; color:#92400e; }
        .chip-nowork { background:#d1fae5; color:#065f46; }

        .score-chip { display:inline-block; background:var(--blue-soft); color:var(--text-mid); font-size:.8rem; font-weight:700; padding:.2rem .58rem; border-radius:8px; min-width:30px; text-align:center; }

        /* badges 5 label */
        .rbadge { display:inline-flex; align-items:center; gap:.32rem; padding:.3rem .78rem; border-radius:30px; font-size:.75rem; font-weight:700; }
        .rbadge .dot { width:6px; height:6px; border-radius:50%; }
        .rbadge.normal  { background:#d1fae5; color:#065f46; } .rbadge.normal  .dot { background:#059669; }
        .rbadge.ringan  { background:#e0f2fe; color:#075985; } .rbadge.ringan  .dot { background:#0ea5e9; }
        .rbadge.sedang  { background:#fef3c7; color:#78350f; } .rbadge.sedang  .dot { background:#d97706; }
        .rbadge.berat   { background:#ffedd5; color:#7c2d12; } .rbadge.berat   .dot { background:#ea580c; }
        .rbadge.sberat  { background:#fee2e2; color:#7f1d1d; } .rbadge.sberat  .dot { background:#dc2626; }

        .dim-chip { display:inline-block; font-size:.69rem; font-weight:600; padding:.14rem .48rem; border-radius:6px; background:var(--blue-light); color:var(--blue-main); margin-top:.22rem; }

        .btn-eye { display:inline-flex; align-items:center; gap:.28rem; background:var(--blue-soft); color:var(--blue-main); border:1px solid rgba(27,58,254,.18); border-radius:9px; padding:.32rem .7rem; font-size:.77rem; font-weight:600; font-family:'Poppins',sans-serif; cursor:pointer; transition:all .2s; text-decoration:none; }
        .btn-eye:hover { background:var(--blue-light); color:var(--blue-main); }
        .btn-del { display:inline-flex; align-items:center; gap:.28rem; background:#fff0f0; color:#dc2626; border:1px solid rgba(220,38,38,.18); border-radius:9px; padding:.32rem .7rem; font-size:.77rem; font-weight:600; font-family:'Poppins',sans-serif; cursor:pointer; transition:all .2s; }
        .btn-del:hover { background:#dc2626; color:white; border-color:#dc2626; }
        .act-group { display:flex; gap:.35rem; }

        .empty-state { text-align:center; padding:4rem 2rem; }
        .empty-icon { width:68px; height:68px; border-radius:20px; background:var(--blue-soft); color:var(--text-light); display:flex; align-items:center; justify-content:center; font-size:1.7rem; margin:0 auto 1.1rem; }
        .empty-state h5 { font-weight:700; color:var(--text-dark); margin-bottom:.35rem; }
        .empty-state p  { font-size:.87rem; color:var(--text-light); }
        #noResult { display:none; text-align:center; padding:2.5rem; color:var(--text-light); font-size:.87rem; }

        /* ── MODAL ───────────────────────────────── */
        .modal-content { border:none; border-radius:var(--radius-lg); box-shadow:var(--shadow-lg); font-family:'Poppins',sans-serif; }
        .modal-header { background:linear-gradient(135deg,var(--blue-dark),var(--blue-main)); border-radius:var(--radius-lg) var(--radius-lg) 0 0; padding:1.4rem 1.8rem; border:none; position:relative; overflow:hidden; }
        .modal-header::before { content:""; position:absolute; width:160px; height:160px; border-radius:50%; background:rgba(255,255,255,.05); top:-70px; right:-50px; }
        .modal-header .modal-title { font-family:'Poppins',sans-serif; font-size:1.2rem; color:white; position:relative; z-index:1; }
        .modal-header .btn-close { filter:invert(1); opacity:.7; position:relative; z-index:1; }
        .modal-body { padding:1.6rem 1.8rem; }
        .logout-modal .modal-content { border:none; border-radius:var(--radius-lg); box-shadow:var(--shadow-lg); }
        .logout-modal .modal-body { background: #f7f9ff; color: var(--text-dark); }
        .logout-modal .modal-body p { margin:0; font-size:.98rem; line-height:1.75; }
        .logout-modal .modal-footer { background: #ffffff; border-top:1px solid rgba(15,31,110,.08); display:flex; justify-content:flex-end; gap:.75rem; padding:1rem 1.5rem; }
        .logout-modal .btn-secondary { background: rgba(15,31,110,.08); color: var(--text-dark); border: none; }
        .logout-modal .btn-secondary:hover { background: rgba(15,31,110,.14); }
        .logout-modal .btn-danger { background: #dc2626; border: none; }
        .logout-modal .btn-danger:hover { background: #b91c1c; }
        .msec { font-size:.68rem; font-weight:700; text-transform:uppercase; letter-spacing:.15em; color:var(--text-light); margin-bottom:.85rem; display:flex; align-items:center; gap:.55rem; }
        .msec::after { content:""; flex:1; height:1px; background:rgba(27,58,254,.1); }
        .minfo-grid { display:grid; grid-template-columns:repeat(3,1fr); gap:.65rem; margin-bottom:1.3rem; }
        .minfo-item { background:var(--blue-soft); border-radius:var(--radius-sm); padding:.75rem .9rem; }
        .minfo-item small { display:block; font-size:.68rem; font-weight:700; text-transform:uppercase; letter-spacing:.07em; color:var(--text-light); margin-bottom:.22rem; }
        .minfo-item strong { font-size:.88rem; font-weight:600; color:var(--text-dark); }
        .mscore-row { display:grid; grid-template-columns:repeat(3,1fr); gap:.65rem; margin-bottom:1.3rem; }
        .mscore-box { border-radius:var(--radius-sm); padding:.9rem; text-align:center; border-top:3px solid transparent; }
        .mscore-box.sd { background:#fff5f5; border-top-color:#dc2626; }
        .mscore-box.sk { background:var(--blue-soft); border-top-color:var(--blue-main); }
        .mscore-box.ss { background:#fffbeb; border-top-color:#d97706; }
        .mscore-box small { display:block; font-size:.68rem; font-weight:700; text-transform:uppercase; letter-spacing:.08em; margin-bottom:.25rem; }
        .mscore-box.sd small { color:#dc2626; } .mscore-box.sk small { color:var(--blue-main); } .mscore-box.ss small { color:#d97706; }
        .mscore-num { font-family:'Poppins',sans-serif; font-size:1.9rem; line-height:1; }
        .mscore-box.sd .mscore-num { color:#dc2626; } .mscore-box.sk .mscore-num { color:var(--blue-main); } .mscore-box.ss .mscore-num { color:#d97706; }
        .q-grid { display:grid; grid-template-columns:repeat(7,1fr); gap:.45rem; }
        .q-item { background:var(--blue-soft); border-radius:9px; padding:.45rem .35rem; text-align:center; }
        .q-item small { display:block; font-size:.63rem; color:var(--text-light); font-weight:600; }
        .q-item strong { font-size:.95rem; font-weight:700; color:var(--text-dark); }
        .q-item.qh { background:#fee2e2; } .q-item.qh strong { color:#dc2626; }
        .q-item.qm { background:#fef3c7; } .q-item.qm strong { color:#d97706; }
        .mresult-row { display:flex; align-items:center; justify-content:space-between; background:var(--blue-soft); border-radius:var(--radius-sm); padding:.9rem 1.1rem; margin-top:.4rem; }
        .mresult-row .mresult-left span { display:block; font-size:.84rem; color:var(--text-mid); font-weight:600; }
        .mresult-row .mresult-left small { font-size:.75rem; color:var(--text-light); }

        /* ── RESPONSIVE ──────────────────────────── */
        @media(max-width:991px) { .sidebar{display:none;} .main-content{padding:1.5rem 1rem;} .distrib-grid{grid-template-columns:repeat(3,1fr);} .minfo-grid{grid-template-columns:repeat(2,1fr);} .q-grid{grid-template-columns:repeat(5,1fr);} }
        @media(max-width:576px) { .topbar{flex-direction:column;align-items:flex-start;gap:.8rem;} .table-header{flex-direction:column;align-items:flex-start;} .search-input{width:100%;} .distrib-grid{grid-template-columns:repeat(2,1fr);} .mscore-row{grid-template-columns:1fr;} .q-grid{grid-template-columns:repeat(4,1fr);} }
    </style>
</head>
<body>

@php
    $total          = count($data);
    $cntNormal      = $data->where('label_knn', 'Normal')->count();
    $cntRingan      = $data->where('label_knn', 'Ringan')->count();
    $cntSedang      = $data->where('label_knn', 'Sedang')->count();
    $cntBerat       = $data->where('label_knn', 'Berat')->count();
    $cntSangatBerat = $data->where('label_knn', 'Sangat Berat')->count();
    $pct = fn($n) => $total > 0 ? round(($n/$total)*100) : 0;
@endphp

<div class="page-wrapper">

    <!-- SIDEBAR -->
    <div class="sidebar">
        <div>
            <a href="/" class="sidebar-brand"><span class="brand-dot"></span>DASS-21</a>
            <div class="sidebar-sep">Menu</div>
            <nav class="sidebar-nav">
                <a href="#" class="sidebar-link active"><i class="bi bi-speedometer2"></i>Dashboard</a>
                <a href="#distribusi" class="sidebar-link"><i class="bi bi-pie-chart-fill"></i>Distribusi</a>
                <a href="#tabel" class="sidebar-link"><i class="bi bi-table"></i>Data Assessment</a>
                <a href="/" class="sidebar-link"><i class="bi bi-house-door"></i>Ke Beranda</a>
            </nav>
        </div>
        <div class="sidebar-footer">
            <div class="sidebar-user">
                <div class="sidebar-avatar"><i class="bi bi-person-fill"></i></div>
                <div>
                    <small>Administrator</small>
                    <strong>Admin DASS-21</strong>
                </div>
            </div>
            <form id="logoutForm" action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="button" class="btn-logout" data-bs-toggle="modal" data-bs-target="#logoutModal">
                    <i class="bi bi-box-arrow-left"></i>Logout
                </button>
            </form>
        </div>
    </div>

    <!-- MAIN -->
    <div class="main-content">

        <!-- TOPBAR -->
        <div class="topbar">
            <div>
                <div class="topbar-title">Dashboard Admin</div>
                <div class="topbar-sub">Monitoring hasil assessment kesehatan mental mahasiswa · DASS-21</div>
            </div>
            <div class="total-badge"><i class="bi bi-people-fill"></i>{{ $total }} Total Responden</div>
        </div>

        <!-- KNN METRICS -->
        <div class="row g-3">
            <div class="col-lg-3 col-md-6">
                <div class="metric-card accuracy">
                    <div class="metric-icon"><i class="bi bi-bullseye"></i></div>
                    <div class="metric-label">Accuracy</div>
                    <div class="metric-value">92%</div>
                    <div class="metric-desc">Tingkat ketepatan model KNN</div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="metric-card precision">
                    <div class="metric-icon"><i class="bi bi-sliders"></i></div>
                    <div class="metric-label">Precision</div>
                    <div class="metric-value">90%</div>
                    <div class="metric-desc">Ketepatan prediksi klasifikasi</div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="metric-card recall">
                    <div class="metric-icon"><i class="bi bi-arrow-repeat"></i></div>
                    <div class="metric-label">Recall</div>
                    <div class="metric-value">88%</div>
                    <div class="metric-desc">Kemampuan mendeteksi kelas</div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="metric-card f1">
                    <div class="metric-icon"><i class="bi bi-award-fill"></i></div>
                    <div class="metric-label">F1-Score</div>
                    <div class="metric-value">89%</div>
                    <div class="metric-desc">Rata-rata harmonis P & R</div>
                </div>
            </div>
        </div>

        <!-- DISTRIBUSI -->
        <div class="section-card" id="distribusi">
            <div class="section-card-title"><span></span>Distribusi Hasil Klasifikasi KNN</div>
            <div class="distrib-grid">
                <div class="distrib-item di-normal">
                    <div class="distrib-icon"><i class="bi bi-emoji-smile-fill"></i></div>
                    <div class="distrib-label">Normal</div>
                    <div class="distrib-value">{{ $cntNormal }}</div>
                    <div class="distrib-pct">{{ $pct($cntNormal) }}% dari total</div>
                </div>
                <div class="distrib-item di-ringan">
                    <div class="distrib-icon"><i class="bi bi-emoji-neutral-fill"></i></div>
                    <div class="distrib-label">Ringan</div>
                    <div class="distrib-value">{{ $cntRingan }}</div>
                    <div class="distrib-pct">{{ $pct($cntRingan) }}% dari total</div>
                </div>
                <div class="distrib-item di-sedang">
                    <div class="distrib-icon"><i class="bi bi-emoji-expressionless-fill"></i></div>
                    <div class="distrib-label">Sedang</div>
                    <div class="distrib-value">{{ $cntSedang }}</div>
                    <div class="distrib-pct">{{ $pct($cntSedang) }}% dari total</div>
                </div>
                <div class="distrib-item di-berat">
                    <div class="distrib-icon"><i class="bi bi-emoji-frown-fill"></i></div>
                    <div class="distrib-label">Berat</div>
                    <div class="distrib-value">{{ $cntBerat }}</div>
                    <div class="distrib-pct">{{ $pct($cntBerat) }}% dari total</div>
                </div>
                <div class="distrib-item di-sberat">
                    <div class="distrib-icon"><i class="bi bi-heartbreak-fill"></i></div>
                    <div class="distrib-label">Sangat Berat</div>
                    <div class="distrib-value">{{ $cntSangatBerat }}</div>
                    <div class="distrib-pct">{{ $pct($cntSangatBerat) }}% dari total</div>
                </div>
            </div>
        </div>

        <!-- TABLE -->
        <div class="section-card" id="tabel">
            <div class="table-header">
                <div>
                    <div class="section-card-title" style="margin-bottom:.2rem;"><span></span>Data Hasil Assessment</div>
                    <div style="font-size:.82rem;color:var(--text-light);">Seluruh data responden dan hasil klasifikasi KNN</div>
                </div>
                <div class="table-actions">
                    <select class="filter-select" id="filterHasil">
                        <option value="">Semua Diagnosa</option>
                        <option value="normal">Normal</option>
                        <option value="ringan">Ringan</option>
                        <option value="sedang">Sedang</option>
                        <option value="berat">Berat</option>
                        <option value="sangat berat">Sangat Berat</option>
                    </select>
                    <select class="filter-select" id="filterSemester">
                        <option value="">Semua Semester</option>
                        <option value="7">Semester 7</option>
                        <option value="8">Semester 8</option>
                        <option value="9">Semester 9</option>
                        <option value="10">Semester 10</option>
                        <option value="11">Semester 11</option>
                        <option value="12">Semester 12</option>
                    </select>
                    <div class="search-wrap">
                        <i class="bi bi-search"></i>
                        <input type="text" class="search-input" id="searchInput" placeholder="Cari nama / prodi...">
                    </div>
                </div>
            </div>

            <div class="table-responsive" style="border-radius:var(--radius-md);overflow:hidden;">
                <table class="data-table" id="dataTable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama & Identitas</th>
                            <th>Akademik</th>
                            <th>Kebiasaan</th>
                            <th>Depresi</th>
                            <th>Kecemasan</th>
                            <th>Stres</th>
                            <th>Diagnosa KNN</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="tableBody">
                        @forelse($data as $item)
                        @php
                            $lbl   = strtolower($item->label_knn ?? '');
                            $badge = 'normal';
                            if ($lbl==='ringan')       $badge='ringan';
                            elseif($lbl==='sedang')    $badge='sedang';
                            elseif($lbl==='berat')     $badge='berat';
                            elseif($lbl==='sangat berat') $badge='sberat';
                            $isL = strtolower($item->mahasiswa->jenis_kelamin??'') === 'laki-laki';
                            $isK = strtolower($item->mahasiswa->bekerja??'') === 'ya';
                        @endphp
                        <tr data-hasil="{{ $lbl }}" data-semester="{{ $item->mahasiswa->semester??'' }}">
                            <td style="color:var(--text-light);font-weight:600;font-size:.82rem;">{{ $loop->iteration }}</td>
                            <td class="td-name">
                                <strong>{{ $item->mahasiswa->nama_lengkap??'-' }}</strong>
                                <small>{{ $item->mahasiswa->prodi??'-' }} · {{ $item->mahasiswa->universitas??'-' }}</small>
                                <div class="td-chips">
                                    <span class="chip {{ $isL?'chip-male':'chip-female' }}">
                                        <i class="bi bi-person-fill" style="font-size:.62rem;"></i>
                                        {{ $item->mahasiswa->jenis_kelamin??'-' }}
                                    </span>
                                    <span class="chip chip-blue">{{ $item->mahasiswa->usia??'-' }} thn</span>
                                </div>
                            </td>
                            <td>
                                <div style="font-size:.84rem;font-weight:600;color:var(--text-dark);">{{ $item->mahasiswa->semester??'-' }}</div>
                                <div style="font-size:.76rem;color:var(--text-light);">{{ $item->mahasiswa->status_ta??'-' }}</div>
                            </td>
                            <td>
                                <div style="font-size:.79rem;color:var(--text-mid);margin-bottom:.25rem;">
                                    <i class="bi bi-moon-stars-fill" style="font-size:.73rem;"></i>
                                    {{ $item->mahasiswa->jam_tidur??'-' }}
                                </div>
                                <span class="chip {{ $isK?'chip-work':'chip-nowork' }}">
                                    {{ $isK?'Bekerja':'Tidak Bekerja' }}
                                </span>
                            </td>
                            <td><span class="score-chip">{{ $item->total_skor_depresi??'-' }}</span></td>
                            <td><span class="score-chip">{{ $item->total_skor_kecemasan??'-' }}</span></td>
                            <td><span class="score-chip">{{ $item->total_skor_stres??'-' }}</span></td>
                            <td>
                                <span class="rbadge {{ $badge }}">
                                    <span class="dot"></span>{{ $item->label_knn??'-' }}
                                </span>
                                <div><span class="dim-chip">↑ {{ $item->dimensi_dominan??'-' }}</span></div>
                            </td>
                            <td>
                                <div class="act-group">
                                    <button type="button" class="btn-eye"
                                        data-bs-toggle="modal" data-bs-target="#modalDetail"
                                        onclick="showDetail({{ $item->id_hasil }})">
                                        <i class="bi bi-eye"></i>Detail
                                    </button>
                                    <form action="/admin/delete/{{ $item->id_hasil }}" method="POST">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="btn-del"><i class="bi bi-trash3"></i></button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="9">
                                <div class="empty-state">
                                    <div class="empty-icon"><i class="bi bi-inbox"></i></div>
                                    <h5>Belum Ada Data Assessment</h5>
                                    <p>Data hasil assessment mahasiswa akan muncul di sini.</p>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
                <div id="noResult"><i class="bi bi-search me-2"></i>Data tidak ditemukan.</div>
            </div>
        </div>

    </div><!-- /main-content -->
</div><!-- /page-wrapper -->

<!-- LOGOUT CONFIRMATION MODAL -->
<div class="modal fade logout-modal" id="logoutModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Konfirmasi Logout</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Apakah Anda yakin ingin keluar dari sesi admin?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-danger btn-sm" id="confirmLogoutBtn">Logout</button>
            </div>
        </div>
    </div>
</div>

<!-- MODAL DETAIL -->
<div class="modal fade" id="modalDetail" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="bi bi-clipboard2-pulse-fill me-2"></i>Detail Responden</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body" id="modalBody">
                <div class="text-center py-4">
                    <div class="spinner-border text-primary" style="width:2rem;height:2rem;"></div>
                </div>
            </div>
        </div>
    </div>
</div>

@php
$dataForModal = $data->map(function($item) {
    $jawaban = [];
    foreach ($item->detailJawaban->sortBy('id_pertanyaan') as $j) {
        $jawaban['q'.$j->id_pertanyaan] = $j->skor_jawaban;
    }
    return [
        'id'             => $item->id_hasil,
        'nama'           => $item->mahasiswa->nama_lengkap ?? '-',
        'universitas'    => $item->mahasiswa->universitas  ?? '-',
        'prodi'          => $item->mahasiswa->prodi        ?? '-',
        'jenis_kelamin'  => $item->mahasiswa->jenis_kelamin?? '-',
        'usia'           => $item->mahasiswa->usia         ?? '-',
        'semester'       => $item->mahasiswa->semester     ?? '-',
        'status_ta'      => $item->mahasiswa->status_ta    ?? '-',
        'jam_tidur'      => $item->mahasiswa->jam_tidur    ?? '-',
        'bekerja'        => $item->mahasiswa->bekerja      ?? '-',
        'skor_depresi'   => $item->total_skor_depresi      ?? '-',
        'skor_kecemasan' => $item->total_skor_kecemasan    ?? '-',
        'skor_stres'     => $item->total_skor_stres        ?? '-',
        'label_knn'      => $item->label_knn               ?? '-',
        'dimensi_dominan'=> $item->dimensi_dominan         ?? '-',
        'jawaban'        => $jawaban,
    ];
})->values();
@endphp

<script>
const allData = @json($dataForModal);

function showDetail(id) {
    const item = allData.find(d => d.id == id);
    if (!item) return;

    const lbl = (item.label_knn||'').toLowerCase();
    const bmap = {
        'normal':'rbadge normal','ringan':'rbadge ringan',
        'sedang':'rbadge sedang','berat':'rbadge berat','sangat berat':'rbadge sberat'
    };
    const bcls = bmap[lbl] || 'rbadge normal';

    const qHtml = Array.from({length:21},(_,i)=>{
        const n=i+1, v=parseInt(item.jawaban['q'+n]??0);
        const cls = v>=3?'qh':v===2?'qm':'';
        return `<div class="q-item ${cls}"><small>Q${n}</small><strong>${item.jawaban['q'+n]??'-'}</strong></div>`;
    }).join('');

    document.getElementById('modalBody').innerHTML = `
        <div class="msec">Data Pribadi</div>
        <div class="minfo-grid">
            <div class="minfo-item"><small>Nama Lengkap</small><strong>${item.nama}</strong></div>
            <div class="minfo-item"><small>Universitas</small><strong>${item.universitas}</strong></div>
            <div class="minfo-item"><small>Program Studi</small><strong>${item.prodi}</strong></div>
            <div class="minfo-item"><small>Jenis Kelamin</small><strong>${item.jenis_kelamin}</strong></div>
            <div class="minfo-item"><small>Usia</small><strong>${item.usia} tahun</strong></div>
            <div class="minfo-item"><small>Semester</small><strong>${item.semester}</strong></div>
            <div class="minfo-item"><small>Status TA</small><strong>${item.status_ta}</strong></div>
            <div class="minfo-item"><small>Rata-rata Tidur</small><strong>${item.jam_tidur}</strong></div>
            <div class="minfo-item"><small>Status Kerja</small><strong>${item.bekerja}</strong></div>
        </div>
        <div class="msec">Skor DASS-21</div>
        <div class="mscore-row">
            <div class="mscore-box sd"><small>Depresi</small><div class="mscore-num">${item.skor_depresi}</div></div>
            <div class="mscore-box sk"><small>Kecemasan</small><div class="mscore-num">${item.skor_kecemasan}</div></div>
            <div class="mscore-box ss"><small>Stres</small><div class="mscore-num">${item.skor_stres}</div></div>
        </div>
        <div class="msec">Jawaban Q1 – Q21</div>
        <div class="q-grid">${qHtml}</div>
        <div style="font-size:.7rem;color:var(--text-light);margin-top:.5rem;display:flex;gap:.6rem;flex-wrap:wrap;">
            <span style="background:#fee2e2;padding:.1rem .45rem;border-radius:4px;color:#dc2626;font-weight:700;">3</span> Sangat Sering
            <span style="background:#fef3c7;padding:.1rem .45rem;border-radius:4px;color:#d97706;font-weight:700;">2</span> Cukup Sering
            <span style="background:var(--blue-soft);padding:.1rem .45rem;border-radius:4px;font-weight:700;">0–1</span> Rendah
        </div>
        <div class="msec mt-3">Hasil Diagnosa KNN</div>
        <div class="mresult-row">
            <div class="mresult-left">
                <span>Hasil Klasifikasi K-Nearest Neighbor</span>
                <small>Dimensi dominan: ${item.dimensi_dominan}</small>
            </div>
            <span class="${bcls}"><span class="dot"></span>${item.label_knn}</span>
        </div>
    `;
}

// Filter & search
const si = document.getElementById('searchInput');
const fh = document.getElementById('filterHasil');
const fs = document.getElementById('filterSemester');
const rows = document.querySelectorAll('#tableBody tr[data-hasil]');
const nr   = document.getElementById('noResult');
const logoutForm = document.getElementById('logoutForm');
const confirmLogoutBtn = document.getElementById('confirmLogoutBtn');

confirmLogoutBtn?.addEventListener('click', function() {
    logoutForm?.submit();
});

function applyFilter() {
    const q=si.value.toLowerCase(), fhv=fh.value.toLowerCase(), fsv=fs.value;
    let found=0;
    rows.forEach(row=>{
        const txt=row.textContent.toLowerCase();
        const h=row.dataset.hasil||'', s=row.dataset.semester||'';
        const ok=(!q||txt.includes(q))&&(!fhv||h===fhv)&&(!fsv||s.includes(fsv));
        row.style.display=ok?'':'none';
        if(ok) found++;
    });
    nr.style.display=found===0?'block':'none';
}
si.addEventListener('input',applyFilter);
fh.addEventListener('change',applyFilter);
fs.addEventListener('change',applyFilter);
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>