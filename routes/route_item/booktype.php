<?php


//圖書類型分頁列表
Route::get('/booktype', 'BookTypeController@index')->name('booktype.index')->middleware('permission:booktype-list|booktype-create|booktype-edit|booktype-delete');
//圖書類型新增
Route::get('/booktype/create', 'BookTypeController@create')->name('booktype.create')->middleware('permission:booktype-create');
//圖書類型儲存
Route::post('/booktype', 'BookTypeController@store')->name('booktype.store')->middleware('permission:booktype-create');
//圖書類型編輯
Route::get('/booktype/{id}/edit', 'BookTypeController@edit')->name('booktype.edit')->middleware('permission:booktype-edit');
//圖書類型更新
Route::put('/booktype/{id}', 'BookTypeController@update')->name('booktype.update')->middleware('permission:booktype-edit');
//圖書類型刪除
Route::delete('/booktype/{id}', 'BookTypeController@destroy')->name('booktype.destroy')->middleware('permission:booktype-delete');
