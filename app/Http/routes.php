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
    return redirect()->route('admin');
});

// Authentication routes...
Route::get('login', 'Auth\AuthController@getLogin');
Route::post('login', 'Auth\AuthController@postLogin');
Route::get('logout', 'Auth\AuthController@getLogout');

Route::group(['middleware' => 'auth', 'prefix' => 'admin', 'namespace' => 'Admin'], function()
{
    // admin dashboard
    Route::get('/', ['as' => 'admin', 'use' => 'AdminController@index']); 

    // manage members & subscriptions
    Route::get('members', ['as' => 'admin.members', 'use' => 'MemberController@index']);
    Route::get('members/create', ['as' => 'admin.members.create', 'use' => 'MemberController@create']);
    Route::post('members/store', ['as' => 'admin.members.store', 'use' => 'MemberController@store']);
    Route::get('members/{id}', ['as' => 'admin.members.show', 'use' => 'MemberController@show']);
    Route::get('members/{id}/edit', ['as' => 'admin.members.edit', 'use' => 'MemberController@edit']);
    Route::put('members/{id}/update', ['as' => 'admin.members.update', 'use' => 'MemberController@update']);

    // manage memberships
    Route::get('memberships', ['as' => 'admin.memberships', 'use' => 'MembershipController@index']);
    Route::get('memberships/create', ['as' => 'admin.memberships.create', 'use' => 'MembershipController@']);
    Route:post('memberships/store', ['as' => 'admin.memberships.store', 'use' => 'MembershipController@store']);
    Route::get('memberships/{id}', ['as' => 'admin.memberships.show', 'use' => 'MembershipController@show']);
    Route::get('memberships/{id}/edit', ['as' => 'admin.memberships.edit', 'use' => 'MembershipController@edit']);
    Route::get('memberships/{id}/update', ['as' => 'admin.memberships.update', 'use' => 'MembershipController@update']);
    
});


