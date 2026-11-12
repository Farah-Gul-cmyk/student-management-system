<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Permission;

class RoleController extends Controller
{
    public function index()
    {
        
        $roles = ['admin', 'teacher', 'employee', 'student'];
        return view('roles.index', compact('roles'));
    }

    public function edit($role)
    {
        $rolePermissions = Permission::where('role', $role)->pluck('permission')->toArray();

        return view('roles.edit', compact('role', 'rolePermissions'));
    }

    public function update(Request $request, $role)
    {
        Permission::where('role', $role)->delete();

        if ($request->has('permissions')) {
            foreach ($request->permissions as $perm) {
                Permission::create([
                    'role' => $role,
                    'permission' => $perm
                ]);
            }
        }

        return redirect()->back()->with('success', 'Permissions updated successfully!');
    }
}