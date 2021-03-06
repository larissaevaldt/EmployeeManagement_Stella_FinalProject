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

//root route, redirecting to the login template created by laravel but changed to our project
Route::get('/', function () {
    return view('auth.login');
});

//automatically creates 11 routes according to the controllers automatically created by requiring laravel/ui
Auth::routes();

//what happens when the user logs in, the index() function on homeController redirects to projects/index
Route::get('/home', 'HomeController@index')->name('home');
Route::get('logout', 'Auth\LoginController@logout');

// routes for client
//this next 3 routes are for updating and deleting through the option in the navbar
//didn't get them to properly work so I added buttons inside de show
Route::get('client/update',function(){
	return view('client.update');
})->name('client.updatePage');
Route::get('client/destroy',function(){
	return view('client.update');
})->name('client.deletePage');
Route::get('/client/delete','CompanyController@search')->name('client.search');

//when send message is clicked on the navbar, redirect to get view in resources/views/message/create
Route::get('/message/generate',function(){
	return view('message.create');
})->name('message');

Route::get('/employee/destroy',function(){
	return view('employee.delete');
})->name('employee.deletePage');



//ROUTES EMPLOYEE CONTROLLER DEALING
Route::get('/employee/update','EmployeeController@alter')->name('employee.updatePage');
Route::get('/employee/getbyid','EmployeeController@search')->name('employee.search');              
Route::get('/active/employeeList','EmployeeController@allActiveEmployee')->name('employee.allActive');
// Route::DELETE('employee/employee/{id}','EmployeeController@destroy')->name('employee.delete');
// Route::PATCH('/employee/{id}','EmployeeController@update')->name('employee.update');

//Dealing with the list of active employee
Route::get('/employee/active',function(){
	return view('employee.updateActiveemployee');
})->name('employee.active');
Route::get('/employee/searchActive','EmployeeController@weeklyUpdate')->name('employee.weekly');
Route::get('/employee/search/active','EmployeeController@weeklyUpdateSearch')->name('employee.weeklySearch');
Route::post('/active/employees','EmployeeController@setActiveUpdate')->name('active.ids');

// Route::get('/employee/delete','EmployeeController@search')->name('employee.search');
// Route::PATCH('employee/employee/{id}','EmployeeController@update')->name('employee.update');

// projectController
Route::get('/problem/save/employee','ProjectController@problemSave')->name('profile.save');
Route::get('/problem/save/company','ProjectController@problemSaveCompany')->name('profile.saveCompany');

// Route::get('/message/create','ProjectController@findProject')->name('project.message');
Route::post('/find/project','ProjectController@findProject')->name('project.message');
Route::get('/project/finish/{id}','ProjectController@finish')->name('project.finish');
Route::get('/project/single/finish/{id}','ProjectController@singleFinish')->name('project.singleFinsh');
Route::get('/project/allfinished','ProjectController@allFinished')->name('project.allFinsh');
Route::POST('/project/data/{id}','ProjectController@finalize')->name('project.final');

//route to send messages with the Twilio API
Route::post('/bulksms', 'BulkSmsController@sendSms')->name('send.message');
//creates automatically all the default routes, except the ones we specify it not to create
//default routes are index, create, store, edit, update, show, destroy
Route::resource('employee','EmployeeController');
Route::resource('project','ProjectController')->except(['destroy']);
Route::resource('client','CompanyController');
Route::resource('message','MessageController')->except(['destroy']);

