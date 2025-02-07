@extends('backend.layouts.app')
@section('title', 'Module List')
@section('content')

    <!-- Upload Form -->
    <div class="card mb-4">
        <div class="card-header">Upload New Module</div>
        <div class="card-body">
            <form action="{{ route('modules.upload') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <input type="file" name="module" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary">Upload Module</button>
            </form>
        </div>
    </div>

    <!-- Modules List -->
    <div class="card">
        <div class="card-header">Installed Modules</div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>Module Name</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($modules as $module)
                        <tr>
                            <td>{{ $module->getName() }}</td>
                            <td>
                                <span class="badge {{ $module->isEnabled() ? 'bg-success' : 'bg-danger' }}">
                                    {{ $module->isEnabled() ? 'Active' : 'Inactive' }}
                                </span>
                            </td>
                            <td>
                                @if($module->isEnabled())
                                    <form action="{{ route('modules.deactivate', $module->getName()) }}" method="POST" class="d-inline">
                                        @csrf
                                        <button type="submit" class="btn btn-warning btn-sm">Deactivate</button>
                                    </form>
                                @else
                                    <form action="{{ route('modules.activate', $module->getName()) }}" method="POST" class="d-inline">
                                        @csrf
                                        <button type="submit" class="btn btn-success btn-sm">Activate</button>
                                    </form>
                                @endif

                                <form action="{{ route('modules.delete', $module->getName()) }}" method="POST" class="d-inline">
                                    @csrf
                                    <button type="submit" class="btn btn-danger btn-sm"
                                            onclick="return confirm('Are you sure you want to delete this module?')">Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-center">No modules installed</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
