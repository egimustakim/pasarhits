<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
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
            return redirect('roles');
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

    public function roleassign(Request $request)
    {
        // $adminid = User::where('name', '=', $request->searchName)->first();
        // $result = $adminid->id;
        // $role = New Adminrole;
        // $role->role_id = $request->role;
        // $role->admin_id = $result;
        $user = User::where('name', '=', $request->searchName)->first();
        $role = $request->role_id;
        if ($user->assignRole($role)) {
            $request->session()->flash('alert-success', 'Role was successful assigned!');
            return redirect()->route('users.index');
        } else {
            $request->session()->flash('alert-warning', 'Role assigned failed!');
            return redirect()->back()->withInput();
        }
    }

    public function punyarole()
    {
        $users = User::with('roles')->get();
        foreach ($users as $user)
        {
            echo json_encode($user->getRoleNames());
        }

    }
}
