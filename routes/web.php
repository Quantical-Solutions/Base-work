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
    Route::get('/qs-concept', 'App\Http\Controllers\AboutUsController@index')
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

    //Presse
    Route::get('/presse', 'App\Http\Controllers\PresseController@index')
        ->name('presse');
    Route::get('/presse/{cat}', 'App\Http\Controllers\PresseController@category')
        ->name('presse-cat');
    Route::get('/presse/{cat}/{article}', 'App\Http\Controllers\PresseController@article')
        ->name('presse-article');

    //Events
    Route::get('/evenements', 'App\Http\Controllers\EventsController@index')
        ->name('events');
    Route::get('/evenements/{name}', 'App\Http\Controllers\EventsController@event')
        ->name('event');

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

    //Search
    Route::middleware(['auth:sanctum', 'verified'])->post('/recherche', 'App\Http\Controllers\Admin\SearchController@index')
        ->name('search');

    //Bibliotheque
    Route::middleware(['auth:sanctum', 'verified'])->get('/bibliotheque', 'App\Http\Controllers\Admin\BibliothequeController@index')
        ->name('bibliotheque');

    //Mooc
    Route::middleware(['auth:sanctum', 'verified'])->get('/mooc', 'App\Http\Controllers\Admin\MoocController@index')
        ->name('mooc');
    Route::middleware(['auth:sanctum', 'verified'])->post('/mooc', 'App\Http\Controllers\Admin\MoocController@getPost')
        ->name('mooc-post');

    //Calendars
    Route::middleware(['auth:sanctum', 'verified'])->get('/calendriers', 'App\Http\Controllers\Admin\CalendarsController@index')
        ->name('calendriers');

    //Drives
    Route::middleware(['auth:sanctum', 'verified'])->get('/drives', 'App\Http\Controllers\Admin\DriveController@index')
        ->name('drives');
    Route::middleware(['auth:sanctum', 'verified'])->post('/drives', 'App\Http\Controllers\Admin\DriveController@postForm')
        ->name('drives-post');

    //Drives
    Route::middleware(['auth:sanctum', 'verified'])->get('/visio', 'App\Http\Controllers\Admin\VisioController@index')
        ->name('visio');

    //IPs
    Route::middleware(['auth:sanctum', 'verified'])->get('/ips', 'App\Http\Controllers\Admin\IpsController@index')
        ->name('ips');

    //Settings
    Route::middleware(['auth:sanctum', 'verified'])->get('/informations', 'App\Http\Controllers\Admin\SettingsController@index')
        ->name('informations');

    //Backups
    Route::middleware(['auth:sanctum', 'verified'])->get('/backups', 'App\Http\Controllers\Admin\BackupsController@index')
        ->name('backups');

    //Users
    Route::middleware(['auth:sanctum', 'verified'])->get('/utilisateurs/{type}', 'App\Http\Controllers\Admin\UsersController@index')
        ->name('utilisateurs');
    Route::middleware(['auth:sanctum', 'verified'])->get('/utilisateurs/{type}/{mode}/{id?}', 'App\Http\Controllers\Admin\UsersController@mode')
        ->where(['mode' => '[a-z]+', 'id' => '[0-9]+'])
        ->name('utilisateur');

    //Clients / Providers
    Route::middleware(['auth:sanctum', 'verified'])->get('/societes/{type}', 'App\Http\Controllers\Admin\EntitiesController@index')
        ->name('clients-providers');
    Route::middleware(['auth:sanctum', 'verified'])->get('/societes/{type}/{mode}/{id?}', 'App\Http\Controllers\Admin\EntitiesController@mode')
        ->where(['mode' => '[a-z]+', 'id' => '[0-9]+'])
        ->name('client-provider');

    //Roles
    Route::middleware(['auth:sanctum', 'verified'])->get('/roles', 'App\Http\Controllers\Admin\RolesController@index')
        ->name('roles');
    Route::middleware(['auth:sanctum', 'verified'])->get('/roles/{mode}/{id?}', 'App\Http\Controllers\Admin\RolesController@mode')
        ->where(['mode' => '[a-z]+', 'id' => '[0-9]+'])
        ->name('role');

    //Categories
    Route::middleware(['auth:sanctum', 'verified'])->get('/categories', 'App\Http\Controllers\Admin\CategoriesController@index')
        ->name('categories');
    Route::middleware(['auth:sanctum', 'verified'])->get('/categories/{mode}/{id?}', 'App\Http\Controllers\Admin\CategoriesController@mode')
        ->where(['mode' => '[a-z]+', 'id' => '[0-9]+'])
        ->name('category');

    //Newsletters
    Route::middleware(['auth:sanctum', 'verified'])->get('/newsletters', 'App\Http\Controllers\Admin\NewsletterController@index')
        ->name('newsletters');
    Route::middleware(['auth:sanctum', 'verified'])->get('/newsletters/{mode}/{id?}', 'App\Http\Controllers\Admin\NewsletterController@mode')
        ->where(['mode' => '[a-z]+', 'id' => '[0-9]+'])
        ->name('newsletter');

    //Products
    Route::middleware(['auth:sanctum', 'verified'])->get('/produits', 'App\Http\Controllers\Admin\ProductsController@index')
        ->name('produits');
    Route::middleware(['auth:sanctum', 'verified'])->get('/produits/{mode}/{id?}', 'App\Http\Controllers\Admin\ProductsController@mode')
        ->where(['mode' => '[a-z]+', 'id' => '[0-9]+'])
        ->name('produit');

    //Learnings
    Route::middleware(['auth:sanctum', 'verified'])->get('/formations', 'App\Http\Controllers\Admin\LearningController@index')
        ->name('formations');
    Route::middleware(['auth:sanctum', 'verified'])->get('/formations/{mode}/{id?}', 'App\Http\Controllers\Admin\LearningController@mode')
        ->where(['mode' => '[a-z]+', 'id' => '[0-9]+'])
        ->name('formation');

    //Games
    Route::middleware(['auth:sanctum', 'verified'])->get('/games/{game}', 'App\Http\Controllers\Admin\GamesController@index')
        ->name('games');
    Route::middleware(['auth:sanctum', 'verified'])->get('/games/{game}/{mode}/{id?}', 'App\Http\Controllers\Admin\GamesController@mode')
        ->where(['mode' => '[a-z]+', 'id' => '[0-9]+'])
        ->name('game');

    //APIs
    Route::middleware(['auth:sanctum', 'verified'])->get('/apis', 'App\Http\Controllers\Admin\ApisController@index')
        ->name('apis');
    Route::middleware(['auth:sanctum', 'verified'])->get('/apis/{mode}/{id?}', 'App\Http\Controllers\Admin\ApisController@mode')
        ->where(['mode' => '[a-z]+', 'id' => '[0-9]+'])
        ->name('api');

    //Articles
    Route::middleware(['auth:sanctum', 'verified'])->get('/articles', 'App\Http\Controllers\Admin\ArticlesController@index')
        ->name('articles');
    Route::middleware(['auth:sanctum', 'verified'])->get('/articles/{mode}/{id?}', 'App\Http\Controllers\Admin\ArticlesController@mode')
        ->where(['mode' => '[a-z]+', 'id' => '[0-9]+'])
        ->name('article');

    //Presse
    Route::middleware(['auth:sanctum', 'verified'])->get('/presse', 'App\Http\Controllers\Admin\PresseController@index')
        ->name('presses');
    Route::middleware(['auth:sanctum', 'verified'])->get('/presse/{mode}/{id?}', 'App\Http\Controllers\Admin\PresseController@mode')
        ->where(['mode' => '[a-z]+', 'id' => '[0-9]+'])
        ->name('presse');

    //Pages
    Route::middleware(['auth:sanctum', 'verified'])->get('/pages', 'App\Http\Controllers\Admin\PagesController@index')
        ->name('pages');
    Route::middleware(['auth:sanctum', 'verified'])->get('/pages/{mode}/{id?}', 'App\Http\Controllers\Admin\PagesController@mode')
        ->where(['mode' => '[a-z]+', 'id' => '[0-9]+'])
        ->name('page');

    //Events
    Route::middleware(['auth:sanctum', 'verified'])->get('/events', 'App\Http\Controllers\Admin\EventsController@index')
        ->name('events-admin');
    Route::middleware(['auth:sanctum', 'verified'])->get('/events/{mode}/{id?}', 'App\Http\Controllers\Admin\EventsController@mode')
        ->where(['mode' => '[a-z]+', 'id' => '[0-9]+'])
        ->name('event-admin');

    //Emails
    Route::middleware(['auth:sanctum', 'verified'])->get('/emails', 'App\Http\Controllers\Admin\EmailsController@index')
        ->name('emails');
    Route::middleware(['auth:sanctum', 'verified'])->get('/emails/{mode}/{id?}', 'App\Http\Controllers\Admin\EmailsController@mode')
        ->where(['mode' => '[a-z]+', 'id' => '[0-9]+'])
        ->name('email');

    //Emails Models
    Route::middleware(['auth:sanctum', 'verified'])->get('/emails-models', 'App\Http\Controllers\Admin\EmailsModelsController@index')
        ->name('emails-models');
});

//XhrRequests
Route::post('xhrprotocol/{n}', 'App\Http\Controllers\XhrController@index')
    ->where('n', '[a-zA-Z]+')
    ->name('xhr');