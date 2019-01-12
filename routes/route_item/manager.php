<?php

//帳號管理
//分頁列表
Route::get('/manager', 'ManagerController@index')->name('manager.index')->middleware('permission:manager-list|manager-create|manager-edit|manager-delete');
//新增
Route::get('/manager/create', 'ManagerController@create')->name('manager.create')->middleware('permission:manager-create');
//儲存
Route::post('/manager', 'ManagerController@store')->name('manager.store')->middleware('permission:manager-create');
//編輯
Route::get('/manager/{id}/edit', 'ManagerController@edit')->name('manager.edit')->middleware('permission:manager-edit');
//更新
Route::put('/manager/{id}', 'ManagerController@update')->name('manager.update')->middleware('permission:manager-edit');
//刪除
Route::delete('/manager/{id}', 'ManagerController@destroy')->name('manager.destroy')->middleware('permission:manager-delete');
