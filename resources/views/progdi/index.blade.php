<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Hal Program Studi</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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
                    <a class="nav-link active" aria-current="page" href="{{ route('progdi.index') }}">Data Progdi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('pribadi.index') }}">Data Pribadi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('mahasiswa.index') }}">Data Mahasiswa</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- END NAVBAR -->


<div class="container mt-2">

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Halaman Data Program Studi</h2>
            </div>

            <div class="pull-right mb-2">
                <a class="btn btn-success" href="{{ route('progdi.create') }}">Tambah Progdi</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No.</th>
                <th>Nama Fakultas</th>
                <th>Nama Program Studi</th>
                <th width="200px">Action</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($progdi as $p)
                <tr>
                    <td>{{ $p->id_progdi }}</td>
                    <td>{{ $p->nm_fakultas }}</td>
                    <td>{{ $p->nm_progdi }}</td>
                    <td>
                        <form action="{{ route('progdi.destroy', $p->id_progdi) }}" method="POST">
                            <a class="btn btn-primary" href="{{ route('progdi.edit', $p->id_progdi) }}">Edit</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {!! $progdi->links() !!}

</div>
</body>
</html>
