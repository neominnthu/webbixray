@extends('backend.layouts.app')
@section('title', 'User list')
    <!-- Custom styles can be add here -->
        @push('custom-styles')

        <!---Styles---->

        @endpush
    <!-- ## End Custom Styles ## -->


    <!-- Custom scripts can be add here -->
        @push('custom-scripts')

        <!---Scripts---->

        @endpush
    <!-- ## End Custom Scripts ## -->

<!--Content Will Goes Here-->
    @section('content')
        <div class="card card-primary card-outline mb-4">
            <!--begin::Header-->
            <div class="card-header">
                <a href="{{route('users.index')}}" class="btn btn-sm btn-primary"> << Back to User List</a>
            </div>
            <!--end::Header-->
            <!--begin::Form-->
            <form action="{{route('users.store')}}" method="post"  enctype="multipart/form-data">
                @csrf
                @method('POST')
                <!--begin::Body-->
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">

                            <div class="mb-3">
                                <label for="username" class="form-label">User name</label>
                                <input type="text" class="form-control" id="username" name="name"  />

                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Email address</label>
                                <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" />
                                <div id="emailHelp" class="form-text">
                                    We'll never share your email with anyone else.
                                </div>
                            </div>
                            <div class="mb-3">

                                {{html()->select('roles[]', $roles,[], array('class' => 'form-control','multiple'))}}

                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password"  name="password"/>
                            </div>

                        </div>

                        <div class="col-md-6">


                            <div class="input-group mb-3">
                                <img src="{{asset('')}}dist/assets/img/user2-160x160.jpg" alt="profile-photo" class="img-size-700 me-3" style="width: 100px">
                            </div>
                            <div class="input-group mb-3">
                                <input type="file" class="form-control" name="photo" id="image">
                                <label class="input-group-text" for="inputGroupFile02">Upload</label>
                            </div>
                        </div>
                    </div>




                </div>
                <!--end::Body-->
                <!--begin::Footer-->
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                <!--end::Footer-->
            </form>
            <!--end::Form-->
        </div>

    @endsection
<!-- ## End Content ## -->
