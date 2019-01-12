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


// Route::get('/tt',function(){

//     $book=Book::with(['borrow'=>function($query){
//                 $query->where('returned',2);
//             }])->where('barcode','9789863795407')->get();
//     dd($book[0]->borrow[0]->id);

// });


Route::middleware(['auth:backend'])->namespace('Backend')->prefix('backend')->group(function () {
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

});
