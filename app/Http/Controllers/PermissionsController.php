<?php

namespace App\Http\Controllers;
use Auth;
use App\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Http\Request;

class PermissionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $page_title ='Create permission';
        return view('admin.permissions.add_permission')->with(compact('page_title','permissions','roles'));

    }

    public function createPermission(Request $request){
        $this->validate($request, [
              'name'=>'required|unique:permissions|max:40',
              'description'=>'required|max:100',
              'display_name'=>'required',
        ]);
  
          $name = $request['name'];
          $description = $request['description'];
          $display_name = $request['display_name'];
          $permission = new Permission();
          $permission->name = $name;
          $permission->description = $description;
          $permission->display_name = $name;
          $roles = $request['roles'];
          $permission->save();
  
          if (!empty($request['roles'])) { //If one or more role is selected
              foreach ($roles as $role) {
                  $r = Role::where('id', '=', $role)->firstOrFail(); //Match input role to db record
                  $permission = Permission::where('name', '=', $name)->first(); //Match input //permission to db record
                  $r->givePermissionTo($permission);
              }
          }
            return back()->with('flash_success_msg','New permission added successfully!');
      }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function viewPermissions(){
        $permissions = Permission::orderBy('name','ASC')->get();
        $page_title ="Permissions";
         return view('admin.permissions.view_permissions')->with(compact('permissions','page_title'));
      }

      public function editPermission($id=null){
        $permission = Permission::findOrFail($id);
        $page_title='Editing...';
        return view('admin.permissions.edit_permission')->with(compact('permission','page_title'));
 
      }
 
     public function updatePermission(Request $request, $id=null){
        $permission = Permission::findOrFail($id);
         $this->validate($request, [
             'name'=>'required|max:40',
         ]);
 
         $input = $request->all();
         $permission->fill($input)->save();
         return redirect('admin/view-permissions')->with('flash_success_msg','Permission Updated successfully!');
      }
 
     public function deletePermission($id=null){
        $permission = Permission::findOrFail($id);
        $permission->delete();
          return back()->with('flash_success_msg','Permission Deleted successfully!');
      }
}
