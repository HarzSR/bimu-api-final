<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('/admin/dashboard');
    // return view('welcome');
});

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::match(['get', 'post'], '/iot-push', [App\Http\Controllers\InputController::class, 'store']);

Route::prefix('/admin')->namespace('Admin')->group(function ()
{
    Route::match(['get', 'post'], '/', [App\Http\Controllers\Admin\AdminController::class, 'login'])->name('Login');
    Route::group(['middleware' => ['admin']], function()
    {
        Route::get('/dashboard', [App\Http\Controllers\Admin\AdminController::class, 'dashboard'])->name('Dashboard');
        Route::get('/logout', [App\Http\Controllers\Admin\AdminController::class, 'logout']);

        Route::get('/view-admins', [App\Http\Controllers\Admin\AdminController::class, 'viewAdmins'])->name('View Admins');

        Route::get('/view-users', [App\Http\Controllers\Admin\UserController::class, 'viewUsers'])->name('View Users');

        Route::get('/view-tags', [App\Http\Controllers\TagsController::class, 'viewTags'])->name('View Tags');

        Route::get('/view-locations', [App\Http\Controllers\LocationsController::class, 'viewLocations'])->name('View Locations');

        Route::get('/view-logs', [App\Http\Controllers\LogsController::class, 'viewLogs'])->name('View Logs');
    });
});
