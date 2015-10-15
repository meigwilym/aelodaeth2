<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function(){
    return view('home');
});

// Authentication routes...
Route::get('login', 'Auth\AuthController@getLogin');
Route::post('login', 'Auth\AuthController@postLogin');
Route::get('logout', 'Auth\AuthController@getLogout');

Route::group(['middleware' => 'auth', 'prefix' => 'admin', 'namespace' => 'Admin'], function()
{
    // admin dashboard
    Route::get('/', ['as' => 'admin', 'uses' => 'AdminController@index']);

    // manage members & subscriptions
    Route::get('members', ['as' => 'admin.members', 'uses' => 'MemberController@index']);
    Route::get('members/create', ['as' => 'admin.members.create', 'uses' => 'MemberController@create']);
    Route::post('members/store', ['as' => 'admin.members.store', 'uses' => 'MemberController@store']);
    Route::get('members/{id}', ['as' => 'admin.members.show', 'uses' => 'MemberController@show']);
    Route::get('members/{id}/edit', ['as' => 'admin.members.edit', 'uses' => 'MemberController@edit']);
    Route::put('members/{id}/update', ['as' => 'admin.members.update', 'uses' => 'MemberController@update']);

    // manage memberships
    Route::get('memberships', ['as' => 'admin.memberships', 'uses' => 'MembershipController@index']);
    Route::get('memberships/create', ['as' => 'admin.memberships.create', 'uses' => 'MembershipController@']);
    Route:post('memberships/store', ['as' => 'admin.memberships.store', 'uses' => 'MembershipController@store']);
    Route::get('memberships/{id}', ['as' => 'admin.memberships.show', 'uses' => 'MembershipController@show']);
    Route::get('memberships/{id}/edit', ['as' => 'admin.memberships.edit', 'uses' => 'MembershipController@edit']);
    Route::get('memberships/{id}/update', ['as' => 'admin.memberships.update', 'uses' => 'MembershipController@update']);
    
});


