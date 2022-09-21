<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Log in (v2)</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{('plugins/fontawesome-free/css/all.min.css')}}">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{('plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{('dist/css/adminlte.min.css')}}">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <img src="{{asset('img/AdminLTELogo.png')}}" alt="">
      <p class="login-box-msg">Login Untuk Memulai</p>
    </div>
    <div class="card-body">
      <p class="login-box-msg">
          <!-- Session Status -->
          <x-auth-session-status class="mb-4" :status="session('status')" />

          <!-- Validation Errors -->
          <x-auth-validation-errors class="mb-4" :errors="$errors" />
      </p>

      <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="input-group mb-3">            
         <x-text-input id="email" class="form-control" type="email" name="email" :value="old('email')" placeholder="Email" autofocus />
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
            <x-text-input id="password" class="form-control" type="password" name="password" placeholder="Password" autocomplete="current-password" />
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            {{-- <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div> --}}
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Log In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="{{('plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{('dist/js/adminlte.min.js')}}"></script>
</body>
</html>
