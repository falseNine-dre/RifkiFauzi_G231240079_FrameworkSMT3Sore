<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Halaman Data Pribadi Mahasiswa</title>
    <link rel="stylesheet"
        href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand navbar-dark bg-dark" aria-label="Second navbar example">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">.: SIMA :.</a>
        <div class="collapse navbar-collapse" id="navbarsExample02">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home.index') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('progdi.index') }}">Data Progdi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('pribadi.index') }}">Data Pribadi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('mahasiswa.index') }}">Data Mahasiswa</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- END NAVBAR -->

<div class="container mt-4">

    <div class="row mb-3">
        <div class="col-lg-12 d-flex justify-content-between align-items-center">
            <h2>Halaman Data Pribadi Mahasiswa</h2>
            <a class="btn btn-success" href="{{ route('pribadi.create') }}">+ Add Data</a>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p class="mb-0">{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered table-striped">
        <thead class="thead-dark text-center">
            <tr>
                <th>No.</th>
                <th>NIK</th>
                <th>Nama Mahasiswa</th>
                <th>Tempat / Tanggal Lahir</th>
                <th width="180px">Action</th>
            </tr>
        </thead>

        <tbody>
        @foreach ($pribadi as $pr)
            <tr class="text-center">
                <td>{{ $pr->id }}</td>
                <td>{{ $pr->nik }}</td>
                <td>{{ $pr->nama_mahasiswa }}</td>
                <td>{{ $pr->tempat_lahir }} / {{ $pr->tanggal_lahir }}</td>
                <td>
                    <form action="{{ route('pribadi.destroy', $pr->id) }}" method="POST">
                        <a class="btn btn-primary btn-sm" href="{{ route('pribadi.edit', $pr->id) }}">Edit</a>

                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger btn-sm"
                                onclick="return confirm('Yakin ingin menghapus data ini?')">
                            Delete
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <!-- Pagination -->
    {!! $pribadi->links() !!}

</div>

</body>
</html>
