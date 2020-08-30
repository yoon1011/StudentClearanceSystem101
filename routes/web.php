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

Route::group(['middleware' => 'auth'], function () {
    //    Route::get('/link1', function ()    {
//        // Uses Auth Middleware
//    });

    //Please do not remove this if you want adminlte:route and adminlte:link commands to works correctly.
    #adminlte_routes
    Route::resource('user_', 'UserController');
    Route::resource('subject_', 'SubjectController');
    Route::get('section_/{id}', 'HomeController@section');
    Route::post('section_/add', 'HomeController@addsection');
    Route::post('section_/addclea', 'HomeController@addclearance');
    Route::post('remC/{id}', 'HomeController@remclearance');
    Route::post('upR/{id}', 'HomeController@updataremak');
    Route::get('assgn_', 'HomeController@assignsub');
    Route::post('assgn_/add', 'HomeController@insertsub');
    Route::post('assgn_/rem/{id}', 'HomeController@removesub');
});
