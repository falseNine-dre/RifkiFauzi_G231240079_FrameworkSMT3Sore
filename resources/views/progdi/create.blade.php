<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tambah Data Program Studi</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-4">

    <div class="row mb-3">
        <div class="col-md-8">
            <h2>Tambah Data Program Studi</h2>
        </div>
        <div class="col-md-4 text-right">
            <a class="btn btn-primary" href="{{ route('progdi.index') }}">Back</a>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- SUDAH DIGANTI → menyimpan progdi -->
    <form action="{{ route('progdi.store') }}" method="POST">
        @csrf

        <div class="row">

            <div class="col-md-12">
                <div class="form-group">
                    <label><strong>Nama Fakultas:</strong></label>
                    <input type="text" name="nm_fakultas" class="form-control" placeholder="Masukkan nama fakultas" required>
                    @error('nm_fakultas')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="col-md-12">
                <div class="form-group">
                    <label><strong>Nama Program Studi:</strong></label>
                    <input type="text" name="nm_progdi" class="form-control" placeholder="Masukkan nama program studi" required>
                    @error('nm_progdi')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>

        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>

    </form>

</div>

</body>
</html>
