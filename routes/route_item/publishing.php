<?php


//圖書出版社分頁列表
Route::get('/publishing', 'PublishingController@index')->name('publishing.index')->middleware('permission:publishing-list|publishing-create|publishing-edit|publishing-delete');
//圖書出版社新增
Route::get('/publishing/create', 'PublishingController@create')->name('publishing.create')->middleware('permission:publishing-create');
//圖書出版社儲存
Route::post('/publishing', 'PublishingController@store')->name('publishing.store')->middleware('permission:publishing-create');
//圖書出版社編輯
Route::get('/publishing/{id}/edit', 'PublishingController@edit')->name('publishing.edit')->middleware('permission:publishing-edit');
//圖書出版社更新
Route::put('/publishing/{id}', 'PublishingController@update')->name('publishing.update')->middleware('permission:publishing-edit');
//圖書出版社刪除
Route::delete('/publishing/{id}', 'PublishingController@destroy')->name('publishing.destroy')->middleware('permission:publishing-delete');
