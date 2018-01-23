<?php

Route::get('getUser','UserController@getUser');
Route::resource('user','UserController');
