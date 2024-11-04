<?php

namespace App\Http\Controllers;

use Faker\Provider\ar_EG\Person;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $permissions = Permission::all();

        return  view('role-permissions.permissions.index',[
            'permissions' => $permissions,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return  view('role-permissions.permissions.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:permissions,name',
        ]);
     
        Permission::create([
            'name' => $request->name,
        ]);
       
        return redirect()->route('permissions.index')->with('message', 'Permission created successfully');
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
    public function edit(Permission $permission)
    {
        // dd($permission);
        return view('role-permissions.permissions.edit', [
            'permission' => $permission,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Permission $permission)
    {
      
         $request->validate([
              'name' => 'required|unique:permissions,name,'.$permission->id,
         ]);
            $permission->update([
                'name' => $permission->name,
            ]);
            return redirect()->route('permissions.index')->with('message', 'Permission updated successfully');  
            
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // dd($id);
        $permission = Permission::findById($id);
        $permission->delete();
        return redirect()->route('permissions.index')->with('message', 'Permission deleted successfully');
    }
}
