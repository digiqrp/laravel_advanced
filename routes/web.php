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

    Route::get('/', 'HomeController@index')->name('home');


    // Route::group(['namespace'=>'web'])->group(function(){
    Route::group(['namespace' => 'web','middleware'=>'\App\Http\Middleware\LogTeam'],function(){
       Route::resource('teams','TeamController');

       route::get('/teams/{team}/title',function(\App\Team $team){
          return response()->jTitle($team);
       });
       route::get('teams/{team}/activate',function(){
           return view('team/activate');
       })->name('activateTeam')->middleware('signed');

       route::get('/teams/{team}/points','TeamController@points');

    });

    // default parameters
    route::get('/square/{number?}',function($number = 10){
        return $number * $number;
    })->middleware('auth:email');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
