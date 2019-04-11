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
Route::get('/dashboard', function () {
    return view('dashboard');
});
Route::get('/dashboard/employees/browse', 'EmployeeController@index')->name('employees.browse');
Route::get('/dashboard/employees/create', 'EmployeeController@create')->name('employees.create');
Route::post('/dashboard/employee/store', 'EmployeeController@store')->name('employees.store');
Route::post('/dashboard/employees/search', 'EmployeeController@search')->name('employees.search');
Route::get('/dashboard/employee/show/{id}', 'EmployeeController@show')->name('employee.show');
Route::get('/dashboard/employee/edit/{id}', 'EmployeeController@edit')->name('employee.edit');
Route::post('/dashboard/employee/update/{id}', 'EmployeeController@update')->name('employees.update');
Route::delete('/dashboard/employee/destroy/{id}', 'EmployeeController@destroy')->name('employee.destroy');

Route::get('/dashboard/department/browse', 'DepartmentController@index')->name('department.browse');
Route::get('/dashboard/department/create', 'DepartmentController@create')->name('department.create');
Route::post('/dashboard/department/store', 'DepartmentController@store')->name('department.store');
Route::get('/dashboard/department/show/{id}', 'DepartmentController@show')->name('department.show');
Route::get('/dashboard/department/edit/{id}', 'DepartmentController@edit')->name('department.edit');
Route::post('/dashboard/department/update/{id}', 'DepartmentController@update')->name('department.update');
Route::delete('/dashboard/department/destroy/{id}', 'DepartmentController@destroy')->name('department.destroy');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
