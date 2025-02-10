

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
                </div>

            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table class="table table-bordered table-responsive">
                    <thead>
                        <tr>
                            <th style="">No</th>
                            <th style="">Title</th>
                            <th style="">Description</th>
                            <th style="">Status</th>
                            <th style="">Points</th>
                            <th style="">Type</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tasks as $task)
                        <tr>
                            <td></td>
                            <td>{{$task->title}}</td>
                            <td>{{$task->description}}</td>
                            <td>{{$task->status}}</td>
                            <td>{{$task->points}}</td>
                            <td>{{$task->type}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
            <div class="card-footer clearfix">

            </div>
        </div>

    @endsection
<!-- ## End Content ## -->


