<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('role:admin');
    }
    public function index()
    {
        $users = User::paginate(8);
//        dd($users);
        return view('admin.users.index', compact('users'));
    }
    public function edit(User $user)
    {
        $roles = Role::all();
        $permissions = Permission::all();
        return view('admin.users.role', compact('user', 'roles', 'permissions'));
    }

    public function revokePermission(User $user, Permission $permission)
    {

    }
    public function givePermission(User $user, Request $request)
    {
        dd($user, $request->permission);
    }

    public function removeRole(User $user, Role $role)
    {
        dd($user, $role);
    }
    public function assignRole(User $user, Request $request)
    {
        dd($user, $request->role);
    }
    public function delete(User $user)
    {
        dd($user);
    }
}
