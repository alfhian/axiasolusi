<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <link rel="shortcut icon" href="public/images/favicon.png">
        <title>Axia Solusi - POS</title>
		
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link rel="stylesheet" type="text/css" href="css/responsive.css">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="css/all.css">
        <script src="public/js/jquery-3.4.1.min.js"></script>
        <script src="public/js/javascript.js"></script>
        <script src="public/js/bootstrap.min.js"></script>
    </head>
    <body class="body">

      <div class="h-100 container-fluid p-0">

        @if (session()->has('success'))
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        @endif

        @if (session()->has('loginError'))
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('loginError') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        @endif

        <div class="h-100">
          <div class="h-100">
            <img class="mt-4 ml-4" src="img/axiasolusi.png" width="150px">
            <div class="pt-5 d-flex justify-content-center">
              <div class="d-flex align-items-center flex-column">
                <span class="login-title font-roboto">Sign In</span>
                <p class="text-sm-center text-secondary small">Welcome back ! Sign in to access Axia Solusi System POS System</p>
                <form class="w-100" action="/login" method="post" class="form-login" autocomplete="off">
                  
                  {{ csrf_field() }}
                  <div class="w-100 form-group row d-flex align-items-center flex-column">
                    <div class="w-75 d-flex align-items-center flex-column">
                      <input type="text" class="mt-5 mb-3 form-control" name="username" required placeholder="Username" autocomplete="off">
                      <input type="password" class="my-3 form-control" name="password" required placeholder="Password" autocomplete="off">
                      <button class="mt-5 btn-lg green-button" id="login"><i class="fas fa-arrow-alt-circle-right"></i>&nbsp;&nbsp;SIGN IN</button>
                    </div>
                  </div>
                </form>
              </div>
              <div class="mb-2 text-sm-center footer small">
                Copyright &copy; - <a href="https:\\axiasolusi.com" target="_blank" class="link-secondary">Axia Solusi</a>
              </div>
            </div>
          </div>
        </div>
      </div>

    </body>

</html>
