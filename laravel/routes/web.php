<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {

   return view('welcome');
 });

  Route::resource('tasks', 'TaskController');
  route::get('tasks/{task}',function(){
    return view('tasks.index');
  });
//   Route::get('/',function()
// {
// 	return view('layouts.master');
// })->middleware('auth');
//   // route::get('tasks/harsh','TaskController@show');

// route::get('/reg',function(){

//     return view('info');

// });
