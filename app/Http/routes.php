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

Route::get('/', 'UserController@index');

Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
 
Route::get("main","UserController@index");
Route::get("admin/login","UserController@getLoginAdmin");
Route::post("admin/login","UserController@postLoginAdmin");
Route::get("admin/logout","UserController@getLogoutAdmin");
//
 Route::group(['prefix'=>'admin','middleware'=>'adminLogin'],function(){

 	 Route::group(['prefix'=>'department'],function(){
 	 	// admin/department/list
 	 
 	 	Route::get("list","DepartmentController@getList");

 	 	Route::get('edit/{id}','DepartmentController@getEdit');
 	 	Route::post('edit/{id}','DepartmentController@postEdit');

 	 	Route::get('add','DepartmentController@getAdd');
 	 	Route::post('add','DepartmentController@postAdd');

 	 	Route::get('delete/{id}','DepartmentController@getDelete');
 	 });

 	   Route::group(['prefix'=>'resource'],function(){
 	 	// admin/resource/list
	 	 
	 	 	Route::get("list","ResourceController@getList");

	 	 	Route::get('edit/{id}','ResourceController@getEdit');
	 	 	Route::post('edit/{id}','ResourceController@postEdit');

	 	 	Route::get('add','ResourceController@getAdd');
	 	 	Route::post('add','ResourceController@postAdd');

	 	 	Route::get('delete/{id}','ResourceController@getDelete');
 	 });

  	   Route::group(['prefix'=>'user'],function(){
 	 	// admin/user/list
	 	 
	 	 	Route::get("list","UserController@getList");

	 	 	Route::get('edit/{id}','UserController@getEdit');
	 	 	Route::post('edit/{id}','UserController@postEdit');

	 	 	Route::get('add','UserController@getAdd');
	 	 	Route::post('add','UserController@postAdd');

	 	 	Route::get('status/{id}','UserController@getChangeStatus');
 	 });

 	 	 Route::group(['prefix'=>'accesslog'],function(){
 	 	// admin/accesslog/list
	 	 
	 	 	Route::get("list","accesslogController@getList");
	 	 	Route::get("listdeny","accesslogController@getListDeny");
	 	 	Route::get("listaccept","accesslogController@getListAccept");

	 	 	Route::get('deny/{id}','accesslogController@getDeny');
	 	 	Route::get('accept/{id}','accesslogController@getAccept');
 	 });

 	 	 Route:resource('{format}/notice','NoticeRestfulController');
 });



 	 Route::group(['prefix'=>'employee','middleware'=>'adminLogin'],function(){
 	 	// admin/department/list
 	 	Route::get("list","EmployeeController@getList");
 	 	Route::get('edit/{id}','UserController@getUserEdit'); 	

 	 	Route::get('request','EmployeeController@getRequest');
 	 	Route::post('sendrequest','EmployeeController@postSendRequest');

 	 
 	 });