<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Province;
use App\Regencie;
use App\District;
use App\Village;

class CountryController extends Controller
{
    public function provinces()
    {
        $provinces = Province::all();
        return view('admin/province', compact('provinces'));
    }

    public function districts()
    {
        $districts = District::all();
        return view('admin/district', compact('districts'));
    }

    public function regencies()
    {
        $regencies = Regency::all();
        return view('admin/regencie', compact('regencies'));
    }

    public function villages()
    {
        $villages = Village::paginate(100);
        return view('admin/village', compact('villages'));
    }

    public function regenciesjson()
    {
        $provinces_id = Input::get('province_id');
        $regencies = Regency::where('province_id', '=', $provinces_id)->get();
        return response()->json($regencies);
    }

    public function districtsjson()
    {
        $regency_id = Input::get('regency_id');
        $districts = District::where('regency_id', '=', $regency_id)->get();
        return response()->json($districts);
    }

    public function villagesjson()
    {
        $districts_id = Input::get('districts_id');
        $villages = Village::where('district_id', '=', $districts_id)->get();
        return response()->json($villages);
    }
}
