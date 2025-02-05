@extends('backend.layouts.app')
@section('title', 'Dashbaord')
@section('content')
@php
    $checkedIn = \App\Models\DailyCheckIn::where('user_id', auth()->id())
                ->whereDate('date', now())
                ->exists();
@endphp

@if($checkedIn)
    <p><strong>You have already checked in today!</strong></p>
@else
    <form action="{{ route('check-in') }}" method="POST">
        @csrf
        <button type="submit">Check In</button>
    </form>
@endif
@endsection
