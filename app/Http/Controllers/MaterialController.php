<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Material;

class MaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $materials = Material::orderBy('name', 'ASC')->get();
        return view('admin/material', compact('materials'));
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
        $materials = New Material;
        $materials->name = $request->materialName;
        $count = Material::where('name', '=' ,$request->materialName)->first();
        if ($count)
        {
            $request->session()->flash('alert-info', 'Material name is exist!');
            return back();
        }
        elseif ($materials->save())
        {
            $request->session()->flash('alert-success', 'Material was successful added!');
            return back();
        }
        else
        {
            $request->session()->flash('alert-info', 'Material was failed added!');
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
        $materials = Material::findOrFail($request->materialId);
        $materials->name = $request->materialName;
        $count = Material::where('name', '=' ,$request->materialName)->first();
        if ($count)
        {
            $request->session()->flash('alert-info', 'Material name is exist!');
            return redirect()->back()->withInput();
        }
        elseif ($materials->update())
        {
            $request->session()->flash('alert-success', 'Material was successful added!');
            return back();
        }
        else
        {
            $request->session()->flash('alert-info', 'Material was failed added!');
            return redirect()->back()->withInput();
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
        $materials = Material::findOrFail($request->materialId);
        if ($materials->delete())
        {
            $request->session()->flash('alert-success', 'Material was successful deleted!');
            return back();
        }
        else
        {
            $request->session()->flash('alert-info', 'Material was failed deleted!');
            return back();
        }
    }
}
