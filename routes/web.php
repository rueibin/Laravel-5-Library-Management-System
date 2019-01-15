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

use App\Models\Book;
use App\Models\Borrow;

Route::get('/', 'Backend\AuthController@login')->name('login');
Route::post('/check', 'Backend\AuthController@check')->name('auth.check');
Route::post('/logout', 'Backend\AuthController@logout')->name('auth.logout');

Route::middleware(['auth:backend','prevent-back-history'])->namespace('Backend')->prefix('backend')->group(function () {
    //登入頁
    Route::get('/home', 'HomeController@index')->name('home.index');
    //書架
    require(__DIR__.'/route_item/bookcase.php');
    //圖書類型
    require(__DIR__.'/route_item/booktype.php');
    //圖書出版社
    require(__DIR__.'/route_item/publishing.php');
    //圖書
    require(__DIR__.'/route_item/book.php');
    //讀者
    require(__DIR__.'/route_item/reader.php');
    //帳號
    require(__DIR__.'/route_item/manager.php');
    //角色
    require(__DIR__.'/route_item/role.php');
    //權限
    require(__DIR__.'/route_item/permission.php');

    //借閱
    Route::get('/borrow', 'BorrowController@index')->name('borrow.index')->middleware('permission:borrow-list|borrow-borrow');
    //歸還
    Route::get('/borrow/back', 'BorrowController@back')->name('borrow.back')->middleware('permission:borrow-bookReturn|borrow-return');

    Route::get('404', function () {
        return view('errors.404');
    })->name('404');
});
