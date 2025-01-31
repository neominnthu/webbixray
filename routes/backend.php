<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\RoleController;
use App\Http\Controllers\Backend\PermissionController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\ReferralController;

Route::group(['middleware' => ['auth']], function() {

    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::resource('permissions', PermissionController::class);


    Route::get('/wallet', [WalletController::class, 'index'])->name('wallet.index');
    Route::post('/wallet/add-funds', [WalletController::class, 'addFunds'])->name('wallet.addFunds');
    Route::post('/wallet/use-funds', [WalletController::class, 'useFunds'])->name('wallet.useFunds');

    Route::post('/checkout/wallet-payment', [CheckoutController::class, 'payWithWallet'])->name('checkout.walletPayment');
});

Route::group(['middleware' => ['auth']], function() {

    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'profile'])->name('profile');
    Route::get('/referral', [ReferralController::class, 'generateReferralLink'])->name('referral');

});
