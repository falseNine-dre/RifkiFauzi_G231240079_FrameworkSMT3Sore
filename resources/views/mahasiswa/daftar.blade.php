<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Data Pribadi Mahasiswa</title>
    <link rel="stylesheet"
          href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-2">

    <!-- Navbar -->
    <nav class="navbar navbar-expand navbar-dark bg-dark" aria-label="Second navbar example">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">.: SIMA :.</a>
            <div class="collapse navbar-collapse" id="navbarsExample02">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item"><a class="nav-link" href="/">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('progdi.index') }}">Data Progdi</a></li>
                    <li class="nav-item"><a class="nav-link" aria-current="page" href="{{ route('pribadi.index') }}">Data Pribadi</a></li>
                    <li class="nav-item"><a class="nav-link active" href="{{ route('mahasiswa.index') }}">Data Mahasiswa</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Judul -->
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Daftar Ulang Mahasiswa Baru</h2>
            </div>
        </div>
    </div>

    <!-- Flash Message -->
    @if(session('status'))
        <div class="alert alert-success mb-1 mt-1">
            {{ session('status') }}
        </div>
    @endif

    <!-- Form Daftar Ulang -->
    <form action="{{ route('mahasiswa.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="row">
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>Program Studi</strong>
                    <select name="id_progdi" class="custom-select mr-sm-2" required>
                        <option value="">-- Pilih Program Studi --</option>
                        @foreach($progdi as $pro)
                            <option value="{{ $pro->id_progdi }}">{{ $pro->nm_progdi }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>NIM</strong>
                    <input type="text" name="nim" class="form-control" placeholder="Nomor Induk Mahasiswa" required>
                </div>
            </div>
        </div>

        <!-- Data Pribadi Mahasiswa -->
        <input type="hidden" name="id" value="{{ $pribadi->id }}">

        <div class="row">
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>NIK:</strong>
                    <input type="text" name="nik" value="{{ $pribadi->nik }}" class="form-control" disabled>
                </div>
            </div>

            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>Nama Mahasiswa:</strong>
                    <input type="text" name="nama_mahasiswa" value="{{ $pribadi->nama_mahasiswa }}" class="form-control" disabled>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>Tempat Lahir:</strong>
                    <input type="text" name="tempat_lahir" value="{{ $pribadi->tempat_lahir }}" class="form-control" disabled>
                </div>
            </div>

            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>Tanggal Lahir:</strong>
                    <input type="date" name="tanggal_lahir" value="{{ $pribadi->tanggal_lahir }}" class="form-control" disabled>
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-primary ml-3">Daftar</button>
    </form>

</div>
</body>
</html>
