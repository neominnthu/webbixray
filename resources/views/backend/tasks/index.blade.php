

@extends('backend.layouts.app')
@section('title', 'Task List')
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
                        <a href="{{route('tasks.create')}}" class="btn btn-primary btn-sm"> + Add New Task</a>
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
                            <th style="">Title</th>
                            <th style="">Description</th>
                            <th style="">Type</th>
                            <th style="">reward</th>
                            <th style="">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tasks as $key=>$data)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{$data->title}}</td>
                            <td>{{$data->description}}</td>
                            <td>{{$data->type}}</td>
                            <td>{{$data->reward}}</td>
                            <td>{{$data->status}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
            <div class="card-footer clearfix">
                {{ $tasks->links() }}
            </div>
        </div>

    @endsection
<!-- ## End Content ## -->


