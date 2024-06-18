<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Table with Bootstrap and jQuery</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
    @include('navbar-admin')

    <div class="container mt-5">
        <table class="table table-striped table-hover">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Sesi Kelas</th>
                    <th scope="col">Pukul</th>
                    <th scope="col">Hari Kelas</th>
                    <th scope="col">Kelas</th>
                    <th scope="col">Harga</th>
                </tr>
            </thead>
            <tbody>
                @foreach($detailkelas as $data)
                <tr>
                    <td>{{ $data->waktuKelas->sesiKelas->nama }}</td>
                    <td>{{ $data->waktuKelas->sesiKelas->pukul }}</td>
                    <td>{{ $data->waktuKelas->hariKelas->hari }}</td>
                    <td>{{ $data->kelas->nama }}</td>
                    <td>{{ $data->kelas->harga }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
