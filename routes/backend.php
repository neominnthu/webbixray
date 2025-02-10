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
use App\Http\Controllers\Backend\TicketController;
use App\Http\Controllers\Backend\WalletController;
use App\Http\Controllers\Backend\TaskController;

Route::group(['middleware' => ['auth']], function() {


    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'profile'])->name('profile');
    Route::get('/referral', [ReferralController::class, 'generateReferralLink'])->name('referral');


    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::resource('permissions', PermissionController::class);

    //######### Ticket Support Routes ##############//
    Route::resource('/tickets', TicketController::class);
    Route::get('/mytickets', [TicketController::class, 'mytickets'])->name('tickets.mytickets');

    //######### Wallet Routes ##############//
    Route::get('/wallets', [WalletController::class, 'index'])->name('wallets.index');
    Route::get('/wallets/deposit', [WalletController::class, 'deposit'])->name('wallets.deposit');
    Route::get('/wallets/withdraw', [WalletController::class, 'withdraw'])->name('wallets.withdraw');
    Route::get('/wallets/transfer', [WalletController::class, 'transfer'])->name('wallets.transfer');
    //######### End Wallet Routes ##############//


    //######### Task Routes ##############//
    Route::resource('tasks', TaskController::class);
    //######### End Task Routes ##############//

    Route::get('/settings', [SettingController::class, 'index'])->name('settings.index');
    Route::post('/settings/update', [SettingController::class, 'update'])->name('settings.update');

    Route::get('/file-manager', [FileManagerController::class, 'index'])->name('filemanager.index');
    Route::post('/file-manager/upload', [FileManagerController::class, 'upload'])->name('filemanager.upload');
    Route::delete('/file-manager/{id}', [FileManagerController::class, 'delete'])->name('filemanager.delete');




});

