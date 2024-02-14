<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <title>Edit Fichier</title>
</head>
<body>
   <center><h1>Welcome To Edit Page</h1></center> 
   <div class="container">
    <form action="{{route('fichier.update',['fichier'=>$fichier->id])}}" method="POST" enctype="multipart/form-data">
        @csrf 
        @method('PUT')
        <div class="form-group">
            <label for="titre">Titre</label>
            <input type="text" class="form-control" id="titre" name="titre" value="{{old('titre',$fichier->titre)}}">
            @error('titre')
                <p class="text-danger">{{$message}}</p>
            @enderror
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <input type="text" class="form-control" id="description" name="description" value="{{old('description',$fichier->description)}}">
            @error('description')
                <p class="text-danger">{{$message}}</p>
            @enderror
        </div>
        <div class="form-group">
            <label for="metier">Metier</label>
            <select class="form-control" id="metier" name="metier">
                <option value="math" {{ $fichier->metier == 'math' ? 'selected' : '' }}>Math</option>
                <option value="physique" {{ $fichier->metier == 'physique' ? 'selected' : '' }}>Physique</option>
                <option value="chimique" {{ $fichier->metier == 'chimique' ? 'selected' : '' }}>Chimique</option>
                <option value="svt" {{ $fichier->metier == 'svt' ? 'selected' : '' }}>SVT</option>
                <option value="islamic" {{ $fichier->metier == 'islamic' ? 'selected' : '' }}>Islamic</option>
                <option value="arabic" {{ $fichier->metier == 'arabic' ? 'selected' : '' }}>Arabic</option>
                <option value="french" {{ $fichier->metier == 'french' ? 'selected' : '' }}>French</option>
                <option value="english" {{ $fichier->metier == 'english' ? 'selected' : '' }}>English</option>
                <option value="other" {{ $fichier->metier == 'other' ? 'selected' : '' }}>Other</option>
            </select>
            <br>
            @error('metier')
                <p class="text-danger">{{$message}}</p>
            @enderror
        </div>
        <div class="form-group">
            <label for="pdf">PDF</label>
            <input type="file" class="form-control-file" id="pdf" name="pdf"><br>
            @error('pdf')
                <p class="text-danger">{{$message}}</p>
            @enderror
        </div><br>
        <button type="submit" class="btn btn-primary"><i class="fa fa-pencil"></i> Edit File</button>
    </form>
</div>
</body>
</html>