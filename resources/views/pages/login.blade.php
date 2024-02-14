@extends('welcome')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <title>Login</title>

</head>
<body>
    <style>
        .home{
            padding: 50px;
            }
    </style>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">

        @yield('navbar')
        
    </nav>
    <a href="{{route('student.index')}}" class="home"><i class="fa fa-home fa-3x"></i></a>
    <div class="container mt-3">
        <center><h2>Stacked Form</h2></center>
        @if (session('message'))
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            <strong>Danger!</strong>{{session('message')}}
        </div>
        @endif
        @if (session('success'))
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            <strong>success!</strong>{{session('success')}}
        </div>
        @endif
        <form action="{{route('login')}}" method="POST">
            @csrf
            <div class="mb-3 mt-3">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" value="{{old('email')}}">
                @error('email')
                    <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="pwd">Password:</label>
                <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="password">
                @error('password')
                    <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <div class="form-check mb-3">
                <label class="form-check-label">
                    <input class="form-check-input" type="checkbox" name="remember"> Remember me
                </label>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>
</html>
