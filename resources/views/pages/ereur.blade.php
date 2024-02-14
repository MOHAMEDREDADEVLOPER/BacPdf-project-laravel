<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
   <section class="page_404">
       <div class="container">
           <div class="row">
               <div class="col-sm-12">
                   <div class="col-sm-10 col-sm-offset-1 text-center">
                       <div class="four_zero_four_bg">
                           <h1 class="text-center">404</h1>
                       </div>
                       <div class="content_box_404">
                           <h3 class="h2">Looks Like You're Lost</h3>
                           <p>The page you are looking for not available</p>
                           <a href="{{route('student.index')}}" class="btn btn-success">Go to Home</a>
                       </div>
                   </div>
               </div>
           </div>
       </div>
   </section>
</body>
</html>