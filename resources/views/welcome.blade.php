<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Graphical Two Factor Authentication System</title>

<!-- Bootstrap core CSS-->
  <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="{{ asset('vendor/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
  <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    </head>
    <body>
       <div class="container" style="margin-top: 3rem;">
         <div class="row">
           <div class="col" style="margin-top: 4rem;">
                <div class="jumbotron text-center">
                  <h1 class="display-5">Two Factor Authentication System with Graphical Password</h1>
                  <p>Create Graphical Password to easily memorize and use Two factor authentication for better security</p>
                  <p class="lead">
                    @auth
                    <a class="btn btn-primary btn-lg" href="{{ url('/home') }}" role="button">Home</a>
                    @else
                    <a class="btn btn-success btn-lg" href="{{route('login')}}" role="button">Log in</a>
                    <a class="btn btn-primary btn-lg" href="{{route('register')}}" role="button">Register</a>
                    @endauth
                  </p>
                </div>
           </div>
            <div class="col">
               <div class="card">
                 <div class="card-body">
                  <img class="card-img-top" src="{{ asset('img/qr.png') }}" alt="Card image cap">
                 </div>
               </div>
           </div>
         </div>
        </div>
    </body>
</html>
