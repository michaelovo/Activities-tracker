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
    return view('admin.admin_login');
});

//Route::get('/admin','AdminController@login');
Route::match(['get','post'],'/admin','AdminController@login');


Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix'=> 'admin','middleware'=>['auth']],function(){
  Route::get('dashboard','AdminController@dashboard');
  Route::get('settings','AdminController@settings');
  Route::get('check-pwd','AdminController@checkPwd');
  Route::match(['get','post'],'/admin/update-pwd','AdminController@updatepassword');
  Route::get('users','AdminController@viewusers');


  //Admin category route
  Route::match(['get','post'],'add-category','CategoryController@addCategory');
  Route::get('view-category','CategoryController@viewCategories');
  Route::match(['get','post'],'edit-category/{id}','CategoryController@editCategory');
  Route::match(['get','post'],'delete-category/{id}','CategoryController@deleteCategory');

  //Permissions Routes
  Route::get('permission','PermissionsController@index');//->middleware('permission:Create permission');//Create permission
  Route::post('create-permission','PermissionsController@createPermission');//Create permission function
  Route::get('view-permissions','PermissionsController@viewPermissions');//->middleware('permission:View permissions');//view permissions
  Route::get('edit-permission/{id}','PermissionsController@editPermission');//->middleware('permission:Edit permission');// edit permissions
  Route::post('update-permission/{id}','PermissionsController@updatePermission');// update permission
  Route::get('delete-permission/{id}','PermissionsController@deletePermission');//->middleware('permission:Delete permission');//delete permission
 // Roles route
 Route::get('/role','RolesController@index');//->middleware('permission:Create role');// Create role page
 Route::post('/create-role','RolesController@createRole');//Create role function
 Route::get('/view-roles','RolesController@viewRoles');//->middleware('permission:View roles|Create role');// view roles
 Route::get('/edit-role/{id}','RolesController@editRole');//->middleware('permission:Edit role');// edit role
 Route::post('/update-role/{id}','RolesController@updateRole')->name('role.update');// update role
 Route::get('/delete-role/{id}','RolesController@deleteRole');//->middleware('permission:Delete role');//delete role

 //RECYCLE BIN
 Route::get('/categories/bin','CategoryController@recycleBin');//->middleware('permission:Create role');// Create role page
 Route::get('/restore-category/{id}','CategoryController@restoreCategory');//->middleware('permission:Delete role');//delete role
 Route::get('/deletePermanently-category/{id}','CategoryController@deleteCategoryPermanently');//->middleware('permission:Delete role');//delete role




});

Route::get('/logout','AdminController@logout');
