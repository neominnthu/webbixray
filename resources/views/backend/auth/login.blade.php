@extends('backend.layouts.guest')
@section('content')


@if(session('success'))
<p style="color: green;">{{ session('success') }}</p>
@endif
@foreach ($errors->all() as $error)
<p style="color: red;">{{ $error }}</p>
@endforeach

<div class="login-box">
    <div class="card card-outline card-primary">
      <div class="card-header">
        <a
          href="#"
          class="link-dark text-center link-offset-2 link-opacity-100 link-opacity-50-hover"
        >
          <h1 class="mb-0"><b>Webbix</b>Ray</h1>
        </a>
      </div>
      <div class="card-body login-card-body">
        <p class="login-box-msg">Sign in to start your session</p>
        <form action="{{route('login')}}" method="post">
            @csrf
            @method('POST')
          <div class="input-group mb-1">
            <div class="form-floating">
              <input id="loginEmail" type="email" class="form-control" value="{{ old('email') }}" name="email" placeholder="Email " />
              <label for="loginEmail">Email</label>
            </div>
            <div class="input-group-text"><span class="bi bi-envelope"></span></div>
          </div>
          <div class="input-group mb-1">
            <div class="form-floating">
              <input id="loginPassword" type="password" class="form-control" name="password" placeholder="" />
              <label for="loginPassword">Password</label>
            </div>
            <div class="input-group-text"><span class="bi bi-lock-fill"></span></div>
          </div>
          <!--begin::Row-->
          <div class="row">
            <div class="col-8 d-inline-flex align-items-center">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" />
                <label class="form-check-label" for="flexCheckDefault"> Remember Me </label>
              </div>
            </div>
            <!-- /.col -->
            <div class="col-4">
              <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary">Sign In</button>
              </div>
            </div>
            <!-- /.col -->
          </div>
          <!--end::Row-->
        </form>
        <!------###################################################
        <div class="social-auth-links text-center mb-3 d-grid gap-2">
          <p>- OR -</p>
          <a href="#" class="btn btn-primary">
            <i class="bi bi-facebook me-2"></i> Sign in using Facebook
          </a>
          <a href="#" class="btn btn-danger">
            <i class="bi bi-google me-2"></i> Sign in using Google+
          </a>
        </div>####################################################### -->
        <!-- /.social-auth-links -->
        <p class="mb-1"><a href="#">I forgot my password</a></p>
        <p class="mb-0">
          <a href="{{route('register')}}" class="text-center"> Register a new membership </a>
        </p>
      </div>
      <!-- /.login-card-body -->
    </div>
  </div>
@endsection
