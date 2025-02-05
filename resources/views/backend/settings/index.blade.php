@extends('backend.layouts.app')
@section('title', 'Setting')
@section('content')
<div class="container">
    <h2>Admin Settings</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form method="POST" action="{{ route('settings.update') }}">
        @csrf
        <table class="table">
            <thead>
                <tr>
                    <th>Category</th>
                    <th>Setting Key</th>
                    <th>Value</th>
                </tr>
            </thead>
            <tbody>
                @foreach($settings as $category => $groupedSettings)
                    @foreach($groupedSettings as $setting)
                        <tr>
                            <td>{{ ucfirst($category) }}</td>
                            <td>{{ $setting->setting_key }}</td>
                            <td>
                                <input type="text" name="settings[{{ $loop->index }}][value]"
                                       value="{{ $setting->setting_value }}" class="form-control">
                                <input type="hidden" name="settings[{{ $loop->index }}][category]" value="{{ $category }}">
                                <input type="hidden" name="settings[{{ $loop->index }}][key]" value="{{ $setting->setting_key }}">
                            </td>
                        </tr>
                    @endforeach
                @endforeach
            </tbody>
        </table>

        <button type="submit" class="btn btn-primary">Save Settings</button>
    </form>
</div>
@endsection
