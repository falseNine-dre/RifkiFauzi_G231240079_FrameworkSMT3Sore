<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Data Pribadi Mahasiswa</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-4">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Edit Data Pribadi Mahasiswa</h2>
        <a class="btn btn-primary" href="{{ route('pribadi.index') }}">Back</a>
    </div>

    @if (session('status'))
        <div class="alert alert-success">{{ session('status') }}</div>
    @endif

    <form action="{{ route('pribadi.update', $pribadi->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row">

            <div class="col-md-6 mb-3">
                <label><strong>NIK:</strong></label>
                <input type="text" name="nik" value="{{ $pribadi->nik }}" class="form-control" placeholder="Masukkan NIK">

                @error('nik')
                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-6 mb-3">
                <label><strong>Nama Mahasiswa:</strong></label>
                <input type="text" name="nama_mahasiswa" value="{{ $pribadi->nama_mahasiswa }}" class="form-control" placeholder="Masukkan Nama Mahasiswa">

                @error('nama_mahasiswa')
                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                @enderror
            </div>

        </div>

        <div class="row">

            <div class="col-md-6 mb-3">
                <label><strong>Tempat Lahir:</strong></label>
                <input type="text" name="tempat_lahir" value="{{ $pribadi->tempat_lahir }}" class="form-control" placeholder="Masukkan Tempat Lahir">

                @error('tempat_lahir')
                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-6 mb-3">
                <label><strong>Tanggal Lahir:</strong></label>
                <input type="date" name="tanggal_lahir" value="{{ $pribadi->tanggal_lahir }}" class="form-control">

                @error('tanggal_lahir')
                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                @enderror
            </div>

        </div>

        <button type="submit" class="btn btn-success px-4">Update</button>
    </form>

</div>
</body>
</html>
