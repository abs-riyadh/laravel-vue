<?php

Route::get('/',function(){
	return view('welcome');
});
Route::get('user/getUsers','UserController@getUser');
Route::get('user/{name}',function(){
	return redirect('/');
})->where('name','[A-Za-z]+');
Route::resource('user','UserController');
