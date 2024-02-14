<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Statistique</title>
    <style>
        body {
            background-color: #f8f9fa;
            color: #333;
        }
        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: #007bff;
        }
        .table {
            background-color: #fff;
        }
        .table th, .table td {
            border: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <a href="{{ route('student.index') }}" class="btn btn-link">
            <i class="fa fa-home fa-2x"></i> 
        </a>              
        <h1 class="text-center ">Statistique</h1>
        <table class="table table-bordered table-hover">
            <thead class="table-primary">
                <tr>
                    <th>Titre</th>
                    <th>Nombre de téléchargements</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($fichiers as $fichier)
                <tr>
                    <td>{{ $fichier->titre }}</td>
                    <td>{{ $fichier->download_count }}</td>
                </tr>
                @endforeach
            </tbody>
            <tfoot class="table-info">
                <tr>
                    <th>Total</th>
                    <td>{{ $totalDownloads }}</td>
                </tr>
                <tr>
                    <th>Moyenne par fichier</th>
                    <td>{{ $averageDownloads }}</td>
                </tr>
                <tr>
                    <th>Fichier le plus téléchargé</th>
                    <td>{{ $mostDownloadedFile ? $mostDownloadedFile->titre : 'N/A' }}</td>
                </tr>
                <tr>
                    <th> Télécharger Statistique</th>
                    <td><a href="{{route('statistique')}}" class="btn btn-primary">Download</a></td>
                </tr>
            </tfoot>
        </table>
    </div>
</body>
</html>
