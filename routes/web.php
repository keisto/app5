<?php

Route::get('/', function () { return view('welcome'); });
Auth::routes();
Route::get('/dashboard', 'DashboardController@index')->name('home');

// Custom Routing
Route::get('po/billable', 'PurchaseOrderController@billable');
Route::get('po/nonbillable', 'PurchaseOrderController@nonbillable');
Route::get('dispatch/date/{date}', 'DispatchController@date');
Route::get('ticket/create/{id}', 'TicketController@create');

// Route Resorces
Route::resource('po', 'PurchaseOrderController');
Route::resource('user', 'UserController');
Route::resource('client', 'ClientController');
Route::resource('dispatch', 'DispatchController');
Route::resource('ticket', 'TicketController');
Route::resource('category', 'CategoryController');
Route::resource('task', 'TaskController');
Route::resource('asset', 'AssetController');
Route::resource('rate', 'RateController');
Route::resource('timeoff', 'TimeOffRequestController');
// Route::resource('maintenance', 'MaintenanceController');
// Route::resource('asset', 'AssetController');

// API Routing
//
// TODO : For mobile environment
//


// 3rd Party Routing
Route::resource('tracker', 'TrackerController');
Route::resource('accounting', 'AccountingController');
