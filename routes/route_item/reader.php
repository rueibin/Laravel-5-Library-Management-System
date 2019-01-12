<?php


//讀者分頁列表
Route::get('/reader', 'ReaderController@index')->name('reader.index')->middleware('permission:reader-list|reader-create|reader-edit|reader-delete');
//讀者新增
Route::get('/reader/create', 'ReaderController@create')->name('reader.create')->middleware('permission:reader-create');
//讀者儲存
Route::post('/reader', 'ReaderController@store')->name('reader.store')->middleware('permission:reader-create');
//讀者編輯
Route::get('/reader/{id}/edit', 'ReaderController@edit')->name('reader.edit')->middleware('permission:reader-edit');
//讀者更新
Route::put('/reader/{id}', 'ReaderController@update')->name('reader.update')->middleware('permission:reader-edit');
//讀者刪除
Route::delete('/reader/{id}', 'ReaderController@destroy')->name('reader.destroy')->middleware('permission:reader-delete');
