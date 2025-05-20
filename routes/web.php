<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\PerfumeController;
use App\Http\Controllers\Admin\GlassController;
use App\Http\Controllers\Admin\CompanyController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\SpertoController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\user_profile_controller;
use Illuminate\Support\Facades\Route;


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
    return redirect()->route('perfume.index');
});

Route::get('/dashboard', function () {
    return redirect()->route('perfume.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';



Route::fallback(function(){
    return"Page Not Found";
});


Route::resource('perfume',PerfumeController::class);
Route::resource('glass',GlassController::class);
Route::resource('order',OrderController::class);
Route::resource('sperto',SpertoController::class);
Route::resource('company',CompanyController::class);
Route::resource('customer',CustomerController::class);

Route::get('perfume/soft/delete/{id}', [PerfumeController::class,'softDelete'])
->name('soft.delete');

Route::get('glass/soft/delete/{id}', [GlassController::class,'softDelete'])
->name('glass.soft.delete');

Route::get('order/soft/delete/{id}', [OrderController::class,'softDelete'])->name('order.soft.delete');

Route::get('sperto/soft/delete/{id}', [SpertoController::class,'softDelete'])->name('sperto.soft.delete');

Route::get('company/soft/delete/{id}', [CompanyController::class,'softDelete']);
// ->name(soft.delete);

Route::get('customer/soft/delete/{id}', [CustomerController::class,'softDelete']);
// ->name(soft.delete);

Route::get('perfume/trash', [PerfumeController::class, 'trashedPerfume'])->name('perfume.trash');
Route::get('sperto/tr',[SpertoController::class,'trashedSperto'])->name('sperto.trash');
Route::get('order/trash',[OrderController::class,'trash'])->name('order.trash');
Route::get('glass/trash',[GlassController::class,'trash'])->name('glass.trash');
Route::get('customer/trash',[CustomerController::class,'trash'])->name('customer.trash');
Route::get('company/trash',[CompanyController::class,'trash'])->name('company.trash');

Route::get('perfume/restore/{$id}',[PerfumeController::class,'restore'])->name('perfume.restore');
Route::get('glass/restore/{$id}',[GlassController::class,'restore'])->name('glass.restore');
Route::get('sperto/restore/{$id}',[SpertoController::class,'restore'])->name('sperto.restore');
Route::get('order/restore/{$id}',[OrderController::class,'restore'])->name('order.restore');
Route::get('customer/restore/{$id}',[CustomerController::class,'restore'])->name('customer.restore');
Route::get('company/restore/{$id}',[CompanyController::class,'restore'])->name('company.restore');


Route::get('customer/force/delete/{id}', [CustomerController::class,'forceDelete'])->name('customer.forceDelete');
Route::get('company/force/delete/{id}', [CompanyController::class,'forceDelete'])->name('company.forceDelete');
Route::get('glass/force/delete/{id}', [GlassController::class,'forceDelete'])->name('glass.forceDelete');
Route::get('order/force/delete/{id}', [OrderController::class,'forceDelete'])->name('order.forceDelete');
Route::get('perfume/force/delete/{id}', [PerfumeController::class,'forceDelete'])->name('perfume.forceDelete');
Route::get('sperto/force/delete/{id}', [SpertoController::class,'forceDelete'])->name('sperto.forceDelete');

Route::get('prof',[user_profile_controller::class,'edit'])->name('profile');
Route::put('prof',[user_profile_controller::class,'update']);



Route::get('lang/{locale}', function ($locale) {
    if (in_array($locale, ['en', 'ar'])) {
        session()->put('locale', $locale);
    }
    return redirect()->back();
})->name('lang.switch');

