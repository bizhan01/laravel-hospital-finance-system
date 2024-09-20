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
Auth::routes();
Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');

// Admin
Route::resource('/revenue', 'RevenueController');
Route::get('/patients', 'PatientController@patients');
Route::get('/operations', 'OperationController@operations');
Route::get('/percentages', 'PercentageController@percentages');
Route::resource('/employees', 'EmployeeController');
Route::get('/addEmployee', 'EmployeeController@create');
Route::resource('/expense', 'ExpenseController');
Route::get('/salary', 'ExpenseController@salary');
Route::get('/generalAssets', 'ExpenseController@generalAssets');
Route::get('/expensez', 'ExpenseController@expense');
Route::resource('/balance', 'BalanceController');
Route::resource('/advancePaid', 'AdvancePaidController');
Route::resource('/balance', 'BalanceController');
Route::resource('/student', 'StudentController');
Route::resource('/asset', 'AssetController');
Route::get('/assets', 'AssetController@assets');
Route::resource('/doctor', 'DoctorController');
Route::resource('/section', 'SectionController');

// admin pharmacy routes
Route::get('/dailySalesList', 'SaleController@dailySalesList')->name('dailySalesList');
Route::get('/addCompanyAdmin', 'CompanyController@addCompanyAdmin')->name('addCompanyAdmin');
Route::get('/doDealsAdmin', 'TransactionController@doDealsAdmin')->name('doDealsAdmin');
Route::get('/companyBlanceAdmin', 'CompanyController@companyBlanceAdmin')->name('companyBlanceAdmin');
Route::get('/availableDrugAdmin', 'DrugStoreController@availableDrugAdmin')->name('availableDrugAdmin');

//Labratory routes
Route::get('/addCompanyLab', 'CompanyController@addCompanyLab')->name('addCompanyLab');
Route::get('/doDealsLab', 'TransactionController@doDealsLab')->name('doDealsLab');
Route::get('/companyBlanceLab', 'CompanyController@companyBlanceLab')->name('companyBlanceLab');
Route::get('/availableDrugLab', 'DrugStoreController@availableDrugLab')->name('availableDrugLab');

//Labratory routes
Route::get('/addCompanyDental', 'CompanyController@addCompanyDental')->name('addCompanyDental');
Route::get('/doDealsDental', 'TransactionController@doDealsDental')->name('doDealsDental');
Route::get('/companyBlanceDental', 'CompanyController@companyBlanceDental')->name('companyBlanceDental');
Route::get('/availableDrugDental', 'DrugStoreController@availableDrugDental')->name('availableDrugDental');

// CRUD users opertation routes
Route::get('/users','UserOperationController@index');
Route::get('/addUser','UserOperationController@addUser');
Route::get('/usersList','UserOperationController@usersList');
Route::get('/deleteUser/{id}','UserOperationController@destroy');
Route::get('/editUser/{id}','UserUpdateController@show');
Route::post('/editUser/{id}','UserUpdateController@edit');


// Reception Operation Routes
Route::resource('/patient', 'PatientController');
Route::get('/patientList', 'PatientController@patientList');
Route::resource('/percentage', 'PercentageController');
Route::resource('/operation', 'OperationController');

// pharmacy
Route::get('/dailySales', 'SaleController@dailySales')->name('dailySales');
Route::post('/saveSale', 'SaleController@saveSale')->name('saveSale');
Route::get('/deleteSale/{id}', 'SaleController@deleteSale')->name('deleteSale');
Route::get('/dailySalesEdit/{id}', 'SaleController@dailySalesEdit')->name('dailySalesEdit');
Route::post('/dailySalesUpdate', 'SaleController@dailySalesUpdate')->name('dailySalesUpdate');
Route::get('/addCompany', 'CompanyController@addCompany')->name('addCompany');
Route::post('/saveCompany', 'CompanyController@saveCompany')->name('saveCompany');
Route::get('/deleteCompany/{id}', 'CompanyController@deleteCompany')->name('deleteCompany');
Route::get('/editCompany/{id}', 'CompanyController@editCompany')->name('editCompany');
Route::post('/updateCompany', 'CompanyController@updateCompany')->name('updateCompany');
Route::get('/doDeals', 'TransactionController@doDeals')->name('doDeals');
Route::get('/deleteDeal/{id}', 'TransactionController@deleteDeal')->name('deleteDeal');
Route::get('/editDeal/{id}', 'TransactionController@editDeal')->name('editDeal');
Route::post('/updateDeal', 'TransactionController@updateDeal')->name('updateDeal');
Route::post('/saveDeals', 'TransactionController@saveDeals')->name('saveDeals');
Route::get('/companyBlance', 'CompanyController@companyBlance')->name('companyBlance');
Route::get('/availableDrug', 'DrugStoreController@availableDrug')->name('availableDrug');
