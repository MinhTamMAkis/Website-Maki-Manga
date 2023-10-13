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
Route::get('/all_comic',[IndexController::class,'comic_all']);
Route::get('/danh-muc/{slug}', [IndexController::class,'danhmuc']);
Route::get('/xem-truyen/{slug}', [IndexController::class,'xemtruyen']);
Route::get('/xem-truyen/{slug_truyen}/{slug_chapter}', [IndexController::class,'xemchapter']);
Route::post('/tim-kiem', [IndexController::class,'timkiem']);
Route::post('/timkiem-ajax', [IndexController::class,'search_ajax']);

Route::get('/bookmark',[IndexController::class,'bookmark']);

Route::get('/truyen/chapter/create/{id}', [TruyenController::class,'createchapter'])->name('truyen.chapter.create');
Route::get('/truyen/{id}/view_chapter', [TruyenController::class,'view_chapter'])->name('truyen.view_chapter');
Auth::routes();
Route::get('/admin', [HomeController::class, 'index'])->name('admin');
Route::post('/search-admin', [HomeController::class, 'search'])->name('search');
    
Route::resource('/danhmuc', DanhmucController::class);
Route::resource('/theloai', TheLoaiController::class);
Route::resource('/truyen', TruyenController::class);
Route::resource('/chapter', ChapterController::class);


