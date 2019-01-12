<?php

//權限管理
//分頁列表
Route::get('/permission', 'PermissionController@index')->name('permission.index')->middleware('permission:permission-list|permission-create|permission-edit|permission-delete');
//新增
Route::get('/permission/create', 'PermissionController@create')->name('permission.create')->middleware('permission:permission-create');
//儲存
Route::post('/permission', 'PermissionController@store')->name('permission.store')->middleware('permission:permission-create');
//編輯
Route::get('/permission/{id}/edit', 'PermissionController@edit')->name('permission.edit')->middleware('permission:permission-edit');
//更新
Route::put('/permission/{id}', 'PermissionController@update')->name('permission.update')->middleware('permission:permission-edit');
//刪除
Route::delete('/permission/{id}', 'PermissionController@destroy')->name('permission.destroy')->middleware('permission:permission-delete');
