<?php

use App\Http\Controllers\StockController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Supplier\SupplierController;

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

//normal user routes
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/add-to-cart/{id}', [StockController::class, 'addToCart']);
Route::get('/shopping-cart', [StockController::class, 'shoppingCart']);
Route::post('/buy-item', [StockController::class, 'buyItems']);
Route::get('/my-orders', [UserController::class, 'myProfile']);
Route::get('/reduce-by-one/{id}', [StockController::class, 'getReduceByOne']);
Route::get('/remove-item/{id}', [StockController::class, 'getRemoveItem']);

//admin routes
Route::group(['middleware' =>['auth', 'admin']], function(){

//    Route::get('/dash', function(){
//
//        return view('admin.home');
//    });
    Route::get('/dash', [AdminController::class, 'index']);

    Route::get('/addsupplier' , [App\Http\Controllers\Admin\AdminController::class, 'addSupplier'])->name('addSupplier');
   // Route::get('/edit-user/{id}' , [App\Http\Controllers\Admin\AdminController::class, 'editUSer'])->name('editUser');
    Route::get('/edit-user/{id}', [AdminController::class, 'editUser']);
    Route::put('/update-user/{id}', [AdminController::class, 'updateUser']);
    //stock routes
    Route::get('/add-to-stock-list', [StockController::class, 'addToStockList']);
    Route::get('/add-to-stock/{id}', [StockController::class, 'addToStock']);
    Route::post('/add-item/{id}', [StockController::class, 'addItem']);
    Route::post('/add-suppliable-item', [AdminController::class, 'addSuppliableItem']);
    Route::get('/view-item/{id}', [AdminController::class, 'viewSuppliedItemDetails']);
    Route::get('/pay-supplier-view/{id}', [AdminController::class, 'paySupplierView']);
    Route::put('/pay-supplier/{id}', [AdminController::class, 'paySupplier']);
    Route::get('/manage-supplier', [AdminController::class, 'manageSupplier']);
    Route::get('/manage-stock', [StockController::class, 'manageStock']);
    Route::get('/edit-stock/{id}', [StockController::class, 'editStock']);
    Route::put('/update-stock/{id}', [StockController::class, 'updateStock']);
    Route::delete('/delete-stock/{id}', [StockController::class, 'deleteStock']);
    Route::get('/orders', [StockController::class, 'getOrders']);
});

//supplier routes
Route::group(['middleware' =>['auth', 'supplier']], function(){
    Route::get('/supplier-dash', [SupplierController::class, 'index']);
    Route::get('/select-item', [SupplierController::class, 'selectItem']);
    Route::post('/supply-item', [SupplierController::class, 'supplyItem']);
    Route::get('/recently-supplied', [SupplierController::class, 'showRecentlySuppliedItem']);
    Route::get('/edit-row/{id}', [SupplierController::class, 'editRow']);
    Route::put('/update-row/{id}', [SupplierController::class, 'updateRow']);

});
