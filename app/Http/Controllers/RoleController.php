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
        $roles = Role::where('id', '=', 2)->with(['permissions'], 'name')->get();
        $permissions = Permission::select('name')->get();
        foreach ($roles as $role)
        {
            foreach ($permissions as $permission)
            {
                $roleper = array($role['permissions']);
                $pername = array($permissions);
                if (in_array($pername,$roleper))
                {
                    echo "exist";
                    // echo "<b>" . $permission['name'] . "</b>";
                    // echo "\r\n";
                } else {
                    echo "not";
                    // echo $permission['name'];
                    // echo "\r\n";
                }

            }
            // $roleper = count($role['permissions']);
            // for($no = 0; $no < $roleper; $no++ )
            // {
            //     echo $role['permissions'][$no]['name'];
            // }
        }
        // return $users;
        // $no = 0;
        // foreach ($roles as $role)
        // {
        //     echo $role['name'];
        //     echo " ";
        //     foreach ($permissions as $permission)
        //     {
        //         $roleper = array($role->getPermissionNames());
        //         $pername = $permission['name'];
        //         if (in_array($pername, $roleper)) {
        //             echo "array exist";
        //         } else {
        //             echo "array not exist";
        //         }
                // echo str_replace(array('[[',']]','[',']','"',),'',$result->getPermissionNames());
        //         echo "\r\n";
        //     }
        // }
    }
}
