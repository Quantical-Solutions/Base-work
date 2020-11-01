<?php

use Illuminate\Support\Facades\Route;

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

Route::group(array('domain' => config('app.url')), function(){

    //Home
    Route::get('/', 'App\Http\Controllers\HomeController@index')
        ->name('home');

    //About us
    Route::get('/about-us', 'App\Http\Controllers\AboutUsController@index')
        ->name('about-us');

    //Products
    Route::get('/produits', 'App\Http\Controllers\ProductsController@index')
        ->name('products');
    Route::get('/produits/{cat}', 'App\Http\Controllers\ProductsController@category')
        ->name('products-cat');
    Route::get('/produits/{cat}/{product}', 'App\Http\Controllers\ProductsController@solo')
        ->name('product');

    //Learnings
    Route::get('/formations', 'App\Http\Controllers\LearningController@index')
        ->name('learnings');
    Route::get('/formations/{cat}', 'App\Http\Controllers\LearningController@category')
        ->name('learnings-cat');
    Route::get('/formations/{cat}/{learning}', 'App\Http\Controllers\LearningController@solo')
        ->name('learning');

    //Blog
    Route::get('/articles', 'App\Http\Controllers\BlogController@index')
        ->name('blog');
    Route::get('/articles/{cat}', 'App\Http\Controllers\BlogController@category')
        ->name('blog-cat');
    Route::get('/articles/{cat}/{article}', 'App\Http\Controllers\BlogController@article')
        ->name('article');

    //Contact
    Route::get('/contact', 'App\Http\Controllers\ContactController@index')
        ->name('contact');
    Route::post('/contact', 'App\Http\Controllers\ContactController@post')
        ->name('contact-post');

    //Recherche
    Route::get('/recherche', 'App\Http\Controllers\SearchController@index')
        ->name('search');
    Route::post('/recherche', 'App\Http\Controllers\SearchController@post')
        ->name('search-post');

    //Mentions légales
    Route::get('/mentions-legales', 'App\Http\Controllers\MentionsController@index')
        ->name('mentions');

    //CGU
    Route::get('/cgu', 'App\Http\Controllers\CguController@index')
        ->name('cgu');

    //RGPD
    Route::get('/rgpd', 'App\Http\Controllers\RgpdController@index')
        ->name('rgpd');
});


Route::group(array('domain' => config('app.admin')), function(){

    //Challenge
    Route::middleware(['auth:sanctum', 'verified'])->get('/challenge', 'App\Http\Controllers\Admin\ChallengeController@index')
        ->name('Challenge');
    Route::middleware(['auth:sanctum', 'verified'])->post('/challenge', 'App\Http\Controllers\Admin\ChallengeController@verified')
        ->name('Challenge-verified');

    //Dashboard
    Route::middleware(['auth:sanctum', 'verified'])->get('/', 'App\Http\Controllers\Admin\DashboardController@index')
        ->name('dashboard');

    //Users
    Route::middleware(['auth:sanctum', 'verified'])->get('/users', 'App\Http\Controllers\Admin\UsersController@index')
        ->name('users');
    Route::middleware(['auth:sanctum', 'verified'])->get('/users/{mode}/{id}', 'App\Http\Controllers\Admin\UsersController@mode')
        ->where(['mode' => '[a-z]+', 'id' => '[0-9]+'])
        ->name('user');

    //Roles
    Route::middleware(['auth:sanctum', 'verified'])->get('/roles', 'App\Http\Controllers\Admin\RolesController@index')
        ->name('roles');
    Route::middleware(['auth:sanctum', 'verified'])->get('/role/{mode}/{id}', 'App\Http\Controllers\Admin\RolesController@mode')
        ->where(['mode' => '[a-z]+', 'id' => '[0-9]+'])
        ->name('role');

    //Products
    Route::middleware(['auth:sanctum', 'verified'])->get('/products', 'App\Http\Controllers\Admin\ProductsController@index')
        ->name('products');
    Route::middleware(['auth:sanctum', 'verified'])->get('/product/{mode}/{id}', 'App\Http\Controllers\Admin\ProductsController@mode')
        ->where(['mode' => '[a-z]+', 'id' => '[0-9]+'])
        ->name('product');

    //Learnings
    Route::middleware(['auth:sanctum', 'verified'])->get('/learnings', 'App\Http\Controllers\Admin\LearningController@index')
        ->name('learnings');
    Route::middleware(['auth:sanctum', 'verified'])->get('/learning/{mode}/{id}', 'App\Http\Controllers\Admin\LearningController@mode')
        ->where(['mode' => '[a-z]+', 'id' => '[0-9]+'])
        ->name('learning');

    //Articles
    Route::middleware(['auth:sanctum', 'verified'])->get('/articles', 'App\Http\Controllers\Admin\ArticlesController@index')
        ->name('articles');
    Route::middleware(['auth:sanctum', 'verified'])->get('/article/{mode}/{id}', 'App\Http\Controllers\Admin\ArticlesController@mode')
        ->where(['mode' => '[a-z]+', 'id' => '[0-9]+'])
        ->name('article');

    //Pages
    Route::middleware(['auth:sanctum', 'verified'])->get('/pages', 'App\Http\Controllers\Admin\PagesController@index')
        ->name('pages');
    Route::middleware(['auth:sanctum', 'verified'])->get('/page/{mode}/{id}', 'App\Http\Controllers\Admin\PagesController@mode')
        ->where(['mode' => '[a-z]+', 'id' => '[0-9]+'])
        ->name('page');

    //Emails
    Route::middleware(['auth:sanctum', 'verified'])->get('/emails', 'App\Http\Controllers\Admin\EmailsController@index')
        ->name('emails');
    Route::middleware(['auth:sanctum', 'verified'])->get('/email/{mode}/{id}', 'App\Http\Controllers\Admin\EmailsController@mode')
        ->where(['mode' => '[a-z]+', 'id' => '[0-9]+'])
        ->name('email');
});

//XhrRequests
Route::post('xhrprotocol/{n}', 'App\Http\Controllers\XhrController@index')
    ->where('n', '[a-zA-Z]+')
    ->name('xhr');