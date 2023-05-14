<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\UserAccountController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Management\MenuManagementController;
use App\Http\Controllers\Management\RequestTypeController;
use App\Http\Controllers\Management\RoleManagementController;
use App\Http\Controllers\Management\UserManagementController;
use App\Http\Controllers\RequestItemController;
use App\Http\Controllers\UserRequestController;
use App\Http\Requests\UserManagementRequest;
use App\Http\Requests\UserReqRequest;
use App\Models\Menu;
use App\Models\RequestType;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Role;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::redirect('/', 'dashboard', 301);

Route::name('auth.')->group(function () {
    Route::get('login', [LoginController::class, 'index'])->name('index');
    Route::post('login', [LoginController::class, 'authenticate'])->name('login');
});

Route::middleware(['auth'])->group(function () {
    // dashboard prefix
    Route::prefix('dashboard')->group(function () {
        Route::view('/', 'dashboard.index')->name('dashboard');
    });

    Route::group(['prefix' => 'management', 'as' => 'management.'], function () {
        // User Management
        Route::model('user', User::class);
        Route::resource('user', UserManagementController::class);

        // Role Management
        Route::model('role', Role::class);
        Route::resource('role', RoleManagementController::class);
        Route::put('role/{role}/permission', [RoleManagementController::class, 'updatePermissions'])->name('role.updatePermission');

        // Menu Management
        Route::model('menu', Menu::class);
        Route::resource('menu', MenuManagementController::class);

        // Request Type Management
        Route::model('request', RequestType::class);
        Route::resource('request-type', RequestTypeController::class, [
            'parameters' => [
                'request-type' => 'requestType'
            ]
        ]);
    });

    Route::group(['prefix' => 'account', 'as' => 'account.'], function () {
        // User Accout
        Route::get('profile', [UserAccountController::class, 'index'])->name('profile.index');
        Route::put('profile/{user}', [UserAccountController::class, 'edit'])->name('profile.edit');
        Route::put('profile/{user}/password', [UserAccountController::class, 'updatePassword'])->name('profile.changePassword');
    });

    Route::group(['prefix' => 'permohonan', 'as' => 'permohonan.'], function () {
        // Permohonan user
        Route::get('user', [UserRequestController::class, 'index'])->name('user.index');
        Route::post('user', [UserRequestController::class, 'store'])->name('user.store');
        Route::get('user/create', [UserRequestController::class, 'create'])->name('user.create');
        Route::get('user/show/{id}', [UserRequestController::class, 'show'])->name('user.show');
        Route::get('user/edit/{id}', [UserRequestController::class, 'edit'])->name('user.edit');
        Route::put('user/update/{id}', [UserRequestController::class, 'update'])->name('user.update');

        // Permohonan user item
        Route::post('user/items/{id}', [RequestItemController::class, 'store'])->name('item.store');
        Route::put('user/items/{id}', [RequestItemController::class, 'update'])->name('item.update');

        // Permohonan user on admin side
        Route::get('user/masuk', [UserRequestController::class, 'incommingRequest'])->name('user.incomming');
        Route::get('user/proses', [UserRequestController::class, 'processedRequest'])->name('user.processed');
        Route::get('user/selesai', [UserRequestController::class, 'doneRequest'])->name('user.done');

        Route::get('user/view/{id}', [UserRequestController::class, 'showAdminSide'])->name('user.view');
    });

    // logout
    Route::post('logout', [LoginController::class, 'logout'])->name('auth.logout');
});
