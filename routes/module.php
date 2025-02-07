<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

use Nwidart\Modules\Facades\Module;

// Display Modules Management Page
Route::get('/modules', function () {
    $modules = Module::all();
    return view('backend.modules.index', compact('modules'));
})->name('modules.index');

// Upload Module
Route::post('/modules/upload', function (Request $request) {
    $request->validate([
        'module' => 'required|mimes:zip|max:10240',
    ]);

    $file = $request->file('module');
    $fileName = $file->getClientOriginalName();
    $modulePath = storage_path('app/modules/');

    if (!file_exists($modulePath)) {
        mkdir($modulePath, 0755, true);
    }

    $file->move($modulePath, $fileName);

    $zip = new ZipArchive;
    if ($zip->open($modulePath . $fileName) === true) {
        $zip->extractTo(base_path('Modules/'));
        $zip->close();

        $moduleName = basename($fileName, '.zip');
        Artisan::call('module:enable', ['module' => $moduleName]);

        return redirect()->route('modules.index')->with('success', "Module '{$moduleName}' uploaded and activated successfully!");
    }

    return redirect()->route('modules.index')->with('error', 'Failed to extract module ZIP file.');
})->name('modules.upload');

// Activate Module
Route::post('/modules/activate/{module}', function ($module) {
    Artisan::call('module:enable', ['module' => $module]);
    return redirect()->route('modules.index')->with('success', "Module '{$module}' activated successfully!");
})->name('modules.activate');

// Deactivate Module
Route::post('/modules/deactivate/{module}', function ($module) {
    Artisan::call('module:disable', ['module' => $module]);
    return redirect()->route('modules.index')->with('success', "Module '{$module}' deactivated successfully!");
})->name('modules.deactivate');

// Delete Module
Route::post('/modules/delete/{module}', function ($module) {
    Artisan::call('module:disable', ['module' => $module]);
    $modulePath = base_path("Modules/{$module}");

    if (File::exists($modulePath)) {
        File::deleteDirectory($modulePath);
        return redirect()->route('modules.index')->with('success', "Module '{$module}' deleted successfully!");
    }

    return redirect()->route('modules.index')->with('error', "Module '{$module}' not found!");
})->name('modules.delete');
