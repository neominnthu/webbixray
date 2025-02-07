@extends('backend.layouts.app')
@section('title', 'User Create')
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
                        <a href="{{route('users.create')}}" class="btn btn-primary btn-sm"> + Add New User</a>
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
                            <th style=""></th>
                            <th style="">User Name</th>
                            <th style="">Email</th>
                            <th style="">Roles</th>
                            <th style="">Balance</th>
                            <th style="">Status</th>
                            @role(['Super-Admin','Admin'])
                            <th style="">Action</th>
                            @endrole
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $key => $user)
                            <tr class="align-middle">
                                <td>{{ ++$i }}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>
                                    @if(!empty($user->getRoleNames()))
                                        @foreach($user->getRoleNames() as $v)
                                            <label class="badge bg-danger">{{ $v }}</label>
                                        @endforeach
                                    @endif
                                </td>
                                <td> Ks</td>
                                <td><label class="badge bg-success"></label></td>

                                <td>
                                    @can('user-list')
                                        <a class="btn btn-info btn-sm" href="{{ route('users.show',$user->id) }}"><i class="fa-solid fa-list"></i> Show</a>
                                    @endcan
                                    @can('user-edit')
                                        <a class="btn btn-primary btn-sm" href="{{ route('users.edit',$user->id) }}"><i class="fa-solid fa-pen-to-square"></i> Edit</a>
                                    @endcan
                                    @can('user-delete')
                                     <form method="POST" action="{{ route('users.destroy', $user->id) }}" style="display:inline">
                                         @csrf
                                         @method('DELETE')

                                         <button type="submit" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i> Delete</button>
                                     </form>
                                    @endcan

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
