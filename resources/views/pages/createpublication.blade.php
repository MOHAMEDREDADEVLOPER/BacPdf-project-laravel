<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Publication</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1>Create Publication</h1>
        <form action="{{route('fichier.store')}}" method="POST" enctype="multipart/form-data">
            @csrf 
            <div class="form-group">
                <label for="titre">Titre</label>
                <input type="text" class="form-control" id="titre" name="titre" value="{{old('titre')}}">
                @error('titre')
                    <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <input type="text" class="form-control" id="description" name="description" value="{{old('description')}}">
                @error('description')
                    <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <div class="form-group">
                <label for="metier">Metier</label>
                <select class="form-control" id="metier" name="metier">
                    <option value="math">Math</option>
                    <option value="physique">Physique</option>
                    <option value="chimique">Chimique</option>
                    <option value="svt">SVT</option>
                    <option value="islamic">Islamic</option>
                    <option value="arabic">Arabic</option>
                    <option value="french">French</option>
                    <option value="english">English</option>
                    <option value="other" selected>Other</option>
                </select>
                @error('metier')
                    <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <div class="form-group">
                <label for="pdf">PDF</label>
                <input type="file" class="form-control-file" id="pdf" name="pdf">
                @error('pdf')
                    <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Add File</button>
        </form>
    </div>

    <!-- Bootstrap JS (Optional, if needed) -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
