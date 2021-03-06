<?php

namespace App\Http\Controllers;

use App\Shipping;
use Illuminate\Http\Request;

class ShippingController extends Controller
{
    public function index()
    {
        $shippings = Shipping::all();
        return view('admin/shipping', compact('shippings'));
    }

    public function addprovider(Request $request)
    {
        $request->validate([
            'shipName' => 'required',
            'shipType' => 'required'
        ]);

        $shipping = New Shipping();
        $shipping->name = $request->get('shipName');
        $shipping->type = $request->get('shipType');
        $shipping->save();
        return redirect('shipping');
    }
}
