<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Frontend\ArticleController;
use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CronController;
use App\Http\Controllers\WalletController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Panel\UserAddresController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\SocialLoginController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\Admin\ConstantManagement\WorldController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\UtilityController; 
use App\Http\Controllers\Cron\LorryReceiptController;
use App\Http\Controllers\Cron\DeviceController;
use App\Http\Controllers\Cron\TripController;

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
Route::get('/qb', function () {
    return view('frontend.map');

});

    //Devices route start
    Route::group(['prefix' => 'cron'], function () {
        Route::get('/lr/sync',[LorryReceiptController::class,'syncLR']);
        Route::get('/devices/sync',[DeviceController::class,'syncDevices']);
        Route::get('/trip/distance-calc',[TripController::class,'calcDistance']);
    });

    Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
        \UniSharp\LaravelFilemanager\Lfm::routes();
    });

    Route::group(['prefix' => 'utility', ], function (){
        Route::get('clear-column/{modal_name}/{column_name}/{id}',[UtilityController::class,'clearColumn']);
        });
    
        Route::get('cron/lorry-receipts/sync', [CronController::class,'lorryReceipt']);
        Route::get('cron/device-logger/sync', [CronController::class,'deviceLogger']);

        Route::get('cron/placement/create/', [CronController::class,'placementCreate']);





    // Frontend Route Start-------------------------------------------------------------------------------------
        Route::get('/', [HomeController::class,'index'])->name('index');
        Route::get('/introduction', [HomeController::class,'introduction'])->name('introduction');
        Route::get('/trait-check', [HomeController::class,'taritCheck']);

        Route::get('login', [LoginController::class,'showLoginForm'])->name('login');
        Route::post('login', [LoginController::class,'login']);
        Route::get('register', [RegisterController::class,'showRegistrationForm'])->name('register');
        Route::post('register', [RegisterController::class,'register']);
        Route::get('password/forget', function () {
            return view('global.forgot-password');
        })->name('password.forget');
        Route::post('password/email', [ForgotPasswordController::class,'sendResetLinkEmail'])->name('password.email');
        Route::get('password/reset/{token}', [ResetPasswordController::class,'showResetForm'])->name('password.reset');
        Route::post('password/reset', [ResetPasswordController::class,'reset'])->name('password.update');
        
    // Frontend Route END-------------------------------------------------------------------------------------
        
        Route::group(['middleware' => 'auth'], function () {
            // logout route
            Route::get('/logout', [LoginController::class,'logout']);
        });

    Route::get('get-states', [WorldController::class,'getStates'])->name('world.get-states');
    Route::get('get-cities', [WorldController::class,'getCities'])->name('world.get-cities');

Route::get('/offline', function () { return view('vendor/laravelpwa/offline'); });

Route::get('/page/{slug}', [HomeController::class,'page'])->name('page.slug');
//  Routes For Backend only

Route::group([], function () {
    require_once(__DIR__ . '/panel.php');
    require_once(__DIR__ . '/crudgen.php');
});
Route::get('/sms/verify', function () {
    return view('global.500');
});