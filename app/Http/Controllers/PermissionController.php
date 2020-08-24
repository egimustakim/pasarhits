<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permissions = Permission::paginate(10);
        return view('admin/permission', compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $permissions = New Permission;
        $permissions->name = $request->permissionName;
        if ($permissions->save()) {
            $request->session()->flash('alert-success', 'Permission was successful added!');
            return redirect()->route('permissions.index');
        } else {
            $request->session()->flash('alert-warning', 'Permission add failed!');
            return redirect()->back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function permissionsJson()
    {
        $users = Role::where('id', '=', 2)->with(['permissions'])->get();
        return response()->json($users);
    }

    public function permissionList($id)
    {
        $roles = Role::where('id', '=', $id)->with(['permissions'])->get();
        $permissions = Permission::all()->pluck('name', 'id')->toArray();
        return view('admin/permissionassign', compact('roles', 'permissions'));
    }

    public function permissionAssign(Request $request)
    {
        $roles = Role::where('id', '=' ,$request->roleid)->with(['permissions'])->first();
        $permissions = $request['permissions'];
        if ($roles->syncPermissions($permissions))
        {
            $request->session()->flash('alert-success', 'Permissions was successful assigned!');
            return redirect()->route('roles.index');
        } else {
            $request->session()->flash('alert-warning', 'Permissions assigned failed!');
            return redirect()->back()->withInput();
        }
    }
}
