@extends('backend.layouts.app')
@section('title', 'Transaction list')
@section('content')
<div class="card mb-4">

    <div class="card-header">
<form method="GET" action="{{ route('transactions.index') }}">
        <div class="row">

                <div class="col-4 col-sm-4">
                    <input type="text" class="form-control" name="search" placeholder="Search..." value="{{ request('search') }}">
                </div>
                <div class="col-4 col-sm-4">
                    <select name="filter" class="form-control">
                        <option value="">All</option>
                        <option value="daily" {{ request('filter') == 'daily' ? 'selected' : '' }}>Daily</option>
                        <option value="weekly" {{ request('filter') == 'weekly' ? 'selected' : '' }}>Weekly</option>
                        <option value="monthly" {{ request('filter') == 'monthly' ? 'selected' : '' }}>Monthly</option>
                    </select>
                </div>
                <div class="col-4 col-sm-4">
                    <button type="submit" class="btn btn-sm btn-outline btn-primary">Search</button>
                </div>

        </div>
</form>
    </div>
    <div class="card-body">
        <table class="table table-bordered table-responsive">
            <thead>
                <tr>
                    <th style="">No</th>
                    <th>Date / Time</th>
                    <th style="">Amount</th>
                    <th style="">Transaction type</th>
                    <th style="">Remark</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($transactions as $transaction)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $transaction->created_at }}</td>
                    <td>{{ $transaction->amount }}</td>
                    <td>{{ $transaction->type }}</td>
                    <td>{{ $transaction->description }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $transactions->links() }}
    </div>
</div>
@endsection
