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


/*
//文章列表页
Route::get('/posts','\App\Http\Controllers\PostsController@index');
//创建文章
Route::get('/posts/create','\App\Http\Controllers\PostsController@create');
Route::posts('/posts','\App\Http\Controllers\PostsController@store');
//文章详情页
Route::get('/posts/{posts}','\App\Http\Controllers\PostsController@show');

//编辑文章
Route::get('/posts/{posts}/edit','\App\Http\Controllers\PostsController@edit');
Route::put('/posts/{posts}','\App\Http\Controllers\PostsController@update');
//删除文章
Route::get('/posts/delete','\App\Http\Controllers\PostsController@delete');
*/
Route::resource('posts','PostsController');



Route::get('/', 'StaticPagesController@home')->name('home');
Route::get('/help', 'StaticPagesController@help')->name('help');
Route::get('/about', 'StaticPagesController@about')->name('about');

Route::get('signup', 'UsersController@create')->name('signup');

Route::resource('users', 'UsersController');
/*
 * 等同于
 *  Route::get('/users', 'UsersController@index')->name('users.index');
 *  Route::get('/users/{user}', 'UsersController@show')->name('users.show');
 *  Route::get('/users/create', 'UsersController@create')->name('users.create');
 *  Route::posts('/users', 'UsersController@store')->name('users.store');
 *  Route::get('/users/{user}/edit', 'UsersController@edit')->name('users.edit');
 * Route::patch('/users/{user}', 'UsersController@update')->name('users.update');
 * Route::delete('/users/{user}', 'UsersController@destroy')->name('users.destroy');
 */

Route::get('login', 'SessionsController@create')->name('login');
Route::post('login', 'SessionsController@store')->name('login');
Route::delete('logout', 'SessionsController@destroy')->name('logout');


Route::get('/home', 'HomeController@index')->name('home');

Route::resource('statuses','StatusesController',['only'=>['destroy','store']]);