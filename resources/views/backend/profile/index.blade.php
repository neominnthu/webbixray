@extends('backend.layouts.app')

    <!-- Custom styles can be add here -->
        @push('custom-styles')

        <!---Styles---->

        @endpush
    <!-- ## End Custom Styles ## -->


    <!-- Custom scripts can be add here -->
        @push('custom-scripts')
        <script>
            function copyReferralLink() {
                var copyText = document.getElementById("referralLink");
                copyText.select();
                document.execCommand("copy");
                alert("Referral link copied!");
            }
        </script>
        <!---Scripts---->

        @endpush
    <!-- ## End Custom Scripts ## -->

<!--Content Will Goes Here-->
    @section('content')
    <div class="row">
        <div class="col-md-3 mr-3">

          <!-- Profile Image -->
          <div class="card card-primary card-outline">
            <div class="card-body box-profile">
              <div class="text-center">
                <img class="profile-user-img img-fluid img-circle" src="{{asset('/')}}assets/img/user4-128x128.jpg" alt="User profile picture">
              </div>

              <h3 class="profile-username text-center">{{Auth::user()->name}}</h3>

              <p class="text-muted text-center">
                @if(!empty(Auth::user()->getRoleNames()))
                    @foreach(Auth::user()->getRoleNames() as $v)
                        <label class="badge bg-danger">{{ $v }}</label>
                    @endforeach
                @endif
              </p>

              <ul class="list-group list-group-unbordered mb-3">
                <!--
                <li class="list-group-item">
                  <b>Followers</b> <a class="float-right">1,322</a>
                </li>
                <li class="list-group-item">
                  <b>Following</b> <a class="float-right">543</a>
                </li>
                <li class="list-group-item">
                  <b>Friends</b> <a class="float-right">13,287</a>
                </li> -->
              </ul>

              <a href="#" class="btn btn-primary btn-block"><b>Edit Profile</b></a>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->


        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <!-- About Me Box -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">About Me</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <strong><i class="fas fa-book mr-1"></i> Referral Link</strong>

                <div class="form-group">
                    <input class="form-control" type="text" id="referralLink" value="{{ url('/register?ref=' . Auth::user()->referral_code) }}" readonly>
                </div>
                <div class="form-group m-3">
                    <button onclick="copyReferralLink()" class="btn btn-primary">Copy Link</button>
                </div>

              <hr>

              <strong><i class="fas fa-map-marker-alt mr-1"></i> Total Rewards</strong>

              <p class="text-muted">Total Referred users: x10P</p>

              <hr>

              <strong><i class="fas fa-pencil-alt mr-1"></i> Wallet Amounts</strong>

              <p class="text-muted">
                <span class="tag tag-danger">{{ number_format((float)Auth::user()->wallet->balance, )}} Ks</span>

              </p>


            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

    @endsection
<!-- ## End Content ## -->
