
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <title>Home</title>
</head>
<style>
    .custom-input {
    padding: 8px 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
    font-size: 14px;
    outline: none;
    margin-left: 40px
}

.custom-input::placeholder {
    color: #999;
}

.custom-input:focus {
    border-color: #007bff; 
}

</style>

<body>
    
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">PDF BAC</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        @guest
                        <li class="nav-item">
                            <a class="nav-link btn btn-primary" href="{{ route('student.create') }}">S'inscrire</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link btn btn-success" href="{{ route('showlogin') }}">Se connecter</a>
                        </li>
                        @endguest
                        @auth
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('logout') }}">Déconnexion</a>
                        </li>
                        {{-- , ['student' => auth()->user()->id] --}}
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('fichier.create') }}">Ajouter fichier</a>
                        </li>

                        @if (auth()->user()->name === "admin" && auth()->user()->email === "admin@gmail.com")
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('indexadmin') }}">Page Admin</a>
                        </li>
                        @endif

                        <li class="nav-item">
                            <a class="nav-link" href="{{route('showw')}}">Mes fichiers</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('showstatistique',['student'=>auth()->user()->id])}}">Statistique</a>
                        </li>
                        @endauth
                        <li class="nav-item">
                            <form action="{{ route('student.index') }}" method="GET" class="form-inline">
                                @csrf
                                <input type="text" name="query" class="custom-input" placeholder="Search" aria-label="Search" value="{{old('query')}}">
                                <button type="submit" class="btn btn-danger">Search</button>
                            </form>
                            
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container">
        
    {{-- <div>@yield('navbar')</div> --}}
    <center><h1>Page Home</h1></center>
    @if (session('message'))
   <div class="container">
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success</strong> {{ session('message') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
   </div>
@endif
        <div class="container">
            @if ($fichier->isEmpty()) 
                <h4>No Results Found.</h4>
            @else
            <div class="row">
                @foreach ($fichier as $el)
                <div class="col-md-6">
                    <div class="card my-3">
                        <div class="card-body bg-light">
                            <h4 class="card-title">Titre: {{$el->titre}}</h4>
                            <h5 class="card-subtitle mb-2 text-muted">Metier: {{$el->metier}}</h5>
                            <h6>Description:</h6>
                            <p class="card-text">{{$el->description}}</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <a href="{{route('download',['id'=>$el->id])}}" class="btn btn-sm btn-primary ml-1"><i class="fa fa-download"></i> Download</a>
                                    {{-- <button class="btn btn-sm btn-success"><i class="fa fa-info-circle"></i> Detail</button> --}}
                                </div>
                                <small class="text-muted">{{ $el->created_at->diffForHumans() }}</small>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div> 
            @endif
           
        </div>
        
  </div>
    <div><center>{{$fichier->links()}}</center></div>
</div>
</body>
</html>
@extends('welcome')