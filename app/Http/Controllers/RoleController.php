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
            return redirect()->route('roles.index');
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
    public function destroy(Request $request)
    {
        $roles = Role::where('id', '=', $request->roleId)->first();
        $permissions = $request['permissions'];
        if ($roles->syncPermissions($permissions))
        {
            if ($roles->delete())
            {
                $request->session()->flash('alert-success', 'Role permissions successful synchronized!');
                return redirect()->route('roles.index');
            } else {
                $request->session()->flash('alert-warning', 'Role permissions fail synchronized!');
                return redirect()->back();
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
            return redirect()->route('users.index');
        } else {
            $request->session()->flash('alert-warning', 'Role assigned failed!');
            return redirect()->back()->withInput();
        }
    }

    public function punyarole()
    {
        // $a = array('car', 'motor', 'bajaj');
        // $b = array('car', 'sepeda', 'bentor');
        // foreach ($a as $c)
        // {
        //     if (in_array($c,$b))
        //     {
        //         echo "<b>" . $c . "</b>";
        //         echo "\r\n";
        //     } else
        //     {
        //         echo $c;
        //         echo "\r\n";
        //     }
        // }


        $roles = Role::where('id', '=', 2)->with(['permissions'])->get();
        $permissions = Permission::all()->pluck('name','id')->toArray();
        foreach ($roles as $role)
        {
            $rolePermissions = $role['permissions']->pluck('name')->toArray();
            // $maches = array_intersect($permissions, $rolePermissions);
            // $differences = array_diff($rolePermissions, $permissions);
            foreach ($permissions as $key => $value)
            {
            //     $roleper = array($role['permissions']);
            //     $pername = array($permissions);
            //     return $pername;
                if (in_array($value, $rolePermissions))
                {
                    echo "<b>" . $key . "</b>";
                    echo "<b>" . $value . "</b>";
                    echo "\r\n";
                } else {
                    echo $key;
                    echo $value;
                    echo "\r\n";
                }
            }
        }

    }
}
