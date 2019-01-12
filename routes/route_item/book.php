<?php


//圖書分頁列表
Route::get('/book', 'bookController@index')->name('book.index')->middleware('permission:book-list|book-create|book-edit|book-delete');
//圖書新增
Route::get('/book/create', 'bookController@create')->name('book.create')->middleware('permission:book-create');
//圖書儲存
Route::post('/book', 'bookController@store')->name('book.store')->middleware('permission:book-create');
//圖書編輯
Route::get('/book/{id}/edit', 'bookController@edit')->name('book.edit')->middleware('permission:book-edit');
//圖書更新
Route::put('/book/{id}', 'bookController@update')->name('book.update')->middleware('permission:book-edit');
//圖書刪除
Route::delete('/book/{id}', 'bookController@destroy')->name('book.destroy')->middleware('permission:book-delete');
