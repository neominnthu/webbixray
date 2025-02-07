<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Illuminate\Support\Facades\Auth;

class FileManagerController extends Controller
{
    public function index()
    {
        $files = Auth::user()->getMedia('files'); // Get all uploaded files
        return view('backend.filemanager.index', compact('files'));
    }

    public function upload(Request $request)
    {
        $request->validate([
            'file' => 'required|file|max:10240', // 10MB max file size
        ]);

        $user = Auth::user();
        $user->addMedia($request->file('file'))->toMediaCollection('files');

        return redirect()->back()->with('success', 'File uploaded successfully!');
    }

    public function delete($id)
    {
        $file = Media::findOrFail($id);

        if ($file->model_id !== Auth::id()) {
            abort(403, 'Unauthorized');
        }

        $file->delete();

        return redirect()->back()->with('success', 'File deleted successfully!');
    }
}
