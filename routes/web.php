<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\catergoryController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\RoleController;
use Laravel\Socialite\Facades\Socialite;
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




Route::get('switchLang/{lang}' , function($lang=null){
    App()->setlocale($lang);
    session()->put('locale',$lang);
    return redirect()->back();
});
Route::get('/dashboard', [dashboardController::class , 'index'])->name('dashboard')->middleware('auth');
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::group(['prefix'=>'products','middleware'=>['auth']] , function(){
    Route::get('' , [ProductsController::class , 'index'] )->name('products.index');
    Route::get('create' , [ProductsController::class , 'create'])->name('product.create');
    Route::post('store' , [ProductsController::class , 'store'])->name('product.store');
    Route::get('edit/{product}' , [ProductsController::class , 'edit'])->name('product.edit');
    Route::post('update' , [ProductsController::class , 'update'])->name('product.update');
    Route::get('delete' , [ProductsController::class , 'softDelete'])->name('product.delete');
    Route::get('trach' , [ProductsController::class , 'trach'])->name('products.trach');
    Route::get('restore' , [ProductsController::class , 'restore'])->name('product.restore');
    Route::get('hard-delete' , [ProductsController::class , 'hardDelete'])->name('product.hardDelete');
});


Route::group(['prefix'=>'categories' , 'middleware'=>['auth']] , function(){
    Route::get('' , [catergoryController::class , 'index'])->name('category.index');
    Route::get('create' , [catergoryController::class , 'create'])->name('category.create');
    Route::post('store' , [catergoryController::class , 'store'])->name('category.store');
    Route::get('edit' , [catergoryController::class , 'edit'])->name('category.edit');
    Route::post('update' , [catergoryController::class , 'update'])->name('category.update');
    Route::get('soft-delete' , [catergoryController::class , 'softDelete'])->name('category.softDelete');
    Route::get('trach' , [catergoryController::class , 'trach'])->name('category.trach');
    Route::post('restore' , [catergoryController::class , 'restore'])->name('category.restore');
    Route::delete('hard-delete' , [catergoryController::class , 'hardDelete'])->name('category.hardDelete');
});


Route::group(['prefix'=>'units' , 'middleware'=>['auth']] , function(){
    Route::get('' , [UnitController::class , 'index'])->name('unit.index');
    Route::get('create' , [UnitController::class , 'create'])->name('unit.create');
    Route::post('store' , [UnitController::class , 'store'])->name('unit.store');
    Route::get('edit' , [UnitController::class , 'edit'])->name('unit.edit');
    Route::post('update' , [UnitController::class , 'update'])->name('unit.update');
    Route::get('soft-delete' , [UnitController::class , 'softDelete'])->name('unit.softDelete');
    Route::get('trach' , [UnitController::class , 'trach'])->name('unit.trach');
    Route::post('restore' , [UnitController::class , 'restore'])->name('unit.restore');
    Route::delete('hard-delete' , [UnitController::class , 'hardDelete'])->name('unit.hardDelete');
});


Route::group(['prefix'=>'roles' , 'middleware'=>['auth']] , function(){
    Route::get('' , [RoleController::class , 'index'])->name('role.index');
    Route::get('create' , [RoleController::class , 'create'])->name('role.create');
    Route::post('store' , [RoleController::class , 'store'])->name('role.store');
    Route::get('edit' , [RoleController::class , 'edit'])->name('role.edit');
    Route::post('update' , [RoleController::class , 'update'])->name('role.update');
    Route::get('soft-delete' , [RoleController::class , 'softDelete'])->name('role.softDelete');
    Route::get('trach' , [RoleController::class , 'trach'])->name('role.trach');
    Route::post('restore' , [RoleController::class , 'restore'])->name('role.restore');
    Route::delete('hard-delete' , [RoleController::class , 'hardDelete'])->name('role.hardDelete');
});

Route::get('/auth/redirect', function () {
    return Socialite::driver('github')->redirect();
});
 
Route::get('/auth/callback', function () {
    $user = Socialite::driver('github')->user();
 
    dd($user);
    $user = User::updateOrCreate([
        'github_id' => $githubUser->id,
    ], [
        'name' => $githubUser->name,
        'email' => $githubUser->email,
        'github_token' => $githubUser->token,
        'github_refresh_token' => $githubUser->refreshToken,
    ]);
 
    Auth::login($user);
 
    return redirect('/dashboard');
    // $user->token

});

Route::get('logout', [LoginController::class ,'logout'])->name('logout');