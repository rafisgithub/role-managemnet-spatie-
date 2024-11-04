<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::all();
  

        return view('role-permissions.roles.index', [
            'roles' => $roles,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('role-permissions.roles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:roles,name',
        ]);

        Role::create([
            'name' => $request->name,
        ]);

        return redirect()->route('roles.index')->with('message', 'Role created successfully');
    }   

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        $role = Role::findById($id);
        return view('role-permissions.roles.edit', [
            'role' => $role,
        ]);
        return view('role-permissions.roles.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|unique:roles,name',
        ]);

        $role = Role::findById($id);
        $role->update([
            'name' => $request->name,
        ]);

        return redirect()->route('roles.index')->with('message', 'Role updated successfully');  
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $role = Role::findById($id);
        $role->delete();

        return redirect()->route('roles.index')->with('message', 'Role deleted successfully');
    }

    public function addPermissionToRole(string $roleid)
    {  
        
        $permissions = Permission::all();
        $role = Role::findOrFail($roleid);
        
        $rolePermissions = DB::table('role_has_permissions')->where('role_id', $roleid)->pluck('permission_id')->all();
        // dd($rolePermissions);
        return view('role-permissions.roles.add-permission', [
            'role' => $role,
            'permissions' => $permissions,
            'rolePermissions' => $rolePermissions,
            
        ]);
    }   

    public function updatePermissionToRole(Request $request, $roleid)
    {
        $request->validate([
            'permissions' => 'required|array',
        ]);
    
        $role = Role::findById($roleid);
   
        $permissions = $request->permissions;
 
        $role->syncPermissions($permissions);
    
        return redirect()->back()->with('message', 'Permissions updated successfully');
    }
    
}
