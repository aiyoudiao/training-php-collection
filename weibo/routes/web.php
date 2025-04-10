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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'StaticPagesController@home')->name('home');
Route::get('/help', 'StaticPagesController@help')->name('help');
Route::get('/about', 'StaticPagesController@about')->name('about');

Route::get('signup', 'UsersController@create')->name('signup');

Route::resource('users', 'UsersController');
Route::get('users/{user}/edit', 'UsersController@edit')->name('users.edit'); // 显示用户编辑页面

Route::get('login', 'SessionsController@create')->name('login'); // 显示登录页面
Route::post('login', 'SessionsController@store')->name('login'); // 创建新会话（登录）
Route::delete('logout', 'SessionsController@destroy')->name('logout'); // 删除会话（登出）

Route::get('signup/confirm/{token}', 'UsersController@confirmEmail')->name('confirm_email'); // 邮箱确认

Route::get('password/reset', 'PasswordController@showLinkRequestForm')->name('password.request'); // 显示重置密码请求表单
Route::post('password/email', 'PasswordController@sendResetLinkEmail')->name('password.email'); // 发送重置密码链接

Route::get('password/reset/{token}', 'PasswordController@showResetForm')->name('password.reset'); // 显示重置密码表单
Route::post('password/reset', 'PasswordController@reset')->name('password.update'); // 重置密码

Route::resource('statuses', 'StatusesController', ['only' => ['store', 'destroy']]); // 微博动态相关的路由，只有 store 和 destroy 方法
