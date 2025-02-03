@extends('backend.layouts.guest')
@section('content')


<div class="register-box">

    @if(session('success'))
    <p style="color: green;">{{ session('success') }}</p>
    @endif
    @foreach ($errors->all() as $error)
    <p style="color: red;">{{ $error }}</p>
    @endforeach
    <!-- /.register-logo -->
    <div class="card card-outline card-primary">
      <div class="card-header">
        <a href="#" class="link-dark text-center link-offset-2 link-opacity-100 link-opacity-50-hover">
          <h1 class="mb-0"><b>Webbix</b>Ray</h1>
        </a>
      </div>
      <div class="card-body register-card-body">
        <p class="register-box-msg">Register a new membership</p>
        <form action="{{route('register')}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('POST')
          <div class="input-group mb-1">
            <div class="form-floating">
              <input id="username" type="text" class="form-control" placeholder="" name="name" />
              <label for="username">Full Name</label>
            </div>
            <div class="input-group-text"><span class="bi bi-person"></span></div>
          </div>
          <div class="input-group mb-1">
            <div class="form-floating">
              <input id="email" type="email" class="form-control" placeholder="" name="email" />
              <label for="email">Email</label>
            </div>
            <div class="input-group-text"><span class="bi bi-envelope"></span></div>
          </div>
          <div class="input-group mb-1">
            <div class="form-floating">
                <input type="text" class="form-control" name="referral_code" value="{{ request('ref') }}" placeholder="Referral Code (Optional)" >
              <label for="referralCode">Referral Code</label>
            </div>

          </div>
          <div class="input-group mb-1">
            <div class="form-floating">
              <input id="password" type="password" class="form-control" placeholder="" name="password"/>
              <label for="password">Password</label>
            </div>
            <div class="input-group-text"><span class="bi bi-lock-fill"></span></div>
          </div>
          <!--begin::Row-->
          <div class="row">
            <div class="col-8 d-inline-flex align-items-center">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" />
                <label class="form-check-label" for="flexCheckDefault">
                  I agree to the <a href="#">terms</a>
                </label>
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
        <!--
        <div class="social-auth-links text-center mb-3 d-grid gap-2">
          <p>- OR -</p>
          <a href="#" class="btn btn-primary">
            <i class="bi bi-facebook me-2"></i> Sign in using Facebook
          </a>
          <a href="#" class="btn btn-danger">
            <i class="bi bi-google me-2"></i> Sign in using Google+
          </a>
        </div> -->
        <!-- /.social-auth-links -->
        <p class="mb-0">
          <a href="{{route('login')}}" class="link-primary text-center"> I already have a membership </a>
        </p>
      </div>
      <!-- /.register-card-body -->
    </div>
</div>

@endsection
