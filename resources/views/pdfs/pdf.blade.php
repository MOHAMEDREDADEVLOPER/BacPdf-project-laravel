<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Statistique</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.5;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            padding: 8px;
            border: 1px solid #ddd;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .text-center {
            text-align: center;
        }
        .mb-4 {
            margin-bottom: 20px;
        }
        .table-primary th {
            background-color: #007bff;
            color: #fff;
        }
        .table-info th {
            background-color: #17a2b8;
            color: #fff;
        }
        .table-info td {
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="text-center mb-4">Statistique</h1>
        <table border="1" width="80%">
            <thead class="table-primary">
                <tr>
                    <th>Student Name</th>
                    <th>File Title</th>
                    <th>Download Count</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($fichiers as $fichier)
                <tr>
                    <td>{{ $student->name }}</td>
                    <td>{{ $fichier->titre }}</td>
                    <td>{{ $fichier->download_count }}</td>
                </tr>
                @endforeach
            </tbody>
            <tfoot class="table-info">
                <tr>
                    <th>Total</th>
                    <td colspan="2">{{ $totalDownloads }}</td>
                </tr>
                <tr>
                    <th>Average per file</th>
                    <td colspan="2">{{ $averageDownloads }}</td>
                </tr>
                <tr>
                    <th>Most downloaded file</th>
                    <td colspan="2">{{ $mostDownloadedFile ? $mostDownloadedFile->titre : 'N/A' }}</td>
                </tr>
            </tfoot>
        </table>
    </div>
</body>
</html>
