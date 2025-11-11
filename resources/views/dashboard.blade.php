<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Dashboard | Sistem CRUD</title>
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    :root{
      --bg1:#06142e;
      --bg2:#0b1c3a;
      --glow:#2f7bff;
      --glow-2:#7b5cff;
      --text:#f4f7ff;
      --muted:#a7baff;
      --radius:22px;
    }
    html,body{height:100%}
    body{
      margin:0;
      color:var(--text);
      background: radial-gradient(1200px 800px at 20% 10%, #0b1d42 0%, #0a1633 35%, #081129 60%, #060d20 100%),
                  linear-gradient(120deg, var(--bg1), var(--bg2));
      background-attachment: fixed;
    }

    /* Navbar */
    .navbar{
      background: linear-gradient(90deg, #152768 0%, #3a5dff 50%, #7b5cff 100%);
      box-shadow: 0 5px 20px rgba(0,0,0,.4);
      border-bottom: 1px solid rgba(255,255,255,.08);
    }
    .navbar-brand{
      color:#fff!important;
      font-weight:800;
      text-shadow:0 0 12px rgba(47,123,255,.7);
    }
    .navbar-nav .nav-link{
      color:#e0e6ff!important;
      margin:0 6px;
      transition:all .25s ease;
    }
    .navbar-nav .nav-link:hover{
      color:#fff!important;
      text-shadow:0 0 6px rgba(123,92,255,.7);
    }
    .navbar-nav .nav-link.text-warning{
      color:#ffd66b!important;
      text-shadow:0 0 10px rgba(255,214,107,.7);
    }

    /* Wrapper */
    .wrapper{
      min-height:calc(100vh - 70px);
      display:grid;
      place-items:start center;
      padding:60px 16px;
    }

    /* Card */
    .dash-card{
      width:min(1000px, 92vw);
      background: linear-gradient(180deg, rgba(255,255,255,.06), rgba(255,255,255,.03));
      border-radius: var(--radius);
      padding: 40px 28px;
      border: 1px solid rgba(255,255,255,.1);
      box-shadow: 0 16px 50px rgba(0,0,0,.55), inset 0 1px 0 rgba(255,255,255,.05);
      position:relative; overflow:hidden;
      text-align:center;
    }
    .dash-card::before{
      content:"";
      position:absolute; inset:-2px; border-radius:inherit; pointer-events:none;
      background:
        radial-gradient(700px 160px at 10% -20%, rgba(47,123,255,.35), transparent 60%),
        radial-gradient(600px 200px at 120% 0%, rgba(123,92,255,.35), transparent 60%);
      mask:linear-gradient(#000,#000) content-box, linear-gradient(#000,#000);
      -webkit-mask-composite:xor; mask-composite:exclude;
      padding:1px;
    }

    h2{
      font-weight:800;
      color:#fff;
      text-shadow:0 0 10px rgba(47,123,255,.5);
      margin-bottom:10px;
    }

    p.text-muted{
      color:var(--muted)!important;
      margin-bottom:28px;
      font-size:1.05rem;
    }

    .badge-soft{
      background:rgba(255,255,255,.1);
      border:1px solid rgba(255,255,255,.15);
      color:var(--muted);
      padding:.45rem .75rem;
      border-radius:999px;
      font-weight:600;
      font-size:.85rem;
      margin-bottom:16px;
      display:inline-block;
    }

    .btn-glow{
      --bs-btn-bg: linear-gradient(90deg, var(--glow), var(--glow-2));
      --bs-btn-border-color: transparent;
      --bs-btn-hover-bg: linear-gradient(90deg, var(--glow-2), var(--glow));
      --bs-btn-active-bg: linear-gradient(90deg, var(--glow-2), var(--glow));
      border-radius: 14px;
      height:52px;
      font-weight:700;
      letter-spacing:.2px;
      box-shadow: 0 10px 30px rgba(47,123,255,.4);
      color:#fff;
    }

    .btn-glow:hover{
      box-shadow: 0 0 25px rgba(123,92,255,.7);
    }

  </style>
</head>
<body>

<nav class="navbar navbar-expand-lg">
  <div class="container-fluid">
    <a class="navbar-brand" href="{{ route('dashboard') }}">Sistem CRUD</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#nav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div id="nav" class="collapse navbar-collapse">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item"><a class="nav-link" href="{{ route('dashboard') }}">Beranda</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('crud.index') }}">Data CRUD</a></li>
        <li class="nav-item"><a class="nav-link text-warning fw-bold" href="{{ route('logout') }}">Logout</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="wrapper">
  <div class="dash-card">
    <span class="badge-soft">Dashboard</span>
    <h2>Selamat Datang, {{ session('user') }}</h2>
    <p class="text-muted">Anda berhasil login ke sistem CRUD sederhana berbasis Laravel tanpa database.</p>
    <a href="{{ route('crud.index') }}" class="btn btn-glow w-100">Masuk ke Halaman CRUD</a>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
