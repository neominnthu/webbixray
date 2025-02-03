@extends('backend.layouts.app')

    <!-- Custom styles can be add here -->
        @push('custom-styles')

        <!---Styles---->

        @endpush
    <!-- ## End Custom Styles ## -->


    <!-- Custom scripts can be add here -->
        @push('custom-scripts')

        <!---Scripts---->
        @extends('backend.layouts.app')

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
                <a href="{{route('permissions.index')}}" class="btn btn-sm btn-primary"> << Back to Role List</a>
            </div>
            <div class="card-body">
                <!--begin::Form-->
                <form action="{{route('permissions.store')}}" method="post"  enctype="multipart/form-data">
                    @csrf
                    @method('POST')

                    <div class="mb-3">
                        <label for="permissionname" class="form-label">Permission name <a href="" class="text-danger">*</a></label>
                        <input type="text" class="form-control" id="permissionname" name="name"  />

                    </div>
                    <div class="mb-3">
                        <label for="permissionname" class="form-label">Guard name </label>
                        <input type="text" class="form-control" id="permissionname" name="guard" value="web" disabled />

                    </div>

                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Create Permission</button>
                    </div>

                </form>
            </div>
        </div>

        @endsection
    <!-- ## End Content ## -->

        @endpush
    <!-- ## End Custom Scripts ## -->

<!--Content Will Goes Here-->
    @section('content')


    @endsection
<!-- ## End Content ## -->
