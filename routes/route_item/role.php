<?php

//角色管理
//分頁列表
Route::get('/role', 'RoleController@index')->name('role.index')->middleware('permission:role-list|role-create|role-edit|role-delete');
//新增
Route::get('/role/create', 'RoleController@create')->name('role.create')->middleware('permission:role-create');
//儲存
Route::post('/role', 'RoleController@store')->name('role.store')->middleware('permission:role-create');
//編輯
Route::get('/role/{id}/edit', 'RoleController@edit')->name('role.edit')->middleware('permission:role-edit');
//更新
Route::put('/role/{id}', 'RoleController@update')->name('role.update')->middleware('permission:role-edit');
//刪除
Route::delete('/role/{id}', 'RoleController@destroy')->name('role.destroy')->middleware('permission:role-delete');
