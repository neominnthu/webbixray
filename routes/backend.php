<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\RoleController;
use App\Http\Controllers\Backend\PermissionController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\ReferralController;
use App\Http\Controllers\Backend\SettingController;
use App\Http\Controllers\Backend\FileManagerController;

Route::group(['middleware' => ['auth']], function() {


    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'profile'])->name('profile');
    Route::get('/referral', [ReferralController::class, 'generateReferralLink'])->name('referral');


    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::resource('permissions', PermissionController::class);

    Route::get('/settings', [SettingController::class, 'index'])->name('settings.index');
    Route::post('/settings/update', [SettingController::class, 'update'])->name('settings.update');

    Route::get('/file-manager', [FileManagerController::class, 'index'])->name('filemanager.index');
    Route::post('/file-manager/upload', [FileManagerController::class, 'upload'])->name('filemanager.upload');
    Route::delete('/file-manager/{id}', [FileManagerController::class, 'delete'])->name('filemanager.delete');




});

