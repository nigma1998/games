<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ViewController;
use App\Http\Controllers\NpsController;
use App\Http\Controllers\ProbaController;
use App\Http\Controllers\CanteenController;
use App\Http\Controllers\DiamondController;
use App\Http\Controllers\TimController;
use App\Http\Controllers\Admin\GlobalController as AdminGlobalController;
use App\Http\Controllers\Admin\NpsController as AdminNpsController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Admin\SchablonController as AdminSchablonControllerController;


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
    return view('welcome');
});

Auth::routes();
Route::group(['prefix' => 'admins', 'as' => 'admin.'], function(){
Route::resource('global', AdminGlobalController::class);
Route::resource('nps', AdminNpsController::class);
Route::resource('users', AdminUserController::class);
Route::resource('schablon', AdminSchablonControllerController::class);
});

Route::group(['prefix' => 'canteen', 'as' => 'canteen.'], function(){
Route::resource('canteen', CanteenController::class);

  });


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'gem', 'as' => 'gem.'], function(){
Route::resource('gem', CartController::class);
Route::resource('nonesk', NpsController::class);
Route::resource('taim', TimController::class);
Route::resource('proba', ProbaController::class);
Route::resource('diamond', DiamondController::class);
  });



//Route::get('/gem', [CartController::class, 'index'])->name('gem');
//Route::get('/gem/create', [CartController::class, 'create'])->name('create');
//Route::get('/gem/view', [CartController::class, 'edit'])->name('edit');
//Route::post('/gem/store', [CartController::class, 'store'])->name('store');


Route::resource('view', ViewController::class);
