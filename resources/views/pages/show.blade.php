<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>mes fichier</title>
    <style>
        .margin{
            margin-left: 20px;
            margin-right: 20px;
        }
    </style>
</head>
<body>
    <a href="{{route('student.index')}}">back to home</a>
    <center><h1>Show Mes Fichier</h1></center>
    @if (session('message'))
   <div class="container">
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success</strong> {{ session('message') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
   </div>
@endif
@isset($folder)
<div class="margin">
    <div class="table-responsive-lg">
        <table class="table table-light">
            <thead>
                <tr>
                    <th scope="col">Titre</th>
                    {{-- <th scope="col">Description</th> --}}
                    <th scope="col">Metier</th>
                    <th scope="col">Pdf</th>
                    <th scope="col">Modifier</th>
                    <th scope="col">Supprimer</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($folder as $item)
                <tr class="">
                    <td scope="row">{{$item->titre }}</td>
                    {{-- {{ \Illuminate\Support\Str::limit($item->description, 20)/ }} --}}
                    {{-- <td>{{ $item->description }}</td> --}}
                    <td>{{ $item->metier }}</td>
                    <td>
                        <a href="{{ route('download',['id' => $item->id]) }}" class="btn btn-primary">
                            <i class="fa fa-download"></i> Download
                        </a>
                    </td>
                    <td>
                        <a href="{{route('fichier.edit',['fichier'=>$item->id])}}" class="btn btn-warning">
                            <i class="fa fa-pencil"></i> Modifier
                        </a>
                    </td>
                    <td>
                        <form action="{{ route('fichier.destroy', ['fichier'=>$item->id]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                                <button class="btn btn-danger"><i class="fa fa-trash"></i> Supprimer</button>
                        </form>
                    </td>
                    
                </tr> 
                @endforeach
            </tbody>
        </table>
    </div>
</div>   
@else  
<h3>ne pas des fichier en cour</h3>
@endisset

</body>
</html>
