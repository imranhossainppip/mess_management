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

//Route::get('/', function () {
//    return view('welcome');
//});
Route::get('/','MessController@index');

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/add_members','MessController@add_members');
Route::post('/save_member','MessController@save_member');
Route::get('/all_members','MessController@all_members');
Route::get('/edit_member/{id}','MessController@edit_member');
Route::post('/update_member/{id}','MessController@update_member');
Route::get('/view_member/{id}','MessController@view_member');
Route::get('/remove_member/{id}','MessController@remove_member');
Route::get('/previous_members','MessController@previous_members');
Route::get('/again_member/{id}','MessController@again_member');


//Meal Route Here-------
Route::get('/add_meal','MealController@add_meal');
Route::post('/save_meal','MealController@save_meal');
Route::get('/today_meal','MealController@today_meal');
Route::get('/this_month_meal','MealController@this_month_meal');
Route::get('/all_meals','MealController@all_meals');
Route::get('/every_meals/{id}','MealController@every_meals');
Route::get('/edit_meal/{id}','MealController@edit_meal');
Route::post('/update_meal/{id}','MealController@update_meal');


//Expenses Route Here-------
Route::resource('/expenses','ExpensesController');
Route::get('/view_expenses','ExpensesController@view_expenses');
Route::get('/every_expenses/{id}','ExpensesController@every_expenses');
Route::get('/edit_expenses/{id}','ExpensesController@edit_expenses');
Route::post('/update_expenses/{id}','ExpensesController@update_expenses');

//Deposite Route Here-----------
Route::get('/add_deposit','DepositeController@add_deposit');
Route::post('/save_deposit','DepositeController@save_deposit');
Route::get('/all_deposit','DepositeController@all_deposit');
Route::get('/edit_deposit/{id}','DepositeController@edit_deposit');
Route::post('/update_deposit/{id}','DepositeController@update_deposit');
Route::get('/every_deposit/{id}','DepositeController@every_deposit');

//Summary Route Here-------------
Route::get('/show_summary','SummaryController@show_summary');
Route::get('/per_cost','SummaryController@per_cost');
Route::get('/final_cost/{id}','SummaryController@final_cost');


