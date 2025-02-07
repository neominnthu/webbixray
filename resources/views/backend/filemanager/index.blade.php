@extends('backend.layouts.app')
@section('title', 'File Manager')

@push('custom-styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.min.css">
@endpush
@push('custom-scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.min.js"></script>

<script>
    Dropzone.options.fileUpload = {
        paramName: "file", // Name of the file input field
        maxFilesize: 10, // Max file size in MB
        acceptedFiles: ".jpg,.jpeg,.png,.pdf,.doc,.docx", // Allowed file types
        init: function () {
            this.on("success", function (file, response) {
                location.reload(); // Reload page to show new uploads
            });
        }
    };
</script>
@endpush

@section('content')

<div class="card mb-4">
    <div class="card-header">File Manager</div>
    <div class="card-body">
    <!-- Dropzone Upload Form -->
    <form action="{{ route('filemanager.upload') }}" method="POST" enctype="multipart/form-data" class="dropzone" id="file-upload">
        @csrf
        <div class="dz-message">
            Drag & drop files here or click to upload.
        </div>
    </form>
    </div>

</div>


    <hr>

    <!-- Display Uploaded Files -->
    <h3>Your Files:</h3>
    <div class="card">
    <ul>
        @foreach($files as $file)
            <li>
                <a href="{{ $file->getUrl() }}" target="_blank">{{ $file->name }}</a>
                <form action="{{ route('filemanager.delete', $file->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>
    </div>



@endsection
