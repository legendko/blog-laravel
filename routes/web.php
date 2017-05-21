<?php

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

Route::get('logout', [
    'as' => 'logout', 
    'uses' => 'Auth\LoginController@logout'
    ]);
Route::get('blog/{slug}', [
    'as' => 'blog.single',
    'uses' => 'BlogController@getSingle'
])->where('slug', '[\w\d\-\_]+');
Route::get('blog', [
    'uses' => 'BlogController@getIndex',
    'as' => 'blog.index'
]);

Route::get('contact', ['as' => 'contact', 'uses' => 'PagesController@getContact']);
Route::get('about', ['as' => 'about', 'uses' => 'PagesController@getAbout']);
Route::get('/', 'PagesController@getIndex', ['as' => '/']);

Route::post('comments/{post_id}', [
    'uses' => 'CommentsController@store',
    'as' => 'comments.store'
]);
Route::get('comments/{id}/edit', [
    'uses' => 'CommentsController@edit',
    'as' => 'comments.edit'
]);
Route::put('comments/{id}', [
    'uses' => 'CommentsController@update',
    'as' => 'comments.update'
]);
Route::get('comments/{id}', [
    'uses' => 'CommentsController@destroy',
    'as' => 'comments.destroy'
]);

Route::resource('posts', 'PostController');
Route::resource('categories', 'CategoryController', ['except' => ['create']]);
Route::resource('tags', 'TagController', ['except' => ['create']]);

Auth::routes();

Route::get('/home', ['as' => 'home', 'uses' => 'PagesController@getIndex']);

