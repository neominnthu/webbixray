@extends('backend.layouts.app')
@section('title', 'Task Create')
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
            <a href="{{route('tasks.index')}}" class="btn btn-sm btn-primary"> << Back to Task List</a>
        </div>
        <div class="card-body">
            <!--begin::Form-->
            <form action="{{route('tasks.store')}}" method="post"  enctype="multipart/form-data">
                @csrf
                @method('POST')

                <div class="mb-3">
                    <label for="permissiontitle" class="form-label">Task Title <a href="" class="text-danger">*</a></label>
                    <input type="text" class="form-control" id="tasktitle" name="title"  />
                </div>
                <div class="mb-3">
                    <label for="taskdescription" class="form-label">Task Description <a href="" class="text-danger">*</a></label>
                    <textarea type="text" class="form-control" id="taskdescription" name="description"></textarea>
                </div>
                <div class="mb-3">
                    <label for="tasktype" class="form-label">Task Type <a href="" class="text-danger">*</a></label>
                    <select name="type" id="tasktype" class="form-control">
                        <option value="daily" selected>Daily</option>
                        <option value="weekly">Weekly</option>
                        <option value="monthly">Monthly</option>
                        <option value="event">Event (Special*)</option>
                        <option value="partner">Partner <a class="text-danger">(Special*)</a></option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="reward" class="form-label">Reward<a href="" class="text-danger">*</a></label>
                    <input type="number" class="form-control" id="reward" name="reward"  />
                </div>
                <div class="mb-3">
                    <label for="reward" class="form-label">Status<a href="" class="text-danger">*</a></label>
                    <select name="status" id="" class="form-control">
                        <option value="active" selected>Active</option>
                        <option value="inactive">Inactive</option>
                    </select>
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Create Task</button>
                </div>

            </form>
        </div>
    </div>

    @endsection
<!-- ## End Content ## -->
