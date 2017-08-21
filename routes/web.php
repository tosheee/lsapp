<?php

/*
Route::get('/', function (){
   return view('welcome');

});

Route::get('/hello', function (){
   return view('welcome');
   return '<h1> Hello World</h1>';
});

Route::get('/about', function(){
    return view('pages.about');
});


Route::get('/users/{id}/{name}', function ($id, $name){
   return 'This is user'.$name.' with an id of '.$id;
});

*/


Route::get('/', 'Welcome@index');

Route::resource('posts', 'PostsController');
Auth::routes();

Route::get('/dashboard', 'DashboardController@index');
