<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Materials;

class MaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $materials = Materials::orderBy('name', 'ASC')->get();
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
        $materials = New Materials;
        $materials->name = $request->materialName;
        $count = Materials::where('name', '=' ,$request->materialName)->first();
        if ($count)
        {
            $request->session()->flash('alert-info', 'Material name is exist!');
            return redirect()->route('materials.index');
        }
        elseif ($materials->save())
        {
            $request->session()->flash('alert-success', 'Material was successful added!');
            return redirect()->route('materials.index');
        }
        else
        {
            $request->session()->flash('alert-info', 'Material was failed added!');
            return redirect()->back();
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
        $materials = Materials::findOrFail($request->materialId);
        $materials->name = $request->materialName;
        $count = Materials::where('name', '=' ,$request->materialName)->first();
        if ($count)
        {
            $request->session()->flash('alert-info', 'Material name is exist!');
            return redirect()->route('materials.index');
        }
        elseif ($materials->update())
        {
            $request->session()->flash('alert-success', 'Material was successful added!');
            return redirect()->route('materials.index');
        }
        else
        {
            $request->session()->flash('alert-info', 'Material was failed added!');
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
        $materials = Materials::findOrFail($request->materialId);
        if ($materials->delete())
        {
            $request->session()->flash('alert-success', 'Material was successful deleted!');
            return redirect()->route('materials.index');
        }
        else
        {
            $request->session()->flash('alert-info', 'Material was failed deleted!');
            return redirect()->back();
        }
    }
}
