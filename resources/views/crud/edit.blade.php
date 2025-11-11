<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Edit Data</title>
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

    .shell{
      min-height:100vh;
      display:grid;
      place-items:start center;
      padding:48px 16px;
    }

    .card-dark{
      width:min(820px, 94vw);
      background: linear-gradient(180deg, rgba(255,255,255,.06), rgba(255,255,255,.03));
      border-radius: var(--radius);
      border:1px solid rgba(255,255,255,.1);
      box-shadow: 0 18px 60px rgba(0,0,0,.55), inset 0 1px 0 rgba(255,255,255,.05);
      position:relative; overflow:hidden;
    }

    .card-dark::before{
      content:"";
      position:absolute; inset:-2px; border-radius:inherit; pointer-events:none;
      background:
        radial-gradient(700px 160px at 10% -20%, rgba(47,123,255,.35), transparent 60%),
        radial-gradient(600px 200px at 120% 0%, rgba(123,92,255,.35), transparent 60%);
      mask:linear-gradient(#000,#000) content-box, linear-gradient(#000,#000);
      -webkit-mask-composite:xor; mask-composite:exclude;
      padding:1px;
    }

    .card-dark .card-body{padding:28px}
    .title{font-weight:800; margin-bottom:6px}
    .subtitle{color:var(--muted); margin-bottom:22px}

    .form-label{color:var(--muted); font-weight:600}
    .form-control{
      background:rgba(255,255,255,.06);
      border:1px solid rgba(255,255,255,.15);
      color:var(--text);
      height:48px;
      border-radius:14px;
    }
    .form-control:focus{
      background:rgba(255,255,255,.09);
      border-color:rgba(47,123,255,.6);
      box-shadow:0 0 0 .2rem rgba(47,123,255,.18);
      color:var(--text);
    }

    input[type="file"].form-control{
      height:auto;
      padding:.55rem .75rem;
    }

    img.rounded-3{
      border:1px solid rgba(255,255,255,.15);
      background:rgba(255,255,255,.06);
    }

    .btn-glow{
      --bs-btn-bg: linear-gradient(90deg, var(--glow), var(--glow-2));
      --bs-btn-border-color: transparent;
      --bs-btn-hover-bg: linear-gradient(90deg, var(--glow-2), var(--glow));
      --bs-btn-active-bg: linear-gradient(90deg, var(--glow-2), var(--glow));
      border-radius:14px; height:48px; font-weight:700; letter-spacing:.2px;
      box-shadow:0 12px 36px rgba(47,123,255,.35);
      color:#fff;
    }

    .btn-ghost{
      background:rgba(255,255,255,.06);
      border:1px solid rgba(255,255,255,.14);
      color:var(--muted);
      border-radius:14px; height:48px; font-weight:700;
    }

    .btn-ghost:hover{color:#fff; border-color:rgba(255,255,255,.22)}
  </style>
</head>
<body>

<div class="shell">
  <div class="card-dark">
    <div class="card-body">
      <h4 class="title">Edit Data</h4>
      <div class="subtitle">Perbarui informasi sesuai kebutuhan di bawah ini.</div>

      <form action="{{ route('crud.update', $item['id']) }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
          <label class="form-label">Nama</label>
          <input type="text" name="nama" class="form-control" value="{{ $item['nama'] }}" required>
        </div>

        <div class="mb-3">
          <label class="form-label">Keahlian</label>
          <input type="text" name="keahlian" class="form-control" value="{{ $item['keahlian'] }}" required>
        </div>

        <div class="mb-4">
          <label class="form-label">Foto Baru</label>
          <input type="file" name="foto" class="form-control">
          @if($item['foto'])
            <div class="mt-3">
              <img src="{{ asset('uploads/'.$item['foto']) }}" width="120" class="rounded-3 shadow-sm">
            </div>
          @endif
        </div>

        <div class="d-grid d-sm-flex gap-2">
          <button type="submit" class="btn btn-glow px-4">Update</button>
          <a href="{{ route('crud.index') }}" class="btn btn-ghost px-4">Kembali</a>
        </div>
      </form>
    </div>
  </div>
</div>

</body>
</html>
