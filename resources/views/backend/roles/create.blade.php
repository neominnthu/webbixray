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
            <a href="{{route('roles.index')}}" class="btn btn-sm btn-primary"> << Back to Role List</a>
        </div>
        <div class="card-body">
            <!--begin::Form-->
            <form action="{{route('roles.store')}}" method="post"  enctype="multipart/form-data">
                @csrf
                @method('POST')

                <div class="mb-3">
                    <label for="rolename" class="form-label">Role name <a href="" class="text-danger">*</a></label>
                    <input type="text" class="form-control" id="rolename" name="name"  />

                </div>
                <div class="mb-3">
                    <label for="rolename" class="form-label">Guard name </label>
                    <input type="text" class="form-control" id="rolename" name="guard" value="web" disabled />

                </div>
                <div class="mb-3">
                    <label for="rolename" class="form-label">Permissions </label>

                    <div class="row">
                        @foreach($permission as $value)
                        <div class="col-6 col-sm-3 ">


                            <label class="" style="font-size: 12px">{{ html()->checkbox('permission[]', $value->id, false, array('class' => 'name')) }}

                            {{ $value->name }}</label>

                            <br/>


                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Create Role</button>
                </div>

            </form>
        </div>
    </div>

    @endsection
<!-- ## End Content ## -->
