<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <style>
    </style>
</head>
<body>
    <div class="container">
        <center><h1>Welcome To Admin Page</h1></center>
        @if (session('message'))
        <div class="container">
         <div class="alert alert-success alert-dismissible fade show" role="alert">
             <strong>Success</strong> {{ session('message') }}
             <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
         </div>
        </div>
     @endif
     <div class="dropdown">
        <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            Add New Student
        </button>
        <ul class="dropdown-menu dropdown-menu-dark">
          <li><a class="dropdown-item active" href="{{route('cretefromadmin')}}"> With Form</a></li>
          <li><a class="dropdown-item" href="#" data-bs-toggle="offcanvas" data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling">With Exel
          </a></li>
          <li><hr class="dropdown-divider"></li>
          <li><a class="dropdown-item " href="{{route('student.index')}}"><i class="fa fa-home"> </i> back</a></li>
        </ul>
      </div>


<div class="offcanvas offcanvas-start" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1" id="offcanvasScrolling" aria-labelledby="offcanvasScrollingLabel">
  <div class="offcanvas-header">
    <h5 class="offcanvas-title" id="offcanvasScrollingLabel">Import Fichier Excel</h5>
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form action="{{ route('createstudentfromadminwithexel') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="excel" class="form-label">Select Excel File</label>
                        <input type="file" class="form-control" id="excel" name="excel" accept=".xlsx, .xls">
                    </div>
                    @error('excel')
                        <p class="text-danger">  {{$message}}</p>
                    @enderror
                    <button type="submit" class="btn btn-primary">Add Students</button>
                </form>
            </div>
        </div>
    </div>
  </div>
</div>
     
        <table class="table m-3">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>date for create</th>
                    <th>date for update</th>
                    <th>Delete</th>
                    <th>Detail</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($students as $item)
                    <tr>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->email }}</td>
                        <td>{{ $item->created_at }}</td>
                        <td>{{ $item->updated_at }}</td>
                        <td>
                            @if (!($item->name === 'admin' && $item->email==='admin@gmail.com' ))
                            <form action="{{ route('student.destroy', ['student'=>$item->id]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"><i class="fa fa-trach"></i> Delete</button>
                            </form>
                        </td>
                        <td>
                                <a class="nav-link" class="btn btn-danger" href="{{ route('student.edit',['student'=>$item->id]) }}"><i class="fa fa-pencil"></i> Modifier </a>
                        </td>  
                            @endif
                        
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
    <div class="pagination text-center">
        {{ $students->links() }}
    </div>    
    <!-- Bootstrap JS (optional) -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
