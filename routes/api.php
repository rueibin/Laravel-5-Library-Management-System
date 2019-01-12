<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::post('getReader','Backend\BorrowController@getReader')->name('borrow.getReader');
Route::post('getBook', 'Backend\BorrowController@getBook')->name('borrow.getBook');
Route::post('getBookBorrow', 'Backend\BorrowController@getBookBorrow')->name('borrow.getBookBorrow');


Route::post('bookBorrow', 'Backend\BorrowController@bookBorrow')->name('borrow.bookBorrow');


Route::post('bookReturn', 'Backend\BorrowController@bookReturn')->name('borrow.bookReturn');

