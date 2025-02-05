@extends('backend.layouts.app')
@section('title', 'My Transaction')
@section('content')
<div class="card mb-4">

    <div class="card-header">
        <div class="row">
            <div class="col-6 col-sm-6">

            </div>
            <div class="col-6 col-sm-6">


            </div>

        </div>

    </div>
    <div class="card-body">
        <table class="table table-bordered table-responsive">
            <thead>
                <tr>
                    <tr>
                        <th style="">No</th>
                        <th>Date / Time</th>
                        <th style="">Transaction Type</th>
                        <th style="">Amount</th>
                        <th>Remark</th>
                    </tr>
                </tr>
            </thead>
            <tbody>

                @foreach ($transactions as $key => $data)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{$data->created_at}}</td>
                        <td>{{$data->type}}</td>
                        <td>{{$data->amount}}</td>
                        <td>{{$data->description}}</td>
                    </tr>
                 @endforeach

            </tbody>
        </table>
    </div>
</div>
@endsection
