<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesController extends Controller {
	//

	public function index() {

		//$departments = Department::all();
		$permissions = Permission::orderBy('name', 'ASC')->get();
		$page_title  = 'Add role';
		return view('admin.roles.add_role')->with(compact('permissions', 'page_title'));
	}

	public function createRole(Request $request, $id = null) {
		$this->validate($request, [
				'name'        => 'required|unique:roles|max:100',
				'permissions' => 'required',
				//'department_id'=>'required',
			]
		);

		$name              = $request['name'];
		$description       = $request['description'];
		$role              = new Role();
		$role->name        = $name;
		$role->description = $description;
		$permissions       = $request['permissions'];

		$role->save();
		//Looping thru selected permissions
		foreach ($permissions as $permission) {
			$p = Permission::where('id', '=', $permission)->firstOrFail();
			//Fetch the newly created role and assign permission
			$role = Role::where('name', '=', $name)->first();
			$role->givePermissionTo($p);
		}

		return back()->with('flash_success_msg', 'New Role Added successfully!');
	}

	public function viewRoles() {
		$role       = Role::orderBy('name', 'ASC')->get();
		$page_title = 'Roles';

		return view('admin.roles.view_roles')->with(compact('role', 'page_title'));
	}

	public function editRole($id) {
		$role        = Role::findOrFail($id);
		$permissions = Permission::orderBy('name', 'ASC')->get();
		//$departments = Department::all(); //Get all departments

		$page_title = 'Editing...';

		return view('admin.roles.edit_role')->with(compact('role', 'permissions', 'page_title'));
	}

	public function updateRole(Request $request, $id = null) {
		$role = Role::findOrFail($id);//Get role with the given id

		$this->validate($request, [
				'name'        => 'required|max:100|unique:roles,name,'.$id,
				'permissions' => 'required',
				//'tat'=>'required',
			]);

		$input       = $request->except(['permissions']);
		$permissions = $request['permissions'];
		$role->fill($input)->save();

		$p_all = Permission::all();//Get all permissions

		foreach ($p_all as $p) {
			$role->revokePermissionTo($p);//Remove all permissions associated with role
		}

		foreach ($permissions as $permission) {
			$p = Permission::where('id', '=', $permission)->firstOrFail();//Get corresponding form //permission in db
			$role->givePermissionTo($p);//Assign permission to role
		}
		return redirect('/admin/view-roles')->with('flash_success_msg', 'Role Updated successfully!');
	}

	public function deleteRole($id = null) {
		Role::where(['id' => $id])->delete();
		return back()->with('flash_success_msg', 'Role Deleted successfully!');
	}
}
