<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Auth;
use Storage;
use File;
use App\Category;
use App\Brand;
use App\Color;
use App\Image;
use App\Material;
use App\Meta;
use App\Product;
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
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:products|max:191',
            'description' => 'required',
            'category3' => 'required',
            'stock' => 'required',
            'material' => 'required',
            'price' => 'required',
            'imgupload' => 'required',
            'size' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('admin/product-add')
                        ->withErrors($validator)
                        ->withInput();
        }

        if($request->submit == "savepublish")
        {
            $isPublished = 1;
        } else {
            $isPublished = 0;
        }

        $products = New Product;
        $products->name = $request->name;
        $products->description = $request->description;
        $products->category_id = $request->category3;
        $products->brand_id = $request->brand;
        $products->color_id = $request->color;
        $products->material_id = $request->material;
        $products->sku = $request->productsku;
        $products->price = $request->price;
        $products->ispublished = $isPublished;
        $products->user_id = Auth::user()->id;
        $products->save();


        foreach ($request->size as $size) {
            foreach ($request->stock as $stock) {
                $metas = New Meta;
                $metas->size_id = $size;
                $metas->stock = $stock;
            }
            $products->meta()->save($metas);
        }

        $no = 1;
        $name = str_replace(' ', '-', substr($request->name,0,20));
        $year = date("Y");
        $month = date("m");;
        $target_dir = 'public/images/products/'.$year.'/'.$month;

        foreach ($request->imgupload as $imgname) {
            $extention = $imgname->getClientOriginalExtension();
            $imgname = $name . '-' . $no . '.' . $extention;
            $images = New Image;
            $images->name = $imgname;
            $images->guide = $target_dir;
            $products->image()->save($images);
            $no++;
        }


        if (!Storage::exists($target_dir)) {
            Storage::makeDirectory($target_dir);
        }

        if ($request->hasFile('imgupload')) {
            foreach ($request->imgupload as $image) {
                if ($image->isValid()) {
                        $imgname = $name . '-' . $no . '.' . $extention;
                        $store = $image->storeAS($target_dir, $imgname);
                        $store = $image->storeAS($target_dir, $imgname);
                } else {
                    abort(500, 'Could not upload image :');
                }
                $no++;
            }
        } else {
            $request->session()->flash('alert-warning', 'No image selected');
            return back()->withInput();
        }

        if ($store = $image->storeAS($target_dir, $imgname) && $products->save() && $products->meta()->save($metas) && $products->image()->save($images)){
            $request->session()->flash('alert-info', 'Product is successful added!');
            return redirect()->route('products.index');
        } else {
            $request->session()->flash('alert-success', 'Product add failed!');
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
