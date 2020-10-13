<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Brand;
use App\Color;
use App\Material;
use App\Size;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin/product');
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
        // $products = New Products;
        // $products->name = $request->name;
        // $products->desc = $request->desc;
        // $products->id_category = $request->category3;
        // $products->id_brand = $request->brand;
        // $products->price = $request->price;
        // $products->stock = $request->stock;
        // $products->productsku = $request->productsku;
        // $products->imgupload = $request->imgupload;
        dd($request);
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

    public function productAdd()
    {
        $categories = Category::where('parent_id', '=', null)->get();
        $brands = Brand::all();
        $colors = Color::all();
        $materials = Material::all();
        $sizes = Size::all();
        return view('admin/product-add', compact('categories', 'brands', 'colors', 'materials', 'sizes'));
    }
}
