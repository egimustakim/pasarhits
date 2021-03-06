<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return view('admin/category', compact('categories'));
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
        $categories = New Category();
        $categories->name = $request->inputName;
        $categories->parent_id = $request->parentCat;
        $count = Category::where('name', '=' ,$request->inputName)->where('parent_id', '=' ,$request->parentCat)->first();
        if ($count)
        {
            $request->session()->flash('alert-warning', 'Category name is exist!');
            return redirect()->back()->withInput();
        }
        if ($categories->save())
        {
            $request->session()->flash('alert-success', 'Category was successful added!');
            return back();
        }
        else
        {
            $request->session()->flash('alert-warning', 'Category was failed added!');
            return redirect()->back()->withInput();
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function show(Categories $categories)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function edit(Categories $categories)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $categories = Category::findOrFail($request->categoryId);
        $categories->name = $request->categoryName;
        if($categories->update())
        {
            $request->session()->flash('alert-success', 'Category was successful added!');
            return back();
        }
        else
        {
            $request->session()->flash('alert-warning', 'Category was failed added!');
            return redirect()->back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $categories = Category::findOrFail($request->categoryId);
        if($categories->delete())
        {
            $request->session()->flash('alert-success', 'Category deleted!');
            return back();
        }
        else
        {
            $request->session()->flash('alert-warning', 'Category delete failed!');
            return back();
        }
    }

    public function subcategoriesstore (Request $request)
    {
        $subcategories = New SubCategory();
        $categoryId = $request->opCategoryId;
        $subCatName = $request->inputSubName;
        if ($categoryId > 2)
        {
            $errormsg = "Category name isn't available";
            return redirect('categories?errormsg=1');
        }
        else if (SubCategory::where('name', 'LIKE', $subCatName)->where('categories_id', '=', $categoryId)->count() > 0)
        {
            $errormsg = "Category name exist";
            return redirect('categories?errormsg=2');
        }
        else
        {
            $subcategories->categories_id = $categoryId;
            $subcategories->name = $subCatName;
            $subcategories->save();
            return redirect('categories');
        }
    }

    public function categoryjson()
    {
        $parents_id = Input::get('parent_id');
        $categories = Category::where('parent_id', '=', $parents_id)->get();
        return response()->json($categories);
    }
}
