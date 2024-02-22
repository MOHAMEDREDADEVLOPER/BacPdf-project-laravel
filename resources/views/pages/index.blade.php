
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
<script>
    function calculateAverage() {
        var noterigionale = parseFloat(document.getElementById('noterigionale').value);
        var notesemestreun = parseFloat(document.getElementById('notesemestreun').value);
        var notesemestredeux = parseFloat(document.getElementById('notesemestredeux').value);
        var notenationale = parseFloat(document.getElementById('notenationale').value);

        var average = (noterigionale *2 + notesemestreun + notesemestredeux + notenationale*4 ) / 8;
        var mention = '';

        if (average >= 16) {
            mention = 'Très bien';
        } else if (average >= 14) {
            mention = 'Bien';
        } else if (average >= 12) {
            mention = 'Assez bien';
        } else if(average >= 10) {
            mention = 'Mention passable';
        }else{
            mention = 'Mauvaise';
        }

        var resultDiv = document.getElementById('result');
        resultDiv.innerHTML = `
        <div class="container">
            <div class="row">
                <div class="col">
                    <h4 class="text-warning">La moyenne générale est :</h4>
                    <h5>${average.toFixed(2)}</h5>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <h3 class="text-warning">Mention :</h3>
                    <h4>${mention}</h4>
                </div>
            </div>
        </div>
    `;
    }
</script>

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
                        <li class="nav-item">
                            <a class="nav-link" 
                            href="#" 
                            data-bs-toggle="modal"
                             data-bs-target="#staticBackdrop">Calcule Moyenne</a>
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
            
            <!-- Button trigger modal -->
  
  <!-- Modal -->
  <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="staticBackdropLabel">Calcule Moyenne De Bac :</h1>            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
        <div class="modal-body">
            
            <form method="POST" action="" id="gradeForm" class="container mt-5">
                @csrf
                <div class="form-group">
                    <label for="noterigionale">La Note de Régionale :</label>
                    <input type="text" class="form-control" id="noterigionale" name="noterigionale" placeholder="note d jihawi">
                    @error('noterigionale')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="notesemestreun">La Note de Semestre Un :</label>
                    <input type="text" class="form-control" id="notesemestreun" name="notesemestreun" placeholder="no9ta d dawra lwla d bac">
                </div>
                @error('notesemestreun')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
                <div class="form-group">
                    <label for="notesemestredeux">La Note de Semestre Deux</label>
                    <input type="text" class="form-control" id="notesemestredeux" name="notesemestredeux" placeholder="no9ta d dawra tanya ">
                </div>
                @error('notesemestredeux')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
                <div class="form-group">
                    <label for="notenationale">La Note de Nationale :</label>
                    <input type="text" class="form-control" id="notenationale" name="notenationale" placeholder="no9ta d watani" >
                </div><br>
                @error('notenationale')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
                <button type="button" onclick="calculateAverage()" class="btn btn-primary">Calculer la moyenne</button>            </form>
            <div id="result" class="container mt-3"></div>

            
            {{-- <p>La moyenne générale est : {{ $overallAverage }}</p>
            <p>Mention : {{ $mention }}</p> --}}
                       
        </div>
        <div class="modal-footer">
          {{-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Understood</button> --}}
        </div>
      </div>
    </div>
  </div>
        
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
                                    <a href="{{route('download',['id'=>$el->id])}}" class="btn btn-sm btn-primary m-2"><i class="fa fa-download"></i> Download</a>
                                    {{-- @if (auth()->user()->id === 2 )
                                        <form action="{{ route('deleteadmin', ['fichier'=>$el->id]) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger m-2"><i class="fa fa-trash"></i> Supprimer</button>
                                        </form>
                                    @endif --}}
                                    {{-- <button class="btn btn-sm btn-success m-2"><i class="fa fa-info-circle"></i> Detail</button> --}}
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