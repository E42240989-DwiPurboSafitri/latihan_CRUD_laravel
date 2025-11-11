<!DOCTYPE html> 
<html lang="id"> 
<head> 
    <meta charset="UTF-8"> 
    <title>Data CRUD</title> 
    <link 
href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" 
rel="stylesheet"> 
</head> 
<body class="bg-light"> 
 
<nav class="navbar navbar-expand-lg navbar-dark bg-primary"> 
    <div class="container-fluid"> 
        <a class="navbar-brand fw-bold" href="{{ route('dashboard') }}">Sistem 
CRUD</a> 
        <div class="collapse navbar-collapse"> 
            <ul class="navbar-nav ms-auto"> 
                <li class="nav-item"><a class="nav-link" href="{{ route('dashboard') 
}}">Dashboard</a></li> 
                <li class="nav-item"><a class="nav-link text-warning fw-bold" href="{{ 
route('logout') }}">Logout</a></li> 
            </ul> 
        </div> 
    </div> 
    </nav> 
 
<div class="container py-5"> 
    <div class="d-flex justify-content-between align-items-center mb-3"> 
        <h3>Data Keahlian</h3> 
        <a href="{{ route('crud.create') }}" class="btn btn-success">+ Tambah Data</a> 
    </div> 
 
    <div class="card shadow border-0 rounded-4"> 
        <div class="card-body"> 
            <table class="table table-striped table-bordered align-middle text-center"> 
                <thead class="table-primary"> 
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
                                <img src="{{ asset('uploads/'.$item['foto']) }}" width="60" 
class="rounded-3"> 
                            @endif 
                        </td> 
                        <td> 
                            <a href="{{ route('crud.edit', $item['id']) }}" class="btn btn-warning 
btn-sm">Edit</a> 
                            <a href="{{ route('crud.delete', $item['id']) }}" class="btn btn-danger 
btn-sm" 
            onclick="return confirm('Yakin ingin menghapus data 
ini?')">Hapus</a> 
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
</body> 
</html> 