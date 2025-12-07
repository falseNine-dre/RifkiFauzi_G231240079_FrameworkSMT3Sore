<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Hal Data Pribadi Mahasiswa</title>

    <!-- Bootstrap -->
    <link rel="stylesheet"
          href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
    <div class="container mt-2">

        <!-- Navigation -->
        <nav class="navbar navbar-expand navbar-dark bg-dark" aria-label="Second navbar example">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">.: SIMA :.</a>

                <div class="collapse navbar-collapse" id="navbarsExample02">
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link active" href="{{ route('home.index') }}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('progdi.index') }}">Data Progdi</a>
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

        <!-- Title -->
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Data Mahasiswa Universitas Semarang</h2>
                </div>
            </div>
        </div>

        <!-- Chart -->
        <div style="width: 80%; margin: auto;">
            <canvas id="barChart"></canvas>
        </div>

        <script>
            const ctx = document.getElementById('barChart').getContext('2d');

            const myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: @json($data['labels']),
                    datasets: [{
                        label: 'Jenis Data',
                        data: @json($data['data']),
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: { beginAtZero: true }
                    }
                }
            });
        </script>

    </div>
</body>
</html>
