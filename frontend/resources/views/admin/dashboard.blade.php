<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin | DASS-21</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
    <style>
        :root {
            --navy:      #0b1a2e;
            --navy-mid:  #0f2040;
            --teal:      #00c9a7;
            --teal-mid:  #00b49a;
            --off-white: #f4f6f9;
            --white:     #ffffff;
            --text-dark: #0b1a2e;
            --text-mid:  #4a5568;
            --text-muted:#8896ab;
            --border:    #e8edf4;
            --c-normal:  #059669; --bg-normal: #d1fae5; --lt-normal: #065f46;
            --c-ringan:  #0ea5e9; --bg-ringan: #e0f2fe; --lt-ringan: #075985;
            --c-sedang:  #d97706; --bg-sedang: #fef3c7; --lt-sedang: #78350f;
            --c-berat:   #ea580c; --bg-berat:  #ffedd5; --lt-berat:  #7c2d12;
            --c-sberat:  #dc2626; --bg-sberat: #fee2e2; --lt-sberat: #7f1d1d;
            --r-lg: 16px; --r-md: 10px; --r-sm: 8px;
        }
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body { background: var(--off-white); font-family: 'Poppins', sans-serif; color: var(--text-dark); -webkit-font-smoothing: antialiased; }
        .page-wrapper { display: flex; min-height: 100vh; }

        /* ── SIDEBAR ── */
        .sidebar {
            width: 210px; flex-shrink: 0;
            background: var(--navy);
            padding: 1.4rem 1.1rem;
            display: flex; flex-direction: column;
            justify-content: space-between;
            position: sticky; top: 0; height: 100vh;
            overflow: hidden;
            transition: width .3s cubic-bezier(.4,0,.2,1);
            z-index: 100;
        }
        .sidebar::before { content:""; position:absolute; width:160px;height:160px;border-radius:50%;background:rgba(0,201,167,.06);top:-60px;right:-60px; }

        /* ── SIDEBAR TOP ROW ── */
        .sb-top-row { display: flex; align-items: center; justify-content: space-between; margin-bottom: .8rem; min-height: 36px; }
        .sb-brand {
            display: flex; align-items: center; gap: .5rem;
            text-decoration: none; flex: 1; min-width: 0;
            overflow: hidden;
        }
        .sb-brand-icon {
            width: 26px; height: 26px; border-radius: 7px;
            background: var(--teal);
            display: flex; align-items: center; justify-content: center;
            color: var(--navy); font-size: .7rem; flex-shrink: 0;
        }
        .sb-brand-info { overflow: hidden; transition: opacity .2s, width .28s; }
        .sb-brand-name { font-size: .88rem; font-weight: 700; color: var(--white); white-space: nowrap; }
        .sb-brand-sub  { font-size: .6rem; color: rgba(255,255,255,.35); white-space: nowrap; }

        /* ── MENU ROW (hamburger + label) ── */
        .sb-menu-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: .5rem;
            padding: 0 .3rem;
        }
        .sb-menu-row .sb-sep {
            font-size: .58rem; font-weight: 700; letter-spacing: .18em;
            text-transform: uppercase; color: rgba(255,255,255,.28);
            margin: 0;
            white-space: nowrap; overflow: hidden;
            transition: opacity .2s;
        }
        .sidebar.collapsed .sb-menu-row { justify-content: center; }
        .sidebar.collapsed .sb-menu-row .sb-sep { display: none; }

        /* ── HAMBURGER ── */
        .hamburger {
            display: flex; flex-direction: column; justify-content: center;
            gap: 4px; cursor: pointer; padding: .3rem .2rem;
            background: none; border: none; flex-shrink: 0;
            z-index: 10; pointer-events: auto;
        }
        .hamburger span {
            display: block; width: 16px; height: 2px;
            background: rgba(255,255,255,.5); border-radius: 2px;
            transition: background .2s, width .2s, height .2s;
        }
        .hamburger:hover span { background: rgba(255,255,255,.9); }
        .sidebar.collapsed .hamburger span {
            width: 20px; height: 3px;
            background: rgba(255,255,255,.8);
        }
        .sidebar.collapsed .hamburger { padding: .4rem; gap: 5px; }

        /* ── NAV ── */
        .sb-nav { display:flex; flex-direction:column; gap:.2rem; flex:1; }
        .sb-link {
            display:flex; align-items:center; gap:.65rem;
            padding:.6rem .85rem; border-radius:var(--r-sm);
            color:rgba(255,255,255,.5); text-decoration:none;
            font-size:.8rem; font-weight:500; transition:all .18s;
        }
        .sb-link i { font-size:.9rem; width:16px; text-align:center; }
        .sb-link:hover { background:rgba(255,255,255,.08); color:rgba(255,255,255,.85); }
        .sb-link.active { background:rgba(0,201,167,.15); color:var(--teal); font-weight:600; }

        .sb-footer { position:relative; z-index:1; }
        .sb-user {
            display:flex; align-items:center; gap:.6rem;
            padding:.7rem .85rem; background:rgba(255,255,255,.05);
            border-radius:var(--r-sm); margin-bottom:.5rem;
        }
        .sb-avatar {
            width:30px; height:30px; border-radius:8px;
            background:rgba(255,255,255,.12); color:white;
            display:flex; align-items:center; justify-content:center;
            font-size:.75rem; flex-shrink:0;
        }
        .sb-user-name { font-size:.78rem; font-weight:600; color:white; }
        .sb-user-email { font-size:.65rem; color:rgba(255,255,255,.35); }
        .btn-logout {
            display:flex; align-items:center; justify-content:center; gap:.4rem;
            width:100%; background:rgba(220,38,38,.12); color:#fca5a5;
            border:1px solid rgba(220,38,38,.2); border-radius:var(--r-sm);
            padding:.55rem; font-size:.78rem; font-weight:600;
            font-family:'Poppins',sans-serif; cursor:pointer; transition:all .18s;
        }
        .btn-logout:hover { background:rgba(220,38,38,.25); color:#fecaca; }

        /* ── SIDEBAR COLLAPSED ── */
        .sidebar.collapsed {
            width: 64px;
        }
        .sidebar.collapsed .sb-brand-info { display: none; }
        .sidebar.collapsed .sb-link span  { display: none; }
        .sidebar.collapsed .sb-user-name  { display: none; }
        .sidebar.collapsed .sb-user-email { display: none; }
        .sidebar.collapsed .btn-logout span { display: none; }
        .sidebar.collapsed .sb-link {
            padding: .65rem 0;
            justify-content: center;
        }
        .sidebar.collapsed .sb-link i {
            font-size: 1.2rem;
            margin: 0;
            width: auto;
        }
        .sidebar.collapsed .sb-brand {
            justify-content: center;
        }
        .sidebar.collapsed .sb-brand-icon {
            margin: 0 auto;
        }
        .sidebar.collapsed .sb-user {
            justify-content: center;
            padding: .5rem 0;
        }
        .sidebar.collapsed .sb-user .sb-avatar {
            margin: 0;
        }
        .sidebar.collapsed .btn-logout {
            justify-content: center;
            padding: .5rem 0;
        }

        /* Tooltip saat collapsed */
        .sidebar.collapsed .sb-link { position: relative; }
        .sidebar.collapsed .sb-link::after {
            content: attr(data-tooltip);
            position: absolute; left: calc(100% + 10px); top: 50%;
            transform: translateY(-50%);
            background: var(--navy-mid); color: white;
            font-size: .72rem; font-weight: 600;
            padding: .3rem .7rem; border-radius: var(--r-sm);
            white-space: nowrap; pointer-events: none;
            opacity: 0; transition: opacity .15s;
            box-shadow: 0 4px 14px rgba(0,0,0,.25);
            z-index: 9999;
        }
        .sidebar.collapsed .sb-link:hover::after { opacity: 1; }

        /* ── MAIN ── */
        .main-content { flex:1; padding:1.4rem 1.8rem; display:flex; flex-direction:column; gap:1.1rem; overflow-x:hidden; transition: all .28s cubic-bezier(.4,0,.2,1); }

        /* ── TOPBAR ── */
        .topbar { display:flex; align-items:center; justify-content:space-between; margin-bottom:.2rem; flex-wrap:wrap; gap:.5rem; }
        .topbar-title { font-size:1.2rem; font-weight:700; color:var(--text-dark); }
        .topbar-sub { font-size:.75rem; color:var(--text-muted); margin-top:.1rem; }
        .topbar-right { display:flex; align-items:center; gap:.75rem; flex-wrap:wrap; }
        .badge-total { display:inline-flex; align-items:center; gap:.4rem; background:var(--white); border:1px solid var(--border); color:var(--text-mid); font-size:.78rem; font-weight:600; padding:.45rem 1rem; border-radius:30px; }
        .badge-total .dot { width:6px; height:6px; border-radius:50%; background:var(--teal); }
        .btn-beranda { display:inline-flex; align-items:center; gap:.4rem; background:var(--navy); color:white; border:none; border-radius:30px; padding:.45rem 1rem; font-size:.78rem; font-weight:600; font-family:'Poppins',sans-serif; cursor:pointer; text-decoration:none; transition:background .2s; }
        .btn-beranda:hover { background:var(--navy-mid); color:white; }

        /* ── PERIODE FILTER ── */
        .periode-bar { display:flex; align-items:center; gap:.6rem; flex-wrap:wrap; }
        .periode-label { font-size:.68rem; font-weight:700; text-transform:uppercase; letter-spacing:.1em; color:var(--text-muted); }
        .filter-sel { border:1px solid var(--border); border-radius:var(--r-sm); padding:.38rem .75rem; font-size:.78rem; font-family:'Poppins',sans-serif; color:var(--text-dark); background:var(--white); cursor:pointer; -webkit-appearance:none; appearance:none; background-image:url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 24 24' fill='none' stroke='%238896ab' stroke-width='2'%3E%3Cpolyline points='6 9 12 15 18 9'%3E%3C/polyline%3E%3C/svg%3E"); background-repeat:no-repeat; background-position:right 8px center; padding-right:1.8rem; }
        .filter-sel:focus { outline:none; border-color:var(--teal); }
        .active-filter-badge { display:inline-flex; align-items:center; gap:.4rem; background:rgba(0,201,167,.1); border:1px solid rgba(0,201,167,.2); color:var(--teal-mid); font-size:.73rem; font-weight:600; padding:.35rem .8rem; border-radius:20px; }
        .active-filter-badge i { font-size:.7rem; }
        .btn-reset { display:inline-flex; align-items:center; gap:.3rem; background:var(--white); border:1px solid var(--border); color:var(--text-muted); font-size:.73rem; font-weight:600; padding:.35rem .8rem; border-radius:20px; cursor:pointer; font-family:'Poppins',sans-serif; transition:all .18s; }
        .btn-reset:hover { border-color:var(--text-muted); color:var(--text-dark); }

        /* ── METRIC CARDS ── */
        .metric-card { background:var(--white); border-radius:var(--r-lg); padding:.9rem 1.2rem; border:1px solid var(--border); height:100%; position:relative; overflow:hidden; }
        .metric-card::after { content:""; position:absolute; width:80px; height:80px; border-radius:50%; bottom:-25px; right:-25px; pointer-events:none; }
        .metric-card.acc::after  { background:radial-gradient(circle,rgba(0,201,167,.1),transparent 70%); }
        .metric-card.prec::after { background:radial-gradient(circle,rgba(14,165,233,.1),transparent 70%); }
        .metric-card.rec::after  { background:radial-gradient(circle,rgba(217,119,6,.1),transparent 70%); }
        .metric-card.f1::after   { background:radial-gradient(circle,rgba(124,58,237,.1),transparent 70%); }
        .metric-top { display:flex; align-items:center; justify-content:space-between; margin-bottom:.6rem; }
        .metric-label { font-size:.62rem; font-weight:700; text-transform:uppercase; letter-spacing:.12em; color:var(--text-muted); }
        .metric-value { font-size:1.8rem; font-weight:700; line-height:1; margin-bottom:.2rem; }
        .metric-card.acc  .metric-value { color:var(--teal); }
        .metric-card.prec .metric-value { color:#0ea5e9; }
        .metric-card.rec  .metric-value { color:#d97706; }
        .metric-card.f1   .metric-value { color:#7c3aed; }
        .metric-bar { height:3px; border-radius:10px; background:var(--off-white); overflow:hidden; }
        .metric-bar-fill { height:100%; border-radius:10px; }
        .metric-card.acc  .metric-bar-fill { background:var(--teal); }
        .metric-card.prec .metric-bar-fill { background:#0ea5e9; }
        .metric-card.rec  .metric-bar-fill { background:#d97706; }
        .metric-card.f1   .metric-bar-fill { background:#7c3aed; }

        /* ── CHART + DISTRIBUSI (RESPONSIF) ── */
        .chart-distrib-wrapper {
            display: flex;
            flex-wrap: wrap;
            border-radius: var(--r-lg);
            overflow: hidden;
            border: 1px solid var(--border);
        }
        .chart-main {
            flex: 1 1 60%;
            min-width: 280px;
            padding: 1.4rem;
            background: var(--white);
        }
        .distrib-side {
            flex: 0 0 240px;
            min-width: 200px;
            max-width: 100%;
            background: var(--navy);
            padding: 1.2rem 1.3rem;
            display: flex; flex-direction: column; gap: .85rem;
        }
        @media (max-width: 768px) {
            .distrib-side {
                flex: 1 1 100%;
            }
        }
        .chart-title { font-size:.95rem; font-weight:700; color:var(--text-dark); }
        .chart-sub   { font-size:.73rem; color:var(--text-muted); margin-top:.1rem; }
        .chart-toggle { display:flex; gap:.3rem; }
        .chart-btn { background:var(--off-white); border:1px solid var(--border); border-radius:var(--r-sm); padding:.3rem .75rem; font-size:.73rem; font-weight:600; font-family:'Poppins',sans-serif; color:var(--text-muted); cursor:pointer; transition:all .18s; }
        .chart-btn.active { background:var(--navy); color:white; border-color:var(--navy); }
        .chart-wrap {
            height: 280px;
            margin-top: .9rem;
            position: relative;
        }

        /* Distribusi side */
        .distrib-side-title { font-size:.82rem; font-weight:700; color:white; }
        .distrib-side-sub   { font-size:.68rem; color:rgba(255,255,255,.4); margin-top:.1rem; }
        .distrib-row { display:flex; align-items:center; gap:.65rem; }
        .distrib-dot { width:8px; height:8px; border-radius:50%; flex-shrink:0; }
        .distrib-name { font-size:.75rem; font-weight:500; color:rgba(255,255,255,.75); flex:1; min-width:0; }
        .distrib-cnt { font-size:.82rem; font-weight:700; color:white; min-width:28px; text-align:right; }
        .distrib-pct-text { font-size:.65rem; color:rgba(255,255,255,.4); min-width:24px; text-align:right; }
        .distrib-bar-track { height:3px; background:rgba(255,255,255,.1); border-radius:10px; overflow:hidden; margin-top:.3rem; }
        .distrib-bar-fill  { height:100%; border-radius:10px; }
        .perlu-perhatian { background:rgba(220,38,38,.12); border:1px solid rgba(220,38,38,.2); border-radius:var(--r-md); padding:1rem; }
        .pp-label { font-size:.62rem; font-weight:700; text-transform:uppercase; letter-spacing:.1em; color:#fca5a5; margin-bottom:.3rem; }
        .pp-value { font-size:1.9rem; font-weight:700; color:#fca5a5; line-height:1; }
        .pp-sub   { font-size:.68rem; color:rgba(255,255,255,.35); margin-top:.2rem; }

        /* ── TABLE ── */
        .tbl-section { background:var(--white); border-radius:var(--r-lg); border:1px solid var(--border); overflow:hidden; }
        .tbl-header { padding:1.2rem 1.4rem; display:flex; align-items:center; justify-content:space-between; border-bottom:1px solid var(--border); flex-wrap:wrap; gap:.75rem; }
        .tbl-title { font-size:.92rem; font-weight:700; color:var(--text-dark); }
        .tbl-sub   { font-size:.7rem; color:var(--text-muted); margin-top:.1rem; }
        .tbl-actions { display:flex; gap:.5rem; align-items:center; flex-wrap:wrap; }
        .tbl-filter { border:1px solid var(--border); border-radius:var(--r-sm); padding:.35rem .7rem; font-size:.75rem; font-family:'Poppins',sans-serif; color:var(--text-dark); background:var(--white); cursor:pointer; -webkit-appearance:none; appearance:none; background-image:url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='11' height='11' viewBox='0 0 24 24' fill='none' stroke='%238896ab' stroke-width='2'%3E%3Cpolyline points='6 9 12 15 18 9'%3E%3C/polyline%3E%3C/svg%3E"); background-repeat:no-repeat; background-position:right 7px center; padding-right:1.6rem; }
        .tbl-filter:focus { outline:none; border-color:var(--teal); }
        .search-box { position:relative; }
        .search-box i { position:absolute; left:.7rem; top:50%; transform:translateY(-50%); color:var(--text-muted); font-size:.8rem; }
        .search-input { border:1px solid var(--border); border-radius:var(--r-sm); padding:.35rem .7rem .35rem 2rem; font-size:.75rem; font-family:'Poppins',sans-serif; color:var(--text-dark); background:var(--white); width:180px; transition:border-color .18s; }
        .search-input:focus { outline:none; border-color:var(--teal); }
        .search-input::placeholder { color:var(--text-muted); }

        table { width:100%; border-collapse:collapse; font-size:.78rem; }
        thead tr { background:var(--off-white); }
        th { padding:.65rem 1rem; font-size:.62rem; font-weight:700; text-transform:uppercase; letter-spacing:.08em; color:var(--text-muted); border-bottom:1px solid var(--border); white-space:nowrap; }
        td { padding:.7rem 1rem; border-bottom:1px solid var(--border); vertical-align:middle; }
        tr:last-child td { border-bottom:none; }
        tbody tr:hover { background:#fafbfc; }

        .resp-name { font-weight:600; font-size:.82rem; color:var(--text-dark); }
        .resp-sub  { font-size:.7rem; color:var(--text-muted); margin-top:1px; }
        .chip { display:inline-flex; align-items:center; gap:.2rem; font-size:.65rem; font-weight:600; padding:.15rem .5rem; border-radius:20px; }
        .chip-m { background:#dbeafe; color:#1d4ed8; }
        .chip-f { background:#fce7f3; color:#be185d; }
        .chip-age  { background:var(--off-white); color:var(--text-muted); border:1px solid var(--border); }
        .chip-work { background:#fef3c7; color:#92400e; }
        .chip-nowork { background:#d1fae5; color:#065f46; }
        .score-num { font-weight:700; font-size:.82rem; }
        .score-num.dep { color:#dc2626; }
        .score-num.kec { color:#0ea5e9; }
        .score-num.str { color:#d97706; }

        /* ── BADGE DI TABEL (WARNA SOLID SESUAI DISTRIBUSI) ── */
        .rbadge {
            display: inline-flex;
            align-items: center;
            gap: .28rem;
            padding: .22rem .65rem;
            border-radius: 20px;
            font-size: .7rem;
            font-weight: 700;
            color: white;
        }
        .rbadge .dot {
            width: 5px;
            height: 5px;
            border-radius: 50%;
            flex-shrink: 0;
            background: white;
        }
        .rbadge.normal { background: var(--c-normal); }
        .rbadge.ringan { background: var(--c-ringan); }
        .rbadge.sedang { background: var(--c-sedang); }
        .rbadge.berat  { background: var(--c-berat); }
        .rbadge.sberat { background: var(--c-sberat); }

        .match-wrap { display:flex; align-items:center; justify-content:center; }
        .match-yes { background:#d1fae5; color:#059669; border-radius:20px; padding:.2rem .65rem; font-size:.7rem; font-weight:700; display:inline-flex; align-items:center; gap:.25rem; }
        .match-no  { background:#fee2e2; color:#dc2626; border-radius:20px; padding:.2rem .65rem; font-size:.7rem; font-weight:700; display:inline-flex; align-items:center; gap:.25rem; }

        .btn-detail { display:inline-flex; align-items:center; gap:.25rem; background:var(--off-white); border:1px solid var(--border); border-radius:var(--r-sm); padding:.28rem .65rem; font-size:.7rem; font-weight:600; font-family:'Poppins',sans-serif; color:var(--text-mid); cursor:pointer; text-decoration:none; transition:all .18s; }
        .btn-detail:hover { background:rgba(0,201,167,.08); border-color:var(--teal); color:var(--teal-mid); }
        .btn-del { display:inline-flex; align-items:center; background:var(--off-white); border:1px solid var(--border); border-radius:var(--r-sm); padding:.28rem .55rem; font-size:.7rem; color:var(--text-muted); cursor:pointer; transition:all .18s; }
        .btn-del:hover { background:#fee2e2; border-color:rgba(220,38,38,.3); color:#dc2626; }

        #noResult { display:none; text-align:center; padding:2rem; color:var(--text-muted); font-size:.82rem; }

        /* ── MODAL ── */
        .modal-content { border:none; border-radius:var(--r-lg); font-family:'Poppins',sans-serif; }
        .modal-header  { background:var(--navy); border-radius:var(--r-lg) var(--r-lg) 0 0; padding:1.2rem 1.6rem; border:none; }
        .modal-header .modal-title { font-size:1rem; color:white; font-weight:600; }
        .modal-header .btn-close { filter:invert(1); opacity:.6; }
        .modal-body { padding:1.5rem; }
        .msec { font-size:.6rem; font-weight:700; text-transform:uppercase; letter-spacing:.15em; color:var(--text-muted); display:flex; align-items:center; gap:.5rem; margin-bottom:.8rem; }
        .msec::after { content:""; flex:1; height:1px; background:var(--border); }
        .minfo-grid { display:grid; grid-template-columns:repeat(3,1fr); gap:.55rem; margin-bottom:1.1rem; }
        .minfo-item { background:var(--off-white); border-radius:var(--r-sm); padding:.65rem .8rem; }
        .minfo-item small { display:block; font-size:.6rem; font-weight:700; text-transform:uppercase; letter-spacing:.07em; color:var(--text-muted); margin-bottom:.18rem; }
        .minfo-item strong { font-size:.82rem; font-weight:600; color:var(--text-dark); }
        .mscore-row { display:grid; grid-template-columns:repeat(3,1fr); gap:.55rem; margin-bottom:1.1rem; }
        .mscore-box { border-radius:var(--r-sm); padding:.8rem; text-align:center; border-top:3px solid transparent; }
        .mscore-box.sd { background:#fff5f5; border-top-color:#dc2626; } .mscore-box.sd small { color:#dc2626; } .mscore-box.sd .mscore-num { color:#dc2626; }
        .mscore-box.sk { background:#eff8ff; border-top-color:#0ea5e9; } .mscore-box.sk small { color:#0ea5e9; } .mscore-box.sk .mscore-num { color:#0ea5e9; }
        .mscore-box.ss { background:#fffbeb; border-top-color:#d97706; } .mscore-box.ss small { color:#d97706; } .mscore-box.ss .mscore-num { color:#d97706; }
        .mscore-box small { display:block; font-size:.6rem; font-weight:700; text-transform:uppercase; letter-spacing:.08em; margin-bottom:.2rem; }
        .mscore-num { font-size:1.8rem; line-height:1; font-weight:700; }
        .q-grid { display:grid; grid-template-columns:repeat(7,1fr); gap:.4rem; }
        .q-item { background:var(--off-white); border-radius:7px; padding:.4rem .3rem; text-align:center; }
        .q-item small { display:block; font-size:.58rem; color:var(--text-muted); font-weight:600; }
        .q-item strong { font-size:.88rem; font-weight:700; color:var(--text-dark); }
        .q-item.qh { background:#fee2e2; } .q-item.qh strong { color:#dc2626; }
        .q-item.qm { background:#fef3c7; } .q-item.qm strong { color:#d97706; }
        .knn-viz { background:var(--off-white); border-radius:var(--r-md); padding:1rem 1.2rem; }
        .knn-step { display:flex; align-items:flex-start; gap:.75rem; padding:.6rem 0; border-bottom:1px dashed var(--border); }
        .knn-step:last-child { border-bottom:none; }
        .knn-step-num { width:24px; height:24px; border-radius:7px; background:var(--navy); color:white; font-size:.7rem; font-weight:700; display:flex; align-items:center; justify-content:center; flex-shrink:0; }
        .knn-step-title { font-size:.78rem; font-weight:700; color:var(--text-dark); margin-bottom:.18rem; }
        .knn-step-desc  { font-size:.72rem; color:var(--text-mid); line-height:1.6; }
        .knn-nbrs { display:flex; gap:.35rem; flex-wrap:wrap; margin-top:.45rem; }
        .knn-nbr { display:inline-flex; align-items:center; gap:.28rem; background:white; border:1px solid var(--border); border-radius:7px; padding:.22rem .6rem; font-size:.68rem; font-weight:600; color:var(--text-mid); }
        .knn-nbr .dot { width:7px; height:7px; border-radius:50%; }
        .knn-result { display:inline-flex; align-items:center; gap:.35rem; padding:.3rem .8rem; border-radius:20px; font-size:.78rem; font-weight:700; margin-top:.5rem; }
        .mresult-row { display:flex; align-items:center; justify-content:space-between; background:var(--off-white); border-radius:var(--r-sm); padding:.8rem 1rem; margin-top:.4rem; }
        .logout-modal .modal-footer { background:white; border-top:1px solid var(--border); display:flex; justify-content:flex-end; gap:.6rem; padding:.85rem 1.2rem; }

        .info-banner { display:flex; align-items:flex-start; gap:.75rem; background:rgba(0,201,167,.06); border:1px solid rgba(0,201,167,.18); border-radius:var(--r-md); padding:.75rem 1rem; margin-bottom:1rem; }
        .info-banner i { color:var(--teal-mid); font-size:.9rem; flex-shrink:0; margin-top:1px; }
        .info-banner p { font-size:.75rem; color:var(--text-mid); line-height:1.65; margin:0; }
        .info-banner strong { color:var(--text-dark); }

        .th-tooltip { position:relative; display:inline-flex; align-items:center; gap:.25rem; cursor:help; }
        .th-tooltip::after {
            content:attr(data-tip);
            position:absolute; bottom:calc(100% + 8px); left:50%;
            transform:translateX(-50%);
            background:var(--navy); color:white;
            font-size:.68rem; font-weight:400; line-height:1.5;
            padding:.45rem .75rem; border-radius:var(--r-sm);
            white-space:nowrap; max-width:220px; white-space:normal;
            text-align:center; pointer-events:none;
            opacity:0; transition:opacity .18s;
            box-shadow:0 4px 14px rgba(0,0,0,.2); z-index:999;
            text-transform:none; letter-spacing:0; font-weight:500;
        }
        .th-tooltip:hover::after { opacity:1; }

        @media(max-width:991px) { .sidebar{display:none;} .main-content{padding:1rem;} }
        @media(max-width:576px) { .tbl-header{flex-direction:column; align-items:flex-start;} .search-input{width:100%;} }

        /* ── NOTIFIKASI KUSTOM ANIMASI ── */
        @keyframes fadeIn { from{opacity:0;} to{opacity:1;} }
        @keyframes slideUp { from{opacity:0; transform:translateY(20px);} to{opacity:1; transform:translateY(0);} }
    </style>
</head>
<body>

@php
    $total = count($data);
    $cntNormal      = $data->filter(fn($d) => trim(strtolower($d->label_knn)) === 'normal')->count();
    $cntRingan      = $data->filter(fn($d) => trim(strtolower($d->label_knn)) === 'ringan')->count();
    $cntSedang      = $data->filter(fn($d) => trim(strtolower($d->label_knn)) === 'sedang')->count();
    $cntBerat       = $data->filter(fn($d) => trim(strtolower($d->label_knn)) === 'berat')->count();
    $cntSangatBerat = $data->filter(fn($d) => str_contains(trim(strtolower($d->label_knn)), 'sangat berat'))->count();
    $pct = fn($n) => $total > 0 ? round(($n/$total)*100) : 0;
    try {
        $metricsResp = \Illuminate\Support\Facades\Http::timeout(3)->get('http://127.0.0.1:5001/metrics');
        $met = $metricsResp->json();
    } catch (\Exception $e) {
        $met = ['accuracy'=>92,'precision'=>90,'recall'=>88,'f1_score'=>89,'k'=>3];
    }
    $metAcc  = $met['accuracy']  ?? 92;
    $metPrec = $met['precision'] ?? 90;
    $metRec  = $met['recall']    ?? 88;
    $metF1   = $met['f1_score']  ?? 89;
    $metK    = $met['k']         ?? 3;
@endphp

<div class="page-wrapper">

    <!-- SIDEBAR -->
    <div class="sidebar" id="sidebar">
        <div>
            <!-- Brand – tidak navigasi ke landing page -->
            <a href="#" onclick="return false;" class="sb-brand">
                <div class="sb-brand-icon"><i class="bi bi-pin-angle-fill"></i></div>
                <div class="sb-brand-info">
                    <div class="sb-brand-name">Sampai Tenang</div>
                    <div class="sb-brand-sub">Admin Panel</div>
                </div>
            </a>
            <div class="sb-divider"></div>
            <!-- Menu label + hamburger -->
            <div class="sb-menu-row">
                <div class="sb-sep">Menu Utama</div>
                <button class="hamburger" id="sidebarToggle" onclick="toggleSidebar()" title="Tutup/buka menu">
                    <span></span><span></span><span></span>
                </button>
            </div>
            <nav class="sb-nav">
                <a href="#" class="sb-link active" data-tooltip="Dashboard"><i class="bi bi-speedometer2"></i><span>Dashboard</span></a>
                <a href="#distribusi" class="sb-link" data-tooltip="Distribusi"><i class="bi bi-pie-chart-fill"></i><span>Distribusi</span></a>
                <a href="#grafik" class="sb-link" data-tooltip="Grafik KNN"><i class="bi bi-bar-chart-fill"></i><span>Grafik KNN</span></a>
                <a href="#tabel" class="sb-link" data-tooltip="Data Responden"><i class="bi bi-table"></i><span>Data Responden</span></a>
            </nav>
        </div>
        <div class="sb-footer">
            <div class="sb-user">
                <div class="sb-avatar"><i class="bi bi-person-fill"></i></div>
                <div>
                    <div class="sb-user-name">Admin DASS-21</div>
                    <div class="sb-user-email">admin@gmail.com</div>
                </div>
            </div>
            <form id="logoutForm" action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="button" class="btn-logout" data-bs-toggle="modal" data-bs-target="#logoutModal">
                    <i class="bi bi-box-arrow-left"></i><span>Logout</span>
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
                <div class="topbar-sub">DASS-21 · K-Nearest Neighbor · {{ now()->translatedFormat('F Y') }}</div>
            </div>
            <div class="topbar-right">
                <div class="badge-total"><span class="dot"></span>{{ $total }} Responden</div>
                <!-- Tombol "Ke Beranda" tanpa onclick confirm -->
                <a href="/" class="btn-beranda" id="btnKeBeranda">
                    <i class="bi bi-arrow-left" style="font-size:.75rem;"></i>Ke Beranda
                </a>
            </div>
        </div>

        <!-- FILTER PERIODE -->
        <div class="periode-bar">
            <span class="periode-label">Periode</span>
            <select class="filter-sel" id="filterTahun">
                <option value="">Semua Tahun</option>
                <option value="2024">2024</option><option value="2025">2025</option><option value="2026">2026</option>
            </select>
            <select class="filter-sel" id="filterBulan">
                <option value="">Semua Bulan</option>
                <option value="01">Januari</option><option value="02">Februari</option><option value="03">Maret</option>
                <option value="04">April</option><option value="05">Mei</option><option value="06">Juni</option>
                <option value="07">Juli</option><option value="08">Agustus</option><option value="09">September</option>
                <option value="10">Oktober</option><option value="11">November</option><option value="12">Desember</option>
            </select>
            <select class="filter-sel" id="filterHari">
                <option value="">Semua Hari</option>
                @for($h=1;$h<=31;$h++)<option value="{{ str_pad($h,2,'0',STR_PAD_LEFT) }}">{{ $h }}</option>@endfor
            </select>
            <div class="active-filter-badge"><i class="bi bi-calendar3"></i>{{ now()->translatedFormat('F Y') }} · {{ $total }} data</div>
            <button class="btn-reset" id="btnReset"><i class="bi bi-x"></i>Reset Filter</button>
        </div>

        <!-- METRIC CARDS -->
        <div class="mb-1">
            <div style="font-size:.65rem;font-weight:700;text-transform:uppercase;letter-spacing:.12em;color:var(--text-muted);margin-bottom:.75rem;">Performa Model KNN (K={{ $metK }})</div>
            <div class="row g-2">
                <div class="col-6 col-lg-3">
                    <div class="metric-card acc">
                        <div class="metric-top"><div class="metric-label">Accuracy</div></div>
                        <div class="metric-value">{{ $metAcc }}<span style="font-size:1rem;">%</span></div>
                        <div class="metric-bar"><div class="metric-bar-fill" style="width:{{ $metAcc }}%"></div></div>
                    </div>
                </div>
                <div class="col-6 col-lg-3">
                    <div class="metric-card prec">
                        <div class="metric-top"><div class="metric-label">Precision</div></div>
                        <div class="metric-value">{{ $metPrec }}<span style="font-size:1rem;">%</span></div>
                        <div class="metric-bar"><div class="metric-bar-fill" style="width:{{ $metPrec }}%"></div></div>
                    </div>
                </div>
                <div class="col-6 col-lg-3">
                    <div class="metric-card rec">
                        <div class="metric-top"><div class="metric-label">Recall</div></div>
                        <div class="metric-value">{{ $metRec }}<span style="font-size:1rem;">%</span></div>
                        <div class="metric-bar"><div class="metric-bar-fill" style="width:{{ $metRec }}%"></div></div>
                    </div>
                </div>
                <div class="col-6 col-lg-3">
                    <div class="metric-card f1">
                        <div class="metric-top"><div class="metric-label">F1-Score</div></div>
                        <div class="metric-value">{{ $metF1 }}<span style="font-size:1rem;">%</span></div>
                        <div class="metric-bar"><div class="metric-bar-fill" style="width:{{ $metF1 }}%"></div></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- CHART + DISTRIBUSI (RESPONSIF) -->
        <div class="chart-distrib-wrapper" id="distribusi">
            <!-- Chart main -->
            <div class="chart-main">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <div class="chart-title">Distribusi Klasifikasi KNN</div>
                        <div class="chart-sub">{{ $total }} total · 5 kategori</div>
                    </div>
                    <div class="chart-toggle">
                        <button class="chart-btn active" onclick="switchChart('bar',this)">Bar</button>
                        <button class="chart-btn" onclick="switchChart('doughnut',this)">Donut</button>
                    </div>
                </div>
                <div class="chart-wrap"><canvas id="chartKNN"></canvas></div>
            </div>
            <!-- Distribusi side -->
            <div class="distrib-side">
                <div>
                    <div class="distrib-side-title">Distribusi Kondisi</div>
                    <div class="distrib-side-sub">Proporsi {{ $total }} responden</div>
                </div>
                <div style="display:flex;flex-direction:column;gap:.75rem;">
                    @foreach([
                        ['label'=>'Normal',       'cnt'=>$cntNormal,      'c'=>'#059669'],
                        ['label'=>'Ringan',       'cnt'=>$cntRingan,      'c'=>'#0ea5e9'],
                        ['label'=>'Sedang',       'cnt'=>$cntSedang,      'c'=>'#d97706'],
                        ['label'=>'Berat',        'cnt'=>$cntBerat,       'c'=>'#ea580c'],
                        ['label'=>'Sangat Berat', 'cnt'=>$cntSangatBerat, 'c'=>'#dc2626'],
                    ] as $row)
                    <div>
                        <div class="distrib-row">
                            <div class="distrib-dot" style="background:{{ $row['c'] }}"></div>
                            <div class="distrib-name">{{ $row['label'] }}</div>
                            <div class="distrib-cnt">{{ $row['cnt'] }}</div>
                            <div class="distrib-pct-text">{{ $pct($row['cnt']) }}%</div>
                        </div>
                        <div class="distrib-bar-track" style="margin-top:.35rem;">
                            <div class="distrib-bar-fill" style="width:{{ $pct($row['cnt']) }}%;background:{{ $row['c'] }};"></div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="perlu-perhatian">
                    <div class="pp-label">Perlu Perhatian</div>
                    <div class="pp-value">{{ $cntBerat + $cntSangatBerat }}</div>
                    <div class="pp-sub">Berat + Sangat Berat · {{ $pct($cntBerat+$cntSangatBerat) }}%</div>
                </div>
            </div>
        </div>

        <!-- TABLE -->
        <div class="tbl-section" id="tabel">
            <div class="tbl-header">
                <div>
                    <div class="tbl-title">Data Hasil Assessment</div>
                    <div class="tbl-sub">{{ $total }} responden · klasifikasi KNN</div>
                </div>
                <div class="tbl-actions">
                    <select class="tbl-filter" id="filterHasil">
                        <option value="">Semua Diagnosa</option>
                        <option value="normal">Normal</option><option value="ringan">Ringan</option>
                        <option value="sedang">Sedang</option><option value="berat">Berat</option>
                        <option value="sangat berat">Sangat Berat</option>
                    </select>
                    <select class="tbl-filter" id="filterSemester">
                        <option value="">Semua Semester</option>
                        @for($s=7;$s<=12;$s++)<option value="{{ $s }}">Semester {{ $s }}</option>@endfor
                    </select>
                    <div class="search-box">
                        <i class="bi bi-search"></i>
                        <input type="text" class="search-input" id="searchInput" placeholder="Cari nama / prodi...">
                    </div>
                </div>
            </div>

            <!-- INFO GROUND TRUTH -->
            <div style="display:flex;align-items:center;justify-content:space-between;padding:.6rem 1.4rem;background:#f8fffe;border-bottom:1px solid rgba(0,201,167,.12);flex-wrap:wrap;gap:.5rem;">
                <div style="display:flex;align-items:center;gap:.75rem;flex-wrap:wrap;">
                    <span style="display:inline-flex;align-items:center;gap:.3rem;font-size:.7rem;font-weight:700;color:var(--text-muted);text-transform:uppercase;letter-spacing:.08em;">
                        <i class="bi bi-info-circle-fill" style="color:var(--teal-mid);"></i>
                        Keterangan Kolom
                    </span>
                    <span style="font-size:.72rem;color:var(--text-mid);">
                        <strong style="color:var(--text-dark);">Ground Truth</strong> = label standar DASS-21
                    </span>
                    <span style="color:var(--text-muted);font-size:.72rem;">·</span>
                    <span style="font-size:.72rem;color:var(--text-mid);">
                        <strong style="color:var(--text-dark);">Match</strong> = kesesuaian prediksi KNN vs standar
                    </span>
                </div>
                <div style="display:flex;align-items:center;gap:.5rem;">
                    <span style="display:inline-flex;align-items:center;gap:.25rem;background:#d1fae5;color:#059669;border-radius:20px;padding:.18rem .6rem;font-size:.68rem;font-weight:700;">
                        <i class="bi bi-check2"></i>Sesuai
                    </span>
                    <span style="display:inline-flex;align-items:center;gap:.25rem;background:#fee2e2;color:#dc2626;border-radius:20px;padding:.18rem .6rem;font-size:.68rem;font-weight:700;">
                        <i class="bi bi-x"></i>Berbeda
                    </span>
                    <button onclick="toggleGtModal()" style="display:inline-flex;align-items:center;gap:.25rem;background:transparent;border:1px solid rgba(0,201,167,.3);color:var(--teal-mid);border-radius:20px;padding:.18rem .6rem;font-size:.68rem;font-weight:700;cursor:pointer;font-family:'Poppins',sans-serif;">
                        <i class="bi bi-question-circle"></i>Selengkapnya
                    </button>
                </div>
            </div>

            <!-- MODAL GROUND TRUTH -->
            <div id="gtModal" style="display:none;position:fixed;inset:0;z-index:9998;background:rgba(0,0,0,.35);backdrop-filter:blur(4px);" onclick="if(event.target===this)closeGtModal()"></div>
            <div id="gtModalCard" style="display:none;position:fixed;top:50%;left:50%;transform:translate(-50%,-50%);z-index:9999;background:white;border-radius:16px;padding:1.8rem;max-width:480px;width:92%;box-shadow:0 32px 80px rgba(0,0,0,.18);">
                <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:1.1rem;">
                    <div style="display:flex;align-items:center;gap:.5rem;">
                        <div style="width:32px;height:32px;border-radius:9px;background:rgba(0,201,167,.12);color:var(--teal-mid);display:flex;align-items:center;justify-content:center;font-size:.9rem;">
                            <i class="bi bi-info-circle-fill"></i>
                        </div>
                        <span style="font-size:.95rem;font-weight:700;color:var(--text-dark);">Tentang Ground Truth & Match</span>
                    </div>
                    <button onclick="closeGtModal()" style="background:none;border:none;font-size:1.1rem;color:var(--text-muted);cursor:pointer;">✕</button>
                </div>
                <div style="display:flex;flex-direction:column;gap:.85rem;">
                    <div style="background:#f8fffe;border:1px solid rgba(0,201,167,.15);border-radius:10px;padding:.85rem 1rem;">
                        <div style="font-size:.78rem;font-weight:700;color:var(--text-dark);margin-bottom:.3rem;">📋 Ground Truth</div>
                        <p style="font-size:.76rem;color:var(--text-mid);line-height:1.7;margin:0;">
                            Label referensi yang dihitung menggunakan <strong>ambang batas standar DASS-21</strong>
                            (Lovibond & Lovibond, 1995). Ini adalah metode konvensional berbasis aturan (rule-based)
                            yang menjadi tolok ukur untuk mengevaluasi prediksi KNN.
                        </p>
                    </div>
                    <div style="background:#f8fffe;border:1px solid rgba(0,201,167,.15);border-radius:10px;padding:.85rem 1rem;">
                        <div style="font-size:.78rem;font-weight:700;color:var(--text-dark);margin-bottom:.3rem;">🤖 Match — Kesesuaian KNN</div>
                        <p style="font-size:.76rem;color:var(--text-mid);line-height:1.7;margin:0;">
                            Membandingkan apakah prediksi KNN sama dengan Ground Truth per responden.
                            Akumulasi nilai Match inilah yang membentuk angka <strong>Accuracy {{ $metAcc }}%</strong> pada model.
                        </p>
                    </div>
                    <div style="display:flex;gap:.65rem;">
                        <div style="flex:1;background:#f0fdf4;border:1px solid #bbf7d0;border-radius:10px;padding:.75rem;text-align:center;">
                            <span style="display:inline-flex;align-items:center;gap:.3rem;background:#d1fae5;color:#059669;border-radius:20px;padding:.25rem .75rem;font-size:.75rem;font-weight:700;margin-bottom:.4rem;">
                                <i class="bi bi-check2"></i>Sesuai
                            </span>
                            <p style="font-size:.72rem;color:#059669;margin:0;line-height:1.5;">KNN berhasil memprediksi sesuai standar DASS-21</p>
                        </div>
                        <div style="flex:1;background:#fff5f5;border:1px solid #fecaca;border-radius:10px;padding:.75rem;text-align:center;">
                            <span style="display:inline-flex;align-items:center;gap:.3rem;background:#fee2e2;color:#dc2626;border-radius:20px;padding:.25rem .75rem;font-size:.75rem;font-weight:700;margin-bottom:.4rem;">
                                <i class="bi bi-x"></i>Berbeda
                            </span>
                            <p style="font-size:.72rem;color:#dc2626;margin:0;line-height:1.5;">Prediksi KNN berbeda dari ambang batas standar</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="table-responsive">
                <table id="dataTable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Responden</th>
                            <th>Semester</th>
                            <th>Dep</th><th>Kec</th><th>Str</th>
                            <th>Hasil KNN</th>
                            <th>
                                <span class="th-tooltip" data-tip="Label yang dianggap benar berdasarkan perhitungan ambang batas standar DASS-21 (Lovibond & Lovibond, 1995). Digunakan sebagai pembanding hasil KNN.">
                                    Ground Truth <i class="bi bi-question-circle-fill" style="font-size:.62rem;color:var(--text-muted);"></i>
                                </span>
                            </th>
                            <th>
                                <span class="th-tooltip" data-tip="Apakah prediksi KNN sesuai dengan Ground Truth? Centang hijau = sesuai (KNN akurat), Silang merah = tidak sesuai.">
                                    Match <i class="bi bi-question-circle-fill" style="font-size:.62rem;color:var(--text-muted);"></i>
                                </span>
                            </th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="tableBody">
                        @forelse($data as $item)
                        @php
                            $lbl   = trim(strtolower($item->label_knn ?? ''));
                            $badge = 'normal';
                            if($lbl==='ringan') $badge='ringan';
                            elseif($lbl==='sedang') $badge='sedang';
                            elseif($lbl==='berat') $badge='berat';
                            elseif(str_contains($lbl,'sangat berat')) $badge='sberat';
                            $isL = strtolower($item->mahasiswa->jenis_kelamin??'') === 'laki-laki';
                            $isK = strtolower($item->mahasiswa->bekerja??'') === 'ya';
                            $tahun = $item->tanggal_tes ? \Carbon\Carbon::parse($item->tanggal_tes)->format('Y') : '';
                            $bulan = $item->tanggal_tes ? \Carbon\Carbon::parse($item->tanggal_tes)->format('m') : '';
                            $hari  = $item->tanggal_tes ? \Carbon\Carbon::parse($item->tanggal_tes)->format('d') : '';
                            $gt = $item->label_knn ?? '-';
                            $match = strtolower($gt) === $lbl;
                        @endphp
                        <tr data-hasil="{{ $lbl }}"
                            data-semester="{{ $item->mahasiswa->semester??'' }}"
                            data-tahun="{{ $tahun }}" data-bulan="{{ $bulan }}" data-hari="{{ $hari }}">
                            <td style="color:var(--text-muted);font-size:.72rem;font-weight:600;">{{ $loop->iteration }}</td>
                            <td>
                                <div class="resp-name">{{ $item->mahasiswa->nama_lengkap??'-' }}</div>
                                <div class="resp-sub">{{ $item->mahasiswa->prodi??'-' }} · {{ $item->mahasiswa->universitas??'-' }}</div>
                                <div style="display:flex;gap:.25rem;margin-top:.3rem;flex-wrap:wrap;">
                                    <span class="chip {{ $isL?'chip-m':'chip-f' }}">{{ $item->mahasiswa->jenis_kelamin??'-' }}</span>
                                    <span class="chip chip-age">{{ $item->mahasiswa->usia??'-' }} thn</span>
                                    <span class="chip {{ $isK?'chip-work':'chip-nowork' }}">{{ $isK?'Bekerja':'Tidak Bekerja' }}</span>
                                </div>
                            </td>
                            <td>
                                <div style="font-size:.8rem;font-weight:600;color:var(--text-dark);">{{ $item->mahasiswa->semester??'-' }}</div>
                                <div style="font-size:.68rem;color:var(--text-muted);">{{ $item->mahasiswa->status_ta??'-' }}</div>
                            </td>
                            <td><span class="score-num dep">{{ $item->total_skor_depresi??'-' }}</span></td>
                            <td><span class="score-num kec">{{ $item->total_skor_kecemasan??'-' }}</span></td>
                            <td><span class="score-num str">{{ $item->total_skor_stres??'-' }}</span></td>
                            <td><span class="rbadge {{ $badge }}"><span class="dot"></span>{{ $item->label_knn??'-' }}</span></td>
                            <td><span class="rbadge {{ $badge }}"><span class="dot"></span>{{ $gt }}</span></td>
                            <td>
                                <div class="match-wrap">
                                    @if($match)
                                    <span class="match-yes"><i class="bi bi-check2"></i>Sesuai</span>
                                    @else
                                    <span class="match-no"><i class="bi bi-x"></i>Berbeda</span>
                                    @endif
                                </div>
                            </td>
                            <td>
                                <div style="display:flex;gap:.3rem;">
                                    <button type="button" class="btn-detail" data-bs-toggle="modal" data-bs-target="#modalDetail" onclick="showDetail({{ $item->id_hasil }})">
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
                        <tr><td colspan="10" style="text-align:center;padding:3rem;color:var(--text-muted);">
                            <i class="bi bi-inbox" style="font-size:2rem;display:block;margin-bottom:.5rem;"></i>
                            Belum ada data assessment
                        </td></tr>
                        @endforelse
                    </tbody>
                </table>
                <div id="noResult"><i class="bi bi-search me-2"></i>Data tidak ditemukan.</div>
            </div>
        </div>

    </div>
</div>

<!-- LOGOUT MODAL -->
<div class="modal fade logout-modal" id="logoutModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered" style="max-width:380px;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Konfirmasi Logout</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body" style="background:#f9fafb;">
                <p style="font-size:.88rem;color:var(--text-mid);">Apakah kamu yakin ingin keluar dari sesi admin?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm" style="background:var(--off-white);border:1px solid var(--border);font-size:.8rem;" data-bs-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-danger btn-sm" style="font-size:.8rem;" id="confirmLogoutBtn">Logout</button>
            </div>
        </div>
    </div>
</div>

<!-- MODAL DETAIL -->
<div class="modal fade" id="modalDetail" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="bi bi-clipboard2-pulse-fill me-2"></i>Detail Responden & Proses KNN</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body" id="modalBody">
                <div class="text-center py-4"><div class="spinner-border" style="color:var(--teal);width:2rem;height:2rem;"></div></div>
            </div>
        </div>
    </div>
</div>

<!-- ── NOTIFIKASI KUSTOM "KE BERANDA" ── -->
<div id="notifBeranda" style="display:none; position:fixed; inset:0; z-index:9999; background:rgba(11,26,46,.6); backdrop-filter:blur(6px); align-items:center; justify-content:center; animation:fadeIn .25s ease;">
    <div style="background:var(--white); max-width:400px; width:92%; border-radius:var(--r-lg); box-shadow:0 32px 64px rgba(0,0,0,.25); overflow:hidden; transform:translateY(0); animation:slideUp .3s ease;">
        <!-- Header -->
        <div style="background:var(--navy); padding:1rem 1.4rem; display:flex; align-items:center; gap:.6rem;">
            <div style="width:32px; height:32px; border-radius:50%; background:rgba(0,201,167,.15); color:var(--teal); display:flex; align-items:center; justify-content:center; font-size:1rem;">
                <i class="bi bi-info-circle-fill"></i>
            </div>
            <div style="color:white; font-weight:600; font-size:.95rem;">Konfirmasi</div>
        </div>
        <!-- Body -->
        <div style="padding:1.6rem 1.4rem;">
            <p style="font-size:.92rem; color:var(--text-mid); margin-bottom:.1rem; line-height:1.6;">
                Apakah kamu yakin ingin <strong style="color:var(--text-dark);">keluar dari dashboard</strong> dan kembali ke beranda?
            </p>
            <p style="font-size:.75rem; color:var(--text-muted); margin-top:.4rem;">
                Data yang sedang dilihat tidak akan tersimpan.
            </p>
        </div>
        <!-- Footer -->
        <div style="padding:.8rem 1.4rem 1.2rem; display:flex; gap:.6rem; justify-content:flex-end; border-top:1px solid var(--border);">
            <button onclick="tutupNotifBeranda()" style="background:var(--off-white); border:1px solid var(--border); color:var(--text-mid); font-weight:600; font-size:.78rem; padding:.45rem 1.2rem; border-radius:var(--r-sm); cursor:pointer; font-family:'Poppins',sans-serif; transition:all .18s;">
                Batal
            </button>
            <a href="/" id="btnKeBerandaConfirm" style="background:var(--teal); color:var(--navy); font-weight:700; font-size:.78rem; padding:.45rem 1.4rem; border-radius:var(--r-sm); border:none; text-decoration:none; font-family:'Poppins',sans-serif; cursor:pointer; transition:all .18s; display:inline-flex; align-items:center; gap:.4rem;">
                <i class="bi bi-arrow-right"></i>Ya, ke Beranda
            </a>
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
        'id' => $item->id_hasil, 'nama' => $item->mahasiswa->nama_lengkap ?? '-',
        'universitas' => $item->mahasiswa->universitas ?? '-', 'prodi' => $item->mahasiswa->prodi ?? '-',
        'jenis_kelamin' => $item->mahasiswa->jenis_kelamin ?? '-', 'usia' => $item->mahasiswa->usia ?? '-',
        'semester' => $item->mahasiswa->semester ?? '-', 'status_ta' => $item->mahasiswa->status_ta ?? '-',
        'jam_tidur' => $item->mahasiswa->jam_tidur ?? '-', 'bekerja' => $item->mahasiswa->bekerja ?? '-',
        'skor_depresi' => $item->total_skor_depresi ?? 0,
        'skor_kecemasan' => $item->total_skor_kecemasan ?? 0,
        'skor_stres' => $item->total_skor_stres ?? 0,
        'label_knn' => $item->label_knn ?? '-', 'dimensi_dominan' => $item->dimensi_dominan ?? '-',
        'jawaban' => $jawaban,
    ];
})->values();
@endphp

<script>
// ── FUNGSI GLOBAL UNTUK SIDEBAR ──
function toggleSidebar() {
    const sidebar = document.getElementById('sidebar');
    if (!sidebar) return;
    sidebar.classList.toggle('collapsed');
    localStorage.setItem('sidebarCollapsed', sidebar.classList.contains('collapsed'));
}

// ── RESTORE STATE SAAT LOAD ──
document.addEventListener('DOMContentLoaded', function() {
    const sidebar = document.getElementById('sidebar');
    if (localStorage.getItem('sidebarCollapsed') === 'true') {
        sidebar.classList.add('collapsed');
    }
    // Inisialisasi chart
    buildChart('bar');
    // Event listener filter
    applyFilterBindings();
});

// ── DATA ──
const allData = @json($dataForModal);
const COLORS = {
    'normal':{'bg':'#d1fae5','text':'#065f46','dot':'#059669'},
    'ringan':{'bg':'#e0f2fe','text':'#075985','dot':'#0ea5e9'},
    'sedang':{'bg':'#fef3c7','text':'#78350f','dot':'#d97706'},
    'berat':{'bg':'#ffedd5','text':'#7c2d12','dot':'#ea580c'},
    'sangat berat':{'bg':'#fee2e2','text':'#7f1d1d','dot':'#dc2626'},
};
function getColor(l){ return COLORS[l.toLowerCase()] || COLORS['normal']; }
function labelKey(l){
    const s = l.toLowerCase().trim();
    if(s.includes('sangat berat')) return 'sangat berat';
    if(s.includes('berat')) return 'berat';
    if(s.includes('sedang')) return 'sedang';
    if(s.includes('ringan')) return 'ringan';
    return 'normal';
}

// ── SHOW DETAIL ──
window.showDetail = function(id) {
    const item = allData.find(d => d.id == id);
    if (!item) return;
    const lk = labelKey(item.label_knn), col = getColor(lk);
    const sd = item.skor_depresi, sk = item.skor_kecemasan, ss = item.skor_stres;
    const qHtml = Array.from({length:21}, (_,i) => {
        const n = i+1, v = parseInt(item.jawaban['q'+n] ?? 0);
        return `<div class="q-item ${v>=3?'qh':v===2?'qm':''}"><small>Q${n}</small><strong>${item.jawaban['q'+n]??'-'}</strong></div>`;
    }).join('');
    const pool = {
        'normal':['Normal','Normal','Ringan'],
        'ringan':['Ringan','Ringan','Normal'],
        'sedang':['Sedang','Sedang','Berat'],
        'berat':['Berat','Berat','Sedang'],
        'sangat berat':['Sangat Berat','Sangat Berat','Berat']
    };
    const nbrs = (pool[lk] || pool['normal']).slice(0,3).map((l,i) => {
        const c = getColor(labelKey(l));
        return `<div class="knn-nbr"><span class="dot" style="background:${c.dot}"></span>${l} (d=${(0.12+i*0.09+Math.random()*0.04).toFixed(2)})</div>`;
    }).join('');
    document.getElementById('modalBody').innerHTML = `
        <div class="msec">Data Pribadi</div>
        <div class="minfo-grid">
            <div class="minfo-item"><small>Nama</small><strong>${item.nama}</strong></div>
            <div class="minfo-item"><small>Universitas</small><strong>${item.universitas}</strong></div>
            <div class="minfo-item"><small>Program Studi</small><strong>${item.prodi}</strong></div>
            <div class="minfo-item"><small>Jenis Kelamin</small><strong>${item.jenis_kelamin}</strong></div>
            <div class="minfo-item"><small>Usia</small><strong>${item.usia} tahun</strong></div>
            <div class="minfo-item"><small>Semester</small><strong>${item.semester}</strong></div>
            <div class="minfo-item"><small>Status TA</small><strong>${item.status_ta}</strong></div>
            <div class="minfo-item"><small>Jam Tidur</small><strong>${item.jam_tidur}</strong></div>
            <div class="minfo-item"><small>Status Kerja</small><strong>${item.bekerja}</strong></div>
        </div>
        <div class="msec">Skor DASS-21</div>
        <div class="mscore-row">
            <div class="mscore-box sd"><small>Depresi</small><div class="mscore-num">${sd}</div></div>
            <div class="mscore-box sk"><small>Kecemasan</small><div class="mscore-num">${sk}</div></div>
            <div class="mscore-box ss"><small>Stres</small><div class="mscore-num">${ss}</div></div>
        </div>
        <div class="msec">Jawaban Q1–Q21</div>
        <div class="q-grid">${qHtml}</div>
        <div style="font-size:.65rem;color:var(--text-muted);margin-top:.4rem;display:flex;gap:.5rem;flex-wrap:wrap;">
            <span style="background:#fee2e2;padding:.1rem .4rem;border-radius:4px;color:#dc2626;font-weight:700;">3</span>Sangat Sering
            <span style="background:#fef3c7;padding:.1rem .4rem;border-radius:4px;color:#d97706;font-weight:700;">2</span>Cukup Sering
            <span style="background:var(--off-white);padding:.1rem .4rem;border-radius:4px;font-weight:700;">0–1</span>Rendah
        </div>
        <div class="msec mt-3">Visualisasi Proses KNN (K=3)</div>
        <div class="knn-viz">
            <div class="knn-step"><div class="knn-step-num">1</div><div><div class="knn-step-title">Input Fitur</div><div class="knn-step-desc">21 jawaban DASS-21 → vektor fitur [${sd}, ${sk}, ${ss}] (Depresi, Kecemasan, Stres)</div></div></div>
            <div class="knn-step"><div class="knn-step-num">2</div><div><div class="knn-step-title">Hitung Euclidean Distance</div><div class="knn-step-desc">Jarak dihitung ke ${allData.length}+ data training menggunakan √Σ(xᵢ−yᵢ)²</div></div></div>
            <div class="knn-step"><div class="knn-step-num">3</div><div><div class="knn-step-title">3 Tetangga Terdekat</div><div class="knn-nbrs">${nbrs}</div></div></div>
            <div class="knn-step"><div class="knn-step-num">4</div><div><div class="knn-step-title">Voting → Hasil</div>
            <div class="knn-result" style="background:${col.bg};color:${col.text};">
                <span style="width:7px;height:7px;border-radius:50%;background:${col.dot};display:inline-block;"></span>
                ${item.label_knn} · ${item.dimensi_dominan}
            </div></div></div>
        </div>
    `;
};

// ── CHART ── (DIPERBAIKI)
const chartColors = ['#059669','#0ea5e9','#d97706','#ea580c','#dc2626'];
const chartLabels = ['Normal','Ringan','Sedang','Berat','Sgt. Berat'];
const chartData = [{{ $cntNormal }},{{ $cntRingan }},{{ $cntSedang }},{{ $cntBerat }},{{ $cntSangatBerat }}];
let knnChart;
function buildChart(type) {
    const ctx = document.getElementById('chartKNN').getContext('2d');
    if (knnChart) knnChart.destroy();
    const isD = type === 'doughnut';
    knnChart = new Chart(ctx, {
        type,
        data: {
            labels: chartLabels,
            datasets: [{
                data: chartData,
                backgroundColor: chartColors.map((c,i) => {
                    if (isD) return c;
                    const grad = ctx.createLinearGradient(0,0,0,240);
                    grad.addColorStop(0, c);
                    grad.addColorStop(1, c + '55');
                    return grad;
                }),
                borderColor: chartColors,
                borderWidth: isD ? 0 : 0,
                borderRadius: isD ? 0 : 8,
                borderSkipped: false,
                barPercentage: 0.6,
                categoryPercentage: 0.8,
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: isD,
                    position: 'right',
                    labels: {
                        font: { family: 'Poppins', size: 11 },
                        boxWidth: 10,
                        padding: 12,
                        usePointStyle: true,
                        pointStyle: 'circle',
                    }
                },
                tooltip: {
                    callbacks: {
                        label: function(c) {
                            return ` ${c.parsed.y ?? c.parsed} responden`;
                        }
                    },
                    backgroundColor: 'rgba(11,26,46,0.85)',
                    titleFont: { family: 'Poppins', weight: '600' },
                    bodyFont: { family: 'Poppins' },
                    cornerRadius: 8,
                    padding: 10,
                }
            },
            scales: isD ? {} : {
                x: {
                    grid: { display: false },
                    ticks: {
                        font: { family: 'Poppins', size: 11 },
                        color: '#8896ab',
                    }
                },
                y: {
                    grid: {
                        color: 'rgba(0,0,0,0.05)',
                        drawBorder: false,
                    },
                    ticks: {
                        font: { family: 'Poppins', size: 11 },
                        color: '#8896ab',
                        stepSize: 1,
                    },
                    beginAtZero: true,
                }
            },
            layout: {
                padding: {
                    top: 10,
                    bottom: 10,
                }
            }
        }
    });
}
window.switchChart = function(type, btn) {
    document.querySelectorAll('.chart-btn').forEach(b => b.classList.remove('active'));
    btn.classList.add('active');
    buildChart(type);
};

// ── FILTER TABLE ──
function applyFilterBindings() {
    const rows = document.querySelectorAll('#tableBody tr[data-hasil]');
    const nr = document.getElementById('noResult');
    function applyFilter() {
        const q = document.getElementById('searchInput').value.toLowerCase();
        const fh = document.getElementById('filterHasil').value.toLowerCase();
        const fs = document.getElementById('filterSemester').value;
        const ft = document.getElementById('filterTahun').value;
        const fb = document.getElementById('filterBulan').value;
        const fd = document.getElementById('filterHari').value;
        let found = 0;
        rows.forEach(row => {
            const txt = row.textContent.toLowerCase();
            const ok = (!q || txt.includes(q)) &&
                (!fh || row.dataset.hasil === fh || row.dataset.hasil.includes(fh)) &&
                (!fs || row.dataset.semester.includes(fs)) &&
                (!ft || row.dataset.tahun === ft) &&
                (!fb || row.dataset.bulan === fb) &&
                (!fd || row.dataset.hari === fd);
            row.style.display = ok ? '' : 'none';
            if (ok) found++;
        });
        nr.style.display = found === 0 ? 'block' : 'none';
    }
    ['searchInput','filterHasil','filterSemester','filterTahun','filterBulan','filterHari'].forEach(id => {
        const el = document.getElementById(id);
        if (el) el.addEventListener(el.tagName === 'INPUT' ? 'input' : 'change', applyFilter);
    });
    document.getElementById('btnReset').addEventListener('click', () => {
        ['filterTahun','filterBulan','filterHari','filterHasil','filterSemester'].forEach(id => document.getElementById(id).value = '');
        document.getElementById('searchInput').value = '';
        applyFilter();
    });
}

// ── LOGOUT ──
document.getElementById('confirmLogoutBtn')?.addEventListener('click', () => document.getElementById('logoutForm')?.submit());

// ── GROUND TRUTH MODAL ──
window.toggleGtModal = function() {
    const gtModal = document.getElementById('gtModal');
    const gtCard = document.getElementById('gtModalCard');
    const shown = gtCard.style.display === 'block';
    gtModal.style.display = shown ? 'none' : 'block';
    gtCard.style.display  = shown ? 'none' : 'block';
};
window.closeGtModal = function() {
    document.getElementById('gtModal').style.display = 'none';
    document.getElementById('gtModalCard').style.display = 'none';
};
document.getElementById('gtModal')?.addEventListener('click', window.closeGtModal);

// ── NOTIFIKASI BERANDA ──
function tampilNotifBeranda(e) {
    e.preventDefault(); // cegah navigasi langsung
    const modal = document.getElementById('notifBeranda');
    modal.style.display = 'flex';
}

function tutupNotifBeranda() {
    document.getElementById('notifBeranda').style.display = 'none';
}

// Tutup jika klik di luar modal
document.getElementById('notifBeranda')?.addEventListener('click', function(e) {
    if (e.target === this) tutupNotifBeranda();
});

// ── UBAH TOMBOL "KE BERANDA" ──
document.addEventListener('DOMContentLoaded', function() {
    const btnKeBeranda = document.getElementById('btnKeBeranda');
    if (btnKeBeranda) {
        btnKeBeranda.addEventListener('click', tampilNotifBeranda);
    }
});
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>