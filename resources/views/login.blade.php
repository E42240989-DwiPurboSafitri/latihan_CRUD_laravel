<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Login | Sistem CRUD</title>
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    :root{
      --bg1:#06142e;
      --bg2:#0b1c3a;
      --glow:#2f7bff;
      --glow-2:#7b5cff;
      --card:#0e1630;
      --text:#e8edff;
      --muted:#9fb2ffb3;
      --danger:#ff6b6b;
      --radius:22px;
    }
    *{box-sizing:border-box}
    html,body{height:100%}
    body{
      margin:0;
      color:var(--text);
      background: radial-gradient(1200px 800px at 20% 10%, #0b1d42 0%, #0a1633 35%, #081129 60%, #060d20 100%),
                  linear-gradient(120deg, var(--bg1), var(--bg2));
      background-attachment: fixed;
      font-synthesis-weight:none;
    }

    .shell{
      min-height:100vh;
      display:grid;
      place-items:center;
      padding:24px;
    }

    .login-card{
      width:min(520px, 92vw);
      background: linear-gradient(180deg, rgba(255,255,255,.04), rgba(255,255,255,.02)) ;
      border-radius: var(--radius);
      padding: 28px 28px 22px;
      border: 1px solid rgba(255,255,255,.08);
      box-shadow:
        0 10px 40px rgba(0,0,0,.55),
        inset 0 1px 0 rgba(255,255,255,.05);
      position:relative;
      overflow:hidden;
    }

    .login-card::before{
      content:"";
      position:absolute; inset: -2px;
      border-radius:inherit;
      pointer-events:none;
      background:
        radial-gradient(600px 140px at 20% -10%, rgba(47,123,255,.35), transparent 60%),
        radial-gradient(500px 160px at 110% 0%, rgba(123,92,255,.35), transparent 60%);
      mask:linear-gradient(#000,#000) content-box, linear-gradient(#000,#000);
      -webkit-mask-composite: xor; mask-composite: exclude;
      padding:1px;
    }

    .brand-eyebrow{
      letter-spacing:.12em;
      text-transform:uppercase;
      font-size:.78rem;
      color:var(--muted);
      text-align:center;
      margin-bottom:6px;
    }
    .title{
      text-align:center;
      font-weight:800;
      font-size:2rem;
      margin-bottom:4px;
    }
    .subtitle{
      text-align:center;
      color:var(--muted);
      margin-bottom:18px;
      font-size:.95rem;
    }

    /* Fake progress bar for the vibe */
    .progress-wrap{
      background:rgba(255,255,255,.06);
      border:1px solid rgba(255,255,255,.08);
      border-radius:999px;
      height:14px;
      display:flex;
      align-items:center;
      padding:2px;
      margin:14px 0 8px;
    }
    .progress-fill{
      height:100%;
      width:55%;
      border-radius:999px;
      background: linear-gradient(90deg, var(--glow), var(--glow-2));
      box-shadow: 0 0 20px rgba(47,123,255,.55), 0 0 28px rgba(123,92,255,.35);
    }
    .progress-meta{
      display:flex; justify-content:space-between; color:var(--muted); font-size:.85rem;
      margin-bottom:18px;
    }

    /* Form */
    .form-label{color:var(--muted); font-weight:600}
    .form-control{
      background:rgba(255,255,255,.06);
      border:1px solid rgba(255,255,255,.12);
      color:var(--text);
      height:48px;
      border-radius:14px;
      outline:none !important;
    }
    .form-control:focus{
      background:rgba(255,255,255,.08);
      border-color:rgba(47,123,255,.6);
      box-shadow: 0 0 0 .2rem rgba(47,123,255,.15);
      color:var(--text);
    }

    .btn-primary{
      --bs-btn-bg: linear-gradient(90deg, var(--glow), var(--glow-2));
      --bs-btn-border-color: transparent;
      --bs-btn-hover-bg: linear-gradient(90deg, var(--glow-2), var(--glow));
      --bs-btn-active-bg: linear-gradient(90deg, var(--glow-2), var(--glow));
      border-radius: 18px;
      height:52px;
      font-weight:700;
      letter-spacing:.2px;
      box-shadow: 0 12px 35px rgba(47,123,255,.35);
    }
    .btn-primary:focus{
      box-shadow: 0 0 0 .25rem rgba(47,123,255,.25);
    }

    .alert-danger{
      border-radius:14px;
      background: rgba(255, 77, 77, .12);
      color:#ffd7d7;
      border:1px solid rgba(255, 107, 107, .35);
    }

    .footer{
      color:var(--muted);
      text-align:center;
      margin-top:18px;
      font-size:.9rem;
    }

    /* nice corner stroke like the mock */
    .rounded-outline{
      position:absolute; inset:0;
      border-radius:var(--radius);
      pointer-events:none;
      border:1px solid rgba(123,92,255,.22);
      mix-blend:screen;
    }

    @media (max-width:420px){
      .title{font-size:1.7rem}
    }
  </style>
</head>
<body>

  <div class="shell">
    <div class="login-card">
      <div class="rounded-outline"></div>

      <div class="brand-eyebrow">Sistem CRUD Laravel</div>
      <h1 class="title">Login Admin</h1>
      <div class="subtitle">Masuk untuk melanjutkan.</div>

      <!-- vibe-only progress like the reference -->
      <div class="progress-wrap"><div class="progress-fill"></div></div>
      <div class="progress-meta">
      </div>

      @if(session('error'))
        <div class="alert alert-danger text-center py-2 mb-3">
          {{ session('error') }}
        </div>
      @endif

      <!-- FORM: isi & nama field TETAP -->
      <form action="{{ route('login.post') }}" method="POST">
        @csrf
        <div class="mb-3">
          <label class="form-label">Username</label>
          <input type="text" name="username" class="form-control" required>
        </div>

        <div class="mb-3">
          <label class="form-label">Password</label>
          <input type="password" name="password" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary w-100">Login</button>
      </form>
    </div>

    <div class="footer">© {{ date('Y') }} Sistem CRUD Laravel</div>
  </div>

</body>
</html>
