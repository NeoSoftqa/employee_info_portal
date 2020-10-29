<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes();

// Route::middleware(['checkpermissions','auth:web'])->group(function () {
Route::get('/home', 'HomeController@index')->name('home');


// employee routes //
Route::get('create_employee', 'EmployeeController@create');

Route::get('user_create','UserController@create');
Route::post('user_create','UserController@storeUser');

Route::get('users_list','UserController@userList');
Route::get('user_create/{id}','UserController@createUserById');
Route::post('user_create/{id}','UserController@storeUserById');

Route::get('export', 'ImportExportController@export')->name('export');
Route::get('importExportView', 'ImportExportController@importExportView');
Route::post('import', 'ImportExportController@import')->name('import');



Route::get('employee_export_import', 'ImportExportController@importExport');
Route::get('employee_export', 'ImportExportController@EmployeeExport')->name('employee_export');
Route::post('employee_import', 'ImportExportController@importEmployeeData')->name('employee_import');
Route::get('sample_file', 'ImportExportController@sampleFile');


Route::get('employee_edit/{id}','EmployeeController@showEmployee');
Route::post('employee_edit/{id}','EmployeeController@showEmployee');


Route::get('employee_view/{id}','EmployeeController@showEmployeeDetails');


// Route::get('employee_edit/{id}','EmployeeController@editEmployee');
// Route::get('employee_delete/{id}','EmployeeController@deleteEmployee');

Route::get('getTechnologyById/{id}','HelperController@getTechnologyByID');



// });

// Route::group(['namespace' => 'Dashboard', 'middleware' => ['auth:web','checkAdmin'], 'prefix' => 'dashboard'], function () {

// get employee listing //
Route::get('employee_list', 'HomeController@getUsers')->name('getData');
Route::get('employee_details', function () {
    return view('employee');
});
Route::get('users', 'HomeController@getUsers');



// routes for creating user from employee //
Route::get('employee_list1', 'HomeController@getUsers1')->name('getData1');
Route::get('users1', 'HomeController@getUsers1');


Route::get('permissions', 'PermissionController@create');
Route::post('permissions', 'PermissionController@store');



Route::get('skill_matrix', 'SkillsController@skillsview');



