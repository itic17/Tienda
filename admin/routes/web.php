<?php

use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\FrontProductsController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ProvidersController;
use App\Http\Controllers\VariantsController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
})->name('home');

Route::get('/front/products', [FrontProductsController::class, 'list'])->name('front.products.list');
Route::get('/front/products/{hashProduct}', [FrontProductsController::class, 'show'])->name('front.products.show');

Route::middleware(['auth:sanctum', 'verified',])
    ->group(function () {
        Route::get('/dashboard', function () {
            return Inertia::render('Dashboard');
        })->name('dashboard');

        /*Productos*/
        Route::get('/products', [ ProductsController::class, 'show' ])->name('products');
        Route::post('/product/remove', [ ProductsController::class, 'delete' ])->name('product.delete');
        Route::post('/product/edit', [ ProductsController::class, 'edit' ])->name('product.edit');
        Route::post('/product/add', [ ProductsController::class, 'add' ])->name('product.add');

        /*Categorias*/
        Route::get('/categories', [ CategoriesController::class, 'show' ])->name('categories');
        Route::post('/categories/remove', [ CategoriesController::class, 'delete' ])->name('category.delete');
        Route::post('/categories/edit', [ CategoriesController::class, 'edit' ])->name('category.edit');
        Route::post('/categories/add', [ CategoriesController::class, 'add' ])->name('category.add');

        /*Variantes*/
        Route::get('/variants', [ VariantsController::class, 'show' ])->name('variants');
        Route::post('/variants/remove', [ VariantsController::class, 'delete' ])->name('variant.delete');
        Route::post('/variants/edit', [ VariantsController::class, 'edit' ])->name('variant.edit');
        Route::post('/variants/add', [ VariantsController::class, 'add' ])->name('variant.add');

        /*Provedores*/
        Route::get('/providers', [ ProvidersController::class, 'show' ])->name('providers');
        Route::post('/providers/remove', [ ProvidersController::class, 'delete' ])->name('provider.delete');
        Route::post('/providers/edit', [ ProvidersController::class, 'edit' ])->name('provider.edit');
        Route::post('/providers/add', [ ProvidersController::class, 'add' ])->name('provider.add');
    });
