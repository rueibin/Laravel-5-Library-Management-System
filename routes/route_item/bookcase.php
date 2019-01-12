<?php


//書架分頁列表
Route::get('/bookcase', 'BookCaseController@index')->name('bookcase.index')->middleware('permission:bookcase-list|bookcase-create|bookcase-edit|bookcase-delete');
//書架新增
Route::get('/bookcase/create', 'BookCaseController@create')->name('bookcase.create')->middleware('permission:bookcase-create');
//書架儲存
Route::post('/bookcase', 'BookCaseController@store')->name('bookcase.store')->middleware('permission:bookcase-create');
//書架編輯
Route::get('/bookcase/{id}/edit', 'BookCaseController@edit')->name('bookcase.edit')->middleware('permission:bookcase-edit');
//書架更新
Route::put('/bookcase/{id}', 'BookCaseController@update')->name('bookcase.update')->middleware('permission:bookcase-edit');
//書架刪除
Route::delete('/bookcase/{id}', 'BookCaseController@destroy')->name('bookcase.destroy')->middleware('permission:bookcase-delete');
