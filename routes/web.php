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

/* Route::get('/home', function () {
    return view('home');
}); */

Route::view('/home','home');
//Route::get('/home', 'HomeController@home');

Route::get('/test/{id}/{auth}', function ($id,$auth) {
    return "welcome ".$id." autheur $auth";
})-> name('a');

Route::get('/test/{id?}', function () {
    return "welcome ";
})-> name('b');

Route::get('/test2/{id}/{id2?}', function ($id,$id2='<a href="#">hheelo</a>') {
    $post=[
        1 => ['titre' => 'learn laravel'],
        2 => ['titre' => 'learn angular']
    ];
    return view('post.show', ['d'=> $post[$id], 'd2'=>$id2]);
});

// route name

Route::namespace('Front')->group(function (){
   Route::get('users','UsersController@showUserName');
});