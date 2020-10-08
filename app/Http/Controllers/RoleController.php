<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\User;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::all();
        return view('admin/role' , compact('roles'));
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
        $roles = New Role;
        $roles->name = $request->roleName;
        if ($roles->save()) {
            $request->session()->flash('alert-success', 'Role was successful added!');
            return back();
        } else {
            $request->session()->flash('alert-warning', 'Role add failed!');
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
    public function update(Request $request)
    {
        $roles = Role::findOrFail($request->roleId);
        $roles->name = $request->roleName;
        $count = Role::where('name', '=' ,$request->roleName)->first();
        if ($count)
        {
            $request->session()->flash('alert-warning', 'Role name is exist!');
            return redirect()->back()->withInput();
        }
        if ($roles->update())
        {
            $request->session()->flash('alert-success', 'Role successful updated!');
            return back();
        } else {
            $request->session()->flash('alert-warning', 'Role update failed!');
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $roles = Role::where('id', '=', $request->roleId)->first();
        $permissions = $request['permissions'];
        if ($roles->syncPermissions($permissions))
        {
            if ($roles->delete())
            {
                $request->session()->flash('alert-success', 'Role permissions successful synchronized!');
                return back();
            } else {
                $request->session()->flash('alert-warning', 'Role permissions fail synchronized!');
                return back();
            }
        } else {
            $request->session()->flash('alert-warning', 'Something went wrong!');
            return redirect()->back();
        }
    }

    public function roleassign(Request $request)
    {
        $users = User::where('name', '=', $request->searchName)->first();
        $roles = $request->role_id;
        if ($users->assignRole($roles)) {
            $request->session()->flash('alert-success', 'Role was successful assigned!');
            return back();
        } else {
            $request->session()->flash('alert-warning', 'Role assigned failed!');
            return redirect()->back()->withInput();
        }
    }
}
