<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Data CRUD</title>
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    :root{
      --bg1:#06142e;
      --bg2:#0b1c3a;
      --glow:#2f7bff;
      --glow-2:#7b5cff;
      --text:#e8edff;
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
    .navbar-brand{color:#fff!important; font-weight:800; text-shadow:0 0 12px rgba(47,123,255,.7)}
    .navbar .nav-link{color:#e0e6ff!important; margin:0 6px}
    .navbar .nav-link:hover{color:#fff!important; text-shadow:0 0 6px rgba(123,92,255,.7)}
    .navbar .nav-link.text-warning{color:#ffd66b!important; text-shadow:0 0 10px rgba(255,214,107,.7)}

    /* Header row */
    .page-head{
      display:flex; justify-content:space-between; align-items:center;
      margin:42px auto 18px; width:min(1200px, 94vw);
    }
    .page-head h3{margin:0; font-weight:800; text-shadow:0 0 10px rgba(47,123,255,.35)}

    /* Button styles */
    .btn-glow{
      --bs-btn-bg: linear-gradient(90deg, var(--glow), var(--glow-2));
      --bs-btn-border-color: transparent;
      --bs-btn-hover-bg: linear-gradient(90deg, var(--glow-2), var(--glow));
      --bs-btn-active-bg: linear-gradient(90deg, var(--glow-2), var(--glow));
      border-radius:14px; font-weight:700; letter-spacing:.2px;
      box-shadow:0 10px 28px rgba(47,123,255,.35); color:#fff;
    }
    .btn-amber{
      background:linear-gradient(90deg,#ffb84d,#ff7b3a);
      border:none; color:#1a0f00; font-weight:700; border-radius:10px;
      box-shadow:0 8px 20px rgba(255,153,51,.35);
    }
    .btn-amber:hover{filter:brightness(1.05)}
    .btn-red{
      background:linear-gradient(90deg,#ff6b6b,#ff3b6b);
      border:none; color:#fff; font-weight:700; border-radius:10px;
      box-shadow:0 8px 20px rgba(255,59,107,.35);
    }

    /* Card & table */
    .wrap{
      width:min(1200px, 94vw); margin:0 auto 60px;
    }
    .card-dark{
      background: linear-gradient(180deg, rgba(255,255,255,.06), rgba(255,255,255,.03));
      border-radius: var(--radius);
      border:1px solid rgba(255,255,255,.1);
      box-shadow: 0 16px 50px rgba(0,0,0,.55), inset 0 1px 0 rgba(255,255,255,.05);
      overflow:hidden; position:relative;
    }
    .card-dark::before{
      content:""; position:absolute; inset:-2px; border-radius:inherit; pointer-events:none;
      background:
        radial-gradient(700px 160px at 10% -20%, rgba(47,123,255,.35), transparent 60%),
        radial-gradient(600px 200px at 120% 0%, rgba(123,92,255,.35), transparent 60%);
      mask:linear-gradient(#000,#000) content-box, linear-gradient(#000,#000);
      -webkit-mask-composite:xor; mask-composite:exclude;
      padding:1px;
    }

    .table{
      margin:0; color:var(--text);
      --bs-table-bg: transparent;
      --bs-table-color: var(--text);
      --bs-table-border-color: rgba(255,255,255,.12);
    }
    .table thead th{
      background:linear-gradient(180deg, rgba(47,123,255,.25), rgba(47,123,255,.12));
      color:#f4f7ff; border-bottom:1px solid rgba(255,255,255,.2);
      font-weight:800;
    }
    .table tbody tr{
      background:rgba(255,255,255,.02);
    }
    .table tbody tr:nth-child(2n){
      background:rgba(255,255,255,.035);
    }
    .table tbody td{vertical-align:middle}
    .text-muted{color:var(--muted)!important}
    img.rounded-3{border:1px solid rgba(255,255,255,.15)}
  </style>
</head>
<body>

<nav class="navbar navbar-expand-lg">
  <div class="container-fluid">
    <a class="navbar-brand fw-bold" href="{{ route('dashboard') }}">Sistem CRUD</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#nav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div id="nav" class="collapse navbar-collapse">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item"><a class="nav-link" href="{{ route('dashboard') }}">Dashboard</a></li>
        <li class="nav-item"><a class="nav-link text-warning fw-bold" href="{{ route('logout') }}">Logout</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="page-head">
  <h3>Data Keahlian</h3>
  <a href="{{ route('crud.create') }}" class="btn btn-glow">+ Tambah Data</a>
</div>

<div class="wrap">
  <div class="card-dark">
    <div class="card-body">
      <table class="table table-bordered align-middle text-center">
        <thead>
          <tr>
            <th>ID</th><th>Nama</th><th>Keahlian</th><th>Foto</th><th>Aksi</th>
          </tr>
        </thead>
        <tbody>
        @forelse ($data as $item)
          <tr>
            <td>{{ $item['id'] }}</td>
            <td>{{ $item['nama'] }}</td>
            <td>{{ $item['keahlian'] }}</td>
            <td>
              @if($item['foto'])
                <img src="{{ asset('uploads/'.$item['foto']) }}" width="60" class="rounded-3">
              @endif
            </td>
            <td class="d-grid gap-1 d-sm-flex justify-content-center">
              <a href="{{ route('crud.edit', $item['id']) }}" class="btn btn-amber btn-sm px-3">Edit</a>
              <a href="{{ route('crud.delete', $item['id']) }}" class="btn btn-red btn-sm px-3"
                 onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
            </td>
          </tr>
        @empty
          <tr><td colspan="5" class="text-muted">Belum ada data.</td></tr>
        @endforelse
        </tbody>
      </table>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
