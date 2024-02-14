<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Student Registration</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <style>
        .home{
            margin-left: 110px;
            margin-top: 30px;
        }
    </style>
    <a href="{{route('student.index')}}" class="home"><i class="fa fa-home fa-3x"></i></a>
    <center><h2>Form S'inscription</h2></center>
    <div class="container mt-5">
        <form action="{{ route('storee') }}" method="POST" enctype="multipart/form-data">
            @csrf 

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" name="name" value="{{old('name')}}">
                @error('name')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>



            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" class="form-control" name="email" value="{{old('email')}}" >
                @error('email')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password" >
                @error('password')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group">
                <label for="password_confirmation">Confirmation Password</label>
                <input type="password" class="form-control" name="password_confirmation">
                @error('password_confirmation')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            {{-- <div class="form-group">
                <label for="image">Image</label>
                <input type="file" class="form-control-file" name="image">
                @error('image')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div> --}}
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

</html>
