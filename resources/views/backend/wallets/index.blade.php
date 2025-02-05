@extends('backend.layouts.app')
@section('title', 'My Wallet')
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
                <div class="col-12 col-sm-12">
                    <h2>Wallet Balance: ${{ $wallet->balance ?? '0.00' }}</h2>
                </div>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div class="row">
                <div class="col">
                    <!-- small box -->
                    <form action="#" method="POST">
                        <div class="card card-info card-outline">
                            <div class="card-header">
                                <p class="card-title">Request Deposit</p>
                            </div>
                            <div class="card-body">
                                <p>Please kindly submit a deposit request with attach bank slip or screenshot.</p>
                            </div>
                            <div class="card-footer">
                                <div class="text-center btn-block">
                                    <a class="btn btn-outline-primary" href="#">Request Deposit</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col">
                    <!-- small box -->
                    <form action="#" method="POST">
                        <div class="card card-info card-outline">
                            <div class="card-header">
                                <p class="card-title">Request Withdraw</p>
                            </div>
                            <div class="card-body">
                                <p>Please kindly submit a withdraw request by filling a exact bank info of user.</p>
                            </div>
                            <div class="card-footer">
                                <div class="text-center btn-block">
                                    <button class="btn btn-outline-primary " type="submit">Request Withdraw</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col">
                    <!-- small box -->
                    <form action="#" method="POST">
                        <div class="card card-info card-outline">
                            <div class="card-header">
                                <p class="card-title">Request Withdraw</p>
                            </div>
                            <div class="card-body">
                                <p>Transfer money between account to account.</p>
                            </div>
                            <div class="card-footer">
                                <div class="text-center btn-block">
                                    <button class="btn btn-outline-primary " type="submit">Transfer</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="card-footer">
            <p> <b>Last 10 Transactions ::</b></p>
            <table class="table table-bordered table-responsive">
                <thead>
                    <tr>
                        <th style="">No</th>
                        <th>Date / Time</th>
                        <th style="">Transaction Type</th>
                        <th style="">Amount</th>
                        <th>Remark</th>
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
<!-- ## End Content ## -->
