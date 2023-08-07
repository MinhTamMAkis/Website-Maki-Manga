<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DanhmucController;
use App\Http\Controllers\TruyenController;
use App\Http\Controllers\ChapterController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\TheLoaiController;

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

Route::get('/',[IndexController::class,'home']);
Route::get('/danh-muc/{slug}', [IndexController::class,'danhmuc']);
Route::get('/xem-truyen/{slug}', [IndexController::class,'xemtruyen'])->name('xem-truyen');
Route::get('/xem-truyen/{slug_truyen}/{slug_chapter}', [IndexController::class,'xemchapter']);
Route::get('/tim-kiem', [IndexController::class,'timkiem']);

Auth::routes();
Route::get('/admin', [HomeController::class, 'index'])->name('admin');

    
Route::resource('/danhmuc', DanhmucController::class);
Route::resource('/theloai', TheLoaiController::class);
Route::resource('/truyen', TruyenController::class);
Route::resource('/chapter', ChapterController::class);

