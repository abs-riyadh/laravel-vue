<?php

Route::get('user/getUsers','UserController@getUser');
Route::resource('user','UserController');
