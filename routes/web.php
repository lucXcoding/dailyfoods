<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\Backend\DisheController;
use App\Http\Controllers\Backend\RestaurantController;


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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});




require __DIR__.'/auth.php';
//Admin Routes Middleware
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'AdminDashboard'])->name('admin.dashboard');
    Route::get('/admin/logout', [AdminController::class, 'AdminLogout'])->name('admin.logout');
    Route::get('/admin/profile', [AdminController::class, 'Adminprofile'])->name('admin.profile');
    Route::post('/admin/profile/store', [AdminController::class, 'AdminprofileStore'])->name('admin.profile.store');
    Route::get('/admin/change/password', [AdminController::class, 'AdminChangePassword'])->name('admin.change.password');
    Route::post('/admin/update/password', [AdminController::class, 'AdminUpdatePassword'])->name('admin.update.password');

}); //end of admin middleware


//Manager Routes Middleware
Route::middleware(['auth', 'role:manager'])->group(function () {
    Route::get('/manager/dashboard', [ManagerController::class, 'ManagerDashboard'])->name('manager.dashboard');
    Route::get('/manager/logout', [ManagerController::class, 'ManagerLogout'])->name('manager.logout');

}); //end of manager middleware



Route::get('/admin/login', [AdminController::class, 'AdminLogin'])->name('admin.login');

//Restaurant Routes Middleware
/*
Route::middleware(['auth','role:admin'])->group(function(){

        Route::controller(RestaurantController::class)->group(function(){
         Route::get('/all/restaurant', 'AllRestaurant')->name('all.restaurant');
         Route::get('/add/restaurant', 'AddRestaurant')->name('add.restaurant');
         Route::post('/store/restaurant', 'Store')->name('store.restaurant');
         Route::get('/edit/restaurant/{id}', 'EditRestaurant')->name('edit.restaurant');
         Route::post('/update/restaurant/{id}', 'UpdateRestaurant')->name('update.restaurant');
         Route::get('/delete/restaurant/{id}', 'DeleteRestaurant')->name('delete.restaurant');

    });
});


});//end of restaurant middleware
*/

//Restaurant Routes Middleware
Route::middleware(['auth','role:admin'])->group(function(){

    Route::controller(RestaurantController::class)->group(function(){
      Route::get('/restaurant/index', 'Index')->name('restaurant.index');
      Route::get('/restaurant/create', 'Create')->name('restaurant.create');
        Route::post('/restaurant/store', 'Store')->name('restaurant.store');
        Route::get('/restaurant/show/{id}', 'Show')->name('restaurant.show');
        Route::get('/restaurant/edit/{id}', 'Edit')->name('restaurant.edit');
        Route::post('/restaurant/update/{id}', 'Update')->name('restaurant.update');
        Route::get('/restaurant/delete/{id}', 'Delete')->name('restaurant.delete');
    });
});//end of restaurant middleware


//Dish Routes Middleware
Route::middleware(['auth','role:admin'])->group(function(){

    Route::controller(DisheController::class)->group(function(){
        Route::get('/all/dish', 'AllDish')->name('all.dish');
        Route::get('/add/dish', 'AddDish')->name('add.dish');
        Route::post('/store/dish', 'Store')->name('store.dish');
        Route::get('/edit/dish/{id}', 'EditDish')->name('edit.dish');
    });

});//end of dish middleware
