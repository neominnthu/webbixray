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

    <div class="card mb-4">

        <div class="card-header">
            <div class="row">
                <div class="col-6 col-sm-6">
                    <a href="{{route('roles.create')}}" class="btn btn-primary btn-sm"> + Add New Role</a>
                </div>
                <div class="col-6 col-sm-6">
                    <div class="float-end m-0" >
                        <a href=""> Export </a> &nbsp
                        <a href=""> Import </a>
                    </div>

                </div>

            </div>

        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table class="table table-bordered table-responsive">
                <thead>
                    <tr>
                        <th style="">No</th>
                        <th style="">Role Name</th>
                        <th style="">Guard</th>

                        <th style="">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $key => $role)
                        <tr class="align-middle">
                            <td>{{ ++$i }}</td>
                            <td>{{$role->name}}</td>
                            <td >{{$role->guard_name}}</td>


                            <td>

                                <a class="btn btn-primary btn-sm" href="{{ route('roles.edit',$role->id) }}"><i class="fa-solid fa-pen-to-square"></i> Edit</a>
                                 <form method="POST" action="{{ route('roles.destroy',$role->id) }}" style="display:inline">
                                     @csrf
                                     @method('DELETE')

                                     <button type="submit" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i> Delete</button>
                                 </form>
                            </td>
                        </tr>
                    @endforeach


                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
        <div class="card-footer clearfix">
        <ul class="pagination pagination-sm m-0 float-end">

            <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
        </ul>
        </div>
    </div>

    @endsection
<!-- ## End Content ## -->
