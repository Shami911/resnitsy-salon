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

<<<<<<< HEAD
Route::get('/portfolio', [AdminController::class, 'portfolio'])->name('portfolio');
Route::post('/add_portfolio', [AdminController::class, 'add_portfolio']);
Route::post('/exit_sportfolio/{id}', [AdminController::class, 'exit_portfolio']);
Route::get('/delete_portfolio/{id}', [AdminController::class, 'delete_portfolio']);

Route::get('/PortfolioCard', [AdminController::class, 'PortfolioCard'])->name('PortfolioCard');
Route::post('/add_CardPotfolio', [AdminController::class, 'add_CardPotfolio']);
Route::post('/exit_CardPotfolio/{id}', [AdminController::class, 'exit_CardPotfolio']);
Route::get('/delete_CardPotfoliot/{id}', [AdminController::class, 'delete_CardPotfoliot']);

Route::get('/admin_card_app', [AdminController::class, 'admin_card_app'])->name('admin_card_app');
Route::post('/add_CardApp', [AdminController::class, 'add_CardApp']);
Route::post('/exit_CardApp/{id}', [AdminController::class, 'exit_CardApp']);
Route::get('/delete_CardApp/{id}', [AdminController::class, 'delete_CardApp']);

Route::get('/admin_card_web', [AdminController::class, 'admin_card_web'])->name('admin_card_web');
Route::post('/add_card_web', [AdminController::class, 'add_card_web']);
Route::post('/exit_card_web/{id}', [AdminController::class, 'exit_card_web']);
Route::get('/delete_card_web/{id}', [AdminController::class, 'delete_card_web']);
=======
Route::get('/reviews', [AdminController::class, 'reviews'])->name('reviews');
Route::post('/add_reviews', [AdminController::class, 'add_reviews']);
Route::post('/exit_reviews/{id}', [AdminController::class, 'exit_reviews']);
Route::get('/delete_reviews/{id}', [AdminController::class, 'delete_reviews']);

Route::get('/comment', [AdminController::class, 'comment'])->name('comment');
Route::post('/add_comment', [AdminController::class, 'add_comment']);
Route::post('/exit_comment/{id}', [AdminController::class, 'exit_comment']);
Route::get('/delete_comment/{id}', [AdminController::class, 'delete_comment']);

Route::get('/main_faq', [AdminController::class, 'main_faq'])->name('main_faq');
Route::post('/add_faq', [AdminController::class, 'add_faq']);
Route::post('/exit_faq/{id}', [AdminController::class, 'exit_faq']);
Route::get('/delete_faq/{id}', [AdminController::class, 'delete_faq']);

Route::get('/title_faq', [AdminController::class, 'title_faq'])->name('title_faq');
Route::post('/add_title_faq', [AdminController::class, 'add_title_faq']);
Route::post('/exit_title_faq/{id}', [AdminController::class, 'exit_title_faq']);
Route::get('/delete_title_faq/{id}', [AdminController::class, 'delete_title_faq']);


Route::get('/pricing_title', [AdminController::class, 'pricing_title'])->name('pricing_title');
Route::post('/add_pricing_title', [AdminController::class, 'add_pricing_title']);
Route::post('/exit_pricing_title/{id}', [AdminController::class, 'exit_pricing_title']);
Route::get('/delete_pricing_title/{id}', [AdminController::class, 'delete_pricing_title']);

Route::get('/price', [AdminController::class, 'price'])->name('price');
Route::post('/add_price', [AdminController::class, 'add_price']);
Route::post('/exit_price/{id}', [AdminController::class, 'exit_price']);
Route::get('/delete_price/{id}', [AdminController::class, 'delete_price']);

Route::get('/price_two', [AdminController::class, 'price_two'])->name('price_two');
Route::post('/add_price_two', [AdminController::class, 'add_price_two']);
Route::post('/exit_price_two/{id}', [AdminController::class, 'exit_price_two']);
Route::get('/delete_price_two/{id}', [AdminController::class, 'delete_price_two']);

Route::get('/price_three', [AdminController::class, 'price_three'])->name('price_three');
Route::post('/add_price_three', [AdminController::class, 'add_price_three']);
Route::post('/exit_price_three/{id}', [AdminController::class, 'exit_price_three']);
Route::get('/delete_price_three/{id}', [AdminController::class, 'delete_price_three']);

Route::get('/price_four', [AdminController::class, 'price_four'])->name('price_four');
Route::post('/add_price_four', [AdminController::class, 'add_price_four']);
Route::post('/exit_price_four/{id}', [AdminController::class, 'exit_price_four']);
Route::get('/delete_price_four/{id}', [AdminController::class, 'delete_price_four']);
>>>>>>> 4564f87a3dfd56f788f9d52891de25fdf051fda5
