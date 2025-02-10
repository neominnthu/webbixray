@extends('backend.layouts.app')
@section('title', 'All Tickets')
@section('content')

<div class="card mb-4">

    <div class="card-header">
        <a href="{{route('tickets.create')}}" class="btn btn-outline btn-primary"> Create Ticket </a>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table class="table table-bordered table-hover ">
            <thead style="text-xs">
                <tr style="font-size: 14px">
                    <th >No</th>
                    <th >Issuer Name</th>
                    <th >Subject</th>
                    <th>Created date</th>
                    <th>Updated date</th>
                    <th>Technician Name</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>



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
