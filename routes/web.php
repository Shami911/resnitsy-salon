<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\AdminController;
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

Route::get('/', [MainController::class, 'welcome']);
Route::get('/admin_panel', [AdminController::class, 'admin_panel']);
// Route::get('/admin_layout', [AdminController::class, 'admin_layout']);

Route::get('/admin_nav', [AdminController::class, 'admin_nav'])->name('admin_nav');
Route::post('/add_nav', [AdminController::class, 'add_nav']);
Route::post('/exit_nav/{id}', [AdminController::class, 'exit_nav']);
Route::get('/delete_nav/{id}', [AdminController::class, 'delete_nav']);

Route::get('/img_about', [AdminController::class, 'img_about'])->name('img_about');
Route::post('/add_img_about', [AdminController::class, 'add_img_about']);
Route::post('/exit_img_about/{id}', [AdminController::class, 'exit_img_about']);
Route::get('/delete_img_about/{id}', [AdminController::class, 'delete_img_about']);

Route::get('/count', [AdminController::class, 'count'])->name('count');
Route::post('/add_count', [AdminController::class, 'add_count']);
Route::post('/exit_count/{id}', [AdminController::class, 'exit_count']);
Route::get('/delete_count/{id}', [AdminController::class, 'delete_count']);

Route::get('/admin_service', [AdminController::class, 'admin_service'])->name('admin_service');
Route::post('/add_service', [AdminController::class, 'add_service']);
Route::post('/exit_service/{id}', [AdminController::class, 'exit_service']);
Route::get('/delete_service/{id}', [AdminController::class, 'delete_service']);

Route::get('/admin_title_service', [AdminController::class, 'admin_title_service'])->name('admin_title_service');
Route::post('/add_title_service', [AdminController::class, 'add_title_service']);
Route::post('/exit_title_service/{id}', [AdminController::class, 'exit_title_service']);
Route::get('/delete_title_service/{id}', [AdminController::class, 'delete_title_service']);

Route::get('/admin_section', [AdminController::class, 'admin_section'])->name('admin_section');
Route::post('/add_section', [AdminController::class, 'add_section']);
Route::post('/exit_section/{id}', [AdminController::class, 'exit_section']);
Route::get('/delete_section/{id}', [AdminController::class, 'delete_section']);


