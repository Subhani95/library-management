<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DetailController;

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

Route::group(['middleware'=>['before_auth']], function() {
    Route::get('login', ['as' => 'login', 'uses' => 'App\Http\Controllers\UserController@login']);
    Route::get('register', ['as' => 'register', 'uses' => 'App\Http\Controllers\UserController@register']);

    Route::post('register-user', ['as' => 'registerUser', 'uses' => 'App\Http\Controllers\UserController@registerUser']);
    Route::post('login-user', ['as' => 'loginUser', 'uses' => 'App\Http\Controllers\UserController@loginUser']);


    Route::get('user', ['as' => 'user', 'uses' => 'App\Http\Controllers\UserController@userProfile']);


    Route::get('forgetpassword', ['as' => 'forgetpassword', 'uses' => 'App\Http\Controllers\UserController@forgetpassword']);
    Route::post('forgetpassword', ['as' => 'forgetpassword', 'uses' => 'App\Http\Controllers\ForgetPasswordController@forgetpassword']);



    Route::get('/send/email', ['as' => '/send/email', 'uses' => 'App\Http\Controllers\HomeController@mail']);

});


Route::group(['middleware'=>['after_auth']], function(){

    Route::get('dashboard',['as'=>'dashboard','uses'=>'App\Http\Controllers\UserController@dashboard']);
    Route::get('category', ['as' => 'category', 'uses' => 'App\Http\Controllers\UserController@category']);
    Route::get('bookshelf', ['as' => 'bookshelf', 'uses' => 'App\Http\Controllers\UserController@bookshelf']);
    Route::get('logout',['as'=>'logout','uses'=>'App\Http\Controllers\UserController@logout']);


    Route::post('addCategory', ['as' => 'addCategory', 'uses' => 'App\Http\Controllers\CategoryController@addCategory']);
    Route::get('viewCategory', ['as' => 'viewCategory', 'uses' => 'App\Http\Controllers\CategoryController@viewCategory']);
    Route::post('changeCategoryStatus/{id}',['as' => 'changeCategoryStatus', 'uses' => 'App\Http\Controllers\CategoryController@changeCategoryStatus']);





    Route::post('addBookShelf', ['as' => 'addBookShelf', 'uses' => 'App\Http\Controllers\BookShelfController@addBookShelf']);
    Route::get('viewBookShelf', ['as' => 'viewBookShelf', 'uses' => 'App\Http\Controllers\BookShelfController@viewBookShelf']);
    Route::post('changeShelfStatus/{id}',['as' => 'changeShelfStatus', 'uses' => 'App\Http\Controllers\BookShelfController@changeShelfStatus']);
    Route::get('editBookShelf/{id}', ['as' => 'editBookShelf', 'uses' => 'App\Http\Controllers\BookShelfController@editBookShelf']);
    Route::post('updateShelf',['as' => 'updateShelf', 'uses' => 'App\Http\Controllers\BookShelfController@updateShelf']);



    Route::get('books', ['as' => 'books', 'uses' => 'App\Http\Controllers\BookController@books']);
    Route::post('addBook', ['as' => 'addBook', 'uses' => 'App\Http\Controllers\BookController@addBook']);
    Route::get('viewBooks', ['as' => 'viewBooks', 'uses' => 'App\Http\Controllers\BookController@viewBooks']);
    Route::post('changeBookStatus/{id}',['as' => 'changeBookStatus', 'uses' => 'App\Http\Controllers\BookController@changeBookStatus']);
    Route::get('editbooks/{id}', ['as' => 'editbooks', 'uses' => 'App\Http\Controllers\BookController@editBooks']);
    Route::post('updateBook',['as' => 'updateBook', 'uses' => 'App\Http\Controllers\BookController@updateBook']);
    Route::get('bookDetail/{id}', ['as' => 'bookDetail', 'uses' => 'App\Http\Controllers\BookController@bookDetail']);

    Route::get('borrower', ['as' => 'borrower', 'uses' => 'App\Http\Controllers\BorrowerController@borrower']);
    Route::post('addBorrower', ['as' => 'addBorrower', 'uses' => 'App\Http\Controllers\BorrowerController@addBorrower']);
    Route::get('listingPage', ['as' => 'listingPage', 'uses' => 'App\Http\Controllers\BorrowerController@listingPage']);
    Route::post('changeBorrowerStatus/{id}',['as' => 'changeBorrowerStatus', 'uses' => 'App\Http\Controllers\BorrowerController@changeBorrowerStatus']);
    Route::get('viewBorrowerDetails/{id}', ['as' => 'viewBorrowerDetails', 'uses' => 'App\Http\Controllers\BorrowerController@viewBorrowerDetails']);


    Route::any('searchByCategory',['as'=>'searchByCategory','uses'=>'App\Http\Controllers\SearchController@searchByCategory']);
    Route::post('search',['as'=>'search','uses'=>'App\Http\Controllers\SearchController@search']);


});
