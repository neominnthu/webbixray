<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\RoleController;
use App\Http\Controllers\Backend\PermissionController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\ReferralController;
use App\Http\Controllers\Backend\WalletController;
use App\Http\Controllers\Backend\TransactionController;
use App\Http\Controllers\Backend\SettingController;
use App\Http\Controllers\Backend\TaskController;
use App\Http\Controllers\Backend\DailyCheckInController;

Route::group(['middleware' => ['auth']], function() {

    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::resource('permissions', PermissionController::class);

    Route::get('/settings', [SettingController::class, 'index'])->name('settings.index');
    Route::post('/settings/update', [SettingController::class, 'update'])->name('settings.update');

    //### Task Controller ###//
    Route::resource('tasks', TaskController::class);

    //***Check IN ***/
    Route::post('/check-in', [DailyCheckInController::class, 'checkIn'])->name('check-in');

    Route::get('/my-wallet', [WalletController::class, 'index'])->name('my.wallet');
    Route::get('/transactions', [TransactionController::class, 'index'])->name('transactions.index');
    Route::get('/my-transaction', [TransactionController::class, 'myTransaction'])->name('my.transaction');
    Route::post('/wallet/add-funds', [WalletController::class, 'addFunds'])->name('wallet.addFunds');
    Route::post('/wallet/use-funds', [WalletController::class, 'useFunds'])->name('wallet.useFunds');

    Route::post('/checkout/wallet-payment', [CheckoutController::class, 'payWithWallet'])->name('checkout.walletPayment');
});

Route::group(['middleware' => ['auth']], function() {

    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'profile'])->name('profile');
    Route::get('/referral', [ReferralController::class, 'generateReferralLink'])->name('referral');

});
