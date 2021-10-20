<?php


Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {

    Route::post('login', 'AuthController@login');
    Route::post('signup', 'AuthController@signup');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');
});
//employee route
Route::apiResource('/employee', 'Api\EmployeeController');
//Supplier Route
Route::apiResource('/supplier', 'Api\SupplierController');
//Category Route
Route::apiResource('/category', 'Api\CategoryController');
//product Route
Route::apiResource('/product', 'Api\ProductController');
//expense Route
Route::apiResource('/expense', 'Api\ExpenseController');


Route::Post('/salary/paid/{id}', 'Api\SalaryController@Paid');
Route::Get('/salary', 'Api\SalaryController@AllSalary');
Route::Get('/salary/view/{id}', 'Api\SalaryController@ViewSalary');
Route::Get('/edit/salary/{id}', 'Api\SalaryController@EditSalary');
Route::Post('/salary/update/{id}', 'Api\SalaryController@SalaryUpdate');
