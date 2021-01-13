<?php
//----------------------------------------------GenericRoutes----------------------------------------------------------------------
Route::get('/', function () {
        return redirect('/login');
});
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/success','UserController@success');
Route::resource('company', 'CompanyController');
Route::resource('users', 'UserController');
//pass in verify email option
Auth::routes(['verify' => true]);
//----------------------------------------------SuperAdminRoutes----------------------------------------------------------------------
Route::resource('superAdmin/addAdmin', 'AdminsController');
Route::resource('superAdmin/addCompany', 'CompanyController');
Route::resource('superAdmin',"SuperAdminController");

Route::get('/superAdmin/viewcustomersuperadmin/{id}', 'ViewCustomerSuperAController@show')->name('ViewAdmin');
Route::post('/superAdmin/viewcustomersuperadmin/update/{uid}', 'ViewCustomerSuperAController@update')->name('UpdateAdmin');
Route::post('/superAdmin/viewcustomersuperadmin/delete/{id}', 'ViewCustomerSuperAController@delete')->name('ChangeStatus');
Route::get('/superAdmin/viewcustomersuperadmin/showAdmin/{id}', 'ViewCustomerSuperAController@show')->name('ShowAdmin');
Route::get('/superAdmin/viewcustomersuperadmin/editAdmin/{id}', 'ViewCustomerSuperAController@edit')->name('EditAdmin');
Route::get('/superAdmin/viewCostumers/cancelAdmin', 'ViewCustomerSuperAController@cancel')->name('CancelAdmin');
Route::post('/superAdmin/viewcustomersuperadmin/destroy/{id}{companyId}', 'ViewCustomerSuperAController@destroy')->name('DestroyAdmin');
Route::get('/superAdmin/viewcustomersuperadmin', 'ViewCustomerSuperAController@create');
Route::get('/superAdmin/create','SuperAdminController@create')->name('createAdmins');
Route::prefix('CreateCompany')->group(function (){
    Route::post('/superAdmin', 'SuperAdminController@storeCompany');
    Route::get('/superAdmin', 'SuperAdminController@storeCompany');
    Route::get('/addCompany/create', 'SuperAdminController@createCompany');
});
Route::prefix('CreateAdmin')->group(function () {
    Route::post('/superAdmin', 'SuperAdminController@storeAdmin');
    Route::get('/superAdmin', 'SuperAdminController@storeAdmin');
    Route::get('/addAdmin/create', 'SuperAdminController@createAdmin');
});
Route::get('/superAdmin/index', "SuperAdminController@index")->name('SAH');
Route::get('/superAdmin/history','SuperAdminController@history')->name('HistoryS');
Route::put('/superAdmin/history/delete','SuperAdminController@historydelete')->name('HistoryDelete');
Route::get('/superAdmin/viewCompanies/create','SuperAdminController@showCompany');
Route::get('/superAdmin/viewCompanies/showCompany/{id}','SuperAdminController@show')->name('ShowCompanySA');
Route::get('/superAdmin/viewCompanies/editCompany/{id}','SuperAdminController@edit')->name('EditCompany');
Route::put('/superAdmin/viewCompanies/editCompany/updateCompany/{id}','SuperAdminController@update')->name('UpdateCompany');
Route::get('/superAdmin/viewCompanies/cancelCompany','SuperAdminController@cancel')->name('CancelCompany');
Route::put('/superAdmin/viewCompanies/create/status/{id}','CompanyController@status')->name('status');

Route::get('/superAdmin/viewSponsors/listSponsors', 'SponsorsController@showList');
Route::get('/superAdmin/addSponsors/create', 'SponsorsController@createSponsor');
Route::get('/superAdmin/viewSponsors/showSponsors/{id}', 'SponsorsController@show')->name('ShowSponsor');
Route::get('/superAdmin/viewSponsors/editSponsor/{id}', 'SponsorsController@edit')->name('EditSponsor');
Route::get('/superAdmin/viewSponsors/cancelSponsor', 'SponsorsController@cancel')->name('CancelSponsor');
Route::post('/superAdmin/viewSponsors/editSponsor/update/{id}', 'SponsorsController@update')->name('UpdateSponsor');
Route::post('/superAdmin/viewSponsors/editSponsor/delete/{id}', 'SponsorsController@delete')->name('DeleteSponsor');
Route::post('/superAdmin/addSponsors/create', 'SponsorsController@storeSponsor');


//---------------------------------------------------Admin----------------------------------------------------------------------------
Route::get('/admin', 'AdminsController@index');
Route::get('/admins/area/Edit/editArea/{id}', 'AreaController@showArea')->name('showAreaAD');
Route::put('/admins/area/Edit/editArea/EditArea/{id}', 'AreaController@EditArea')->name('UpdateArea');

Route::get('/admin/viewResults/{id}','AdminsController@viewResults')->name('adminViewResults');
Route::get('/admins/maturity/addML', 'AdminsController@storeMaturityLevel');
Route::put('/admins/maturity/editML', 'AdminsController@UpdateMaturity')->name('UpdateMaturity');
Route::get('/admins/maturity/editML', 'AdminsController@editMaturityLevel')->name('editMaturity');
Route::get('addUser/create', 'AdminsController@createUser');
Route::prefix('createArea')->group(function () {
    Route::post('/admins', 'AdminsController@storeArea');
});
Route::get('/admins/area/addArea', 'AdminsController@createArea');
Route::post('/admins/user/index', 'AdminsController@storeUser');

Route::post('/admins/index', 'AdminsController@storeMaturityLevel');
Route::get('/admins/user/index','AdminsController@showUsers')->name('showUsers');
Route::get('/admins/user/viewUsers/showUser/{id}','AdminsController@show')->name('ShowUser');
Route::get('/admins/user/viewUsers/editUser/{id}', 'AdminsController@edit')->name('EditUser');
Route::get('/admins/user/viewUsers/cancelUser', 'AdminsController@cancel')->name('CancelUser');
Route::post('/admins/user/delete/{id}','AdminsController@DeleteUsers')->name('DeleteUsers');
Route::get('/admins/user/{id}', 'AdminsController@show')->name('show'); //Mostrar
Route::get('/analista/viewResults/{id}','AnalistaController@viewResults')->name('analistaViewResults');
Route::put('/admins/user/{id}', 'AdminsController@UpdateUsers')->name('UpdateUsers'); //Cambios
Route::prefix('createTest')->group(function () {
    Route::post('/admins', 'CreateTestController@store');
});
Route::get('/admins/area/test/users', 'CreateTestController@getUsers');
Route::get('/admins/area/test/create', 'CreateTestController@create');
Route::prefix('conceptTest')->group(function () {
    Route::post('/admins', 'ConceptTestController@store');
});
Route::get('/admins/area/concept_test/create', 'ConceptTestController@create');
Route::get('/admins/area/test/edit', 'AdminsController@EditTest')->name('editTest');
Route::get('/admins/area/test/delete/{id}','CreateTestController@DeleteTest') ->name('DeleteTest');
Route::get('/admins/area/concept/editTest/delete/{id}','CreateTestController@DeleteConcept') ->name('DeleteConcept');
Route::get('/admins/area/Edit/editArea/delete/{id}', 'AreaController@DeleteArea')->name('DeleteArea');
Route::get('/admins/history','AdminsController@history');
Route::put('/admins/history/delete','AdminsController@historydelete')->name('HistoryDeleteA');

Route::get('/admins/area/test/listTest', 'CreateTestController@index')->name('ListTests');
Route::get('/admins/area/test/showTest/{id}', 'CreateTestController@show')->name('ShowTest');
Route::get('/admins/area/test/editTest/{id}', 'CreateTestController@edit')->name('EditTest');
Route::get('/admins/area/test/cancelTest', 'CreateTestController@cancel')->name('CancelTest');
Route::post('/admins/area/test/editTest/update/{id}', 'CreateTestController@update')->name('UpdateTest');


Route::get('/admins/maturity/index', 'MaturityLevelController@index');
Route::get('/admins/maturity/viewML/showML/{id}', 'MaturityLevelController@show')->name('ShowML');
Route::get('/admins/maturity/viewML/editML/{id}', 'MaturityLevelController@edit')->name('EditML');
Route::get('/admins/maturity/viewML/cancelTest', 'MaturityLevelController@cancel')->name('CancelML');
Route::get('/admins/maturity/addML/create', 'MaturityLevelController@create')->name('CreateML');
Route::post('/admins/maturity/addML/create', 'MaturityLevelController@store')->name('StoreML');
Route::post('/admins/maturity/viewML/editML/delete/{id}', 'MaturityLevelController@delete')->name('DeleteML');
Route::post('/admins/maturity/viewML/editML/update/{id}', 'MaturityLevelController@update')->name('UpdateML');

//---------------------------------------------------Comun----------------------------------------------------------------------------
Route::get('/comun', 'HomeController@index');
Route::get('/admins/area/test/edit', 'AdminsController@EditTest')->name('editTest');

Route::get('/Area/{id}', 'AdminsController@showArea');
Route::get('/Area/Test/{id}', 'AdminsController@showtest');
Route::get('/Area/Test/Concept/{id}', 'AdminsController@showconcept');
Route::get('/Area/Test/Concept/MaturityL/{id}', 'AdminsController@showLevelM');
Route::get('/Area/Test/Concept/Attributes/{id}', 'AdminsController@showAtributtes');
//-----------------------------------------------File Upload----------------------------------------------------------------------------
Route::get('/upload/{id}', 'Test\TestController@index');
Route::resource('/upload', 'Test\TestController');
//-------------------------------------------------Analista---------------------------------------------------------------------------
Route::get('/analista', 'AnalistaController@index');
Route::get('/areas', 'AnalistaController@getAreas');
Route::get('/analista/viewResults/{id}','AnalistaController@viewResults')->name('analistaViewResults');
Route::get('/analista/test/{testId}/concepto/{conceptoId}', 'AnalistaController@test')->name('analistaTest');
Route::post('test', 'AnalistaController@storeTest');
//---------------------------------------------------Comun----------------------------------------------------------------------------
Route::get('/comun', 'ComunController@index');
Route::get('/comun/test/{testId}/concepto/{conceptoId}', 'ComunController@test')->name('comunTest');
Route::get('/Areaf/{request}/{Test}/{concept}/{user}', 'AreaController@show');
Route::get('/Beta', 'AreaController@beta');
Route::get('/Beta2', "UserAreaController@index");
