<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use App\Department;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesController extends Controller
{
    //

  public function index(){

    $departments = Department::all();
    $permissions = Permission::orderBy('name','ASC')->get();
    $page_title='Add role';
    return view('admin.add_role')->with(compact('departments','permissions','page_title'));
  }

}
