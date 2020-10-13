<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Material;

class TestController extends Controller
{
    public function viewtest()
    {
        return view('admin/test');
    }
    public function testing()
    {
        $materials = Material::all();
        $no = 1;
            echo "{";
            foreach ($materials as $material) {
                if ($no <= 5) {
                echo $no . $material['name'];
                $no++;
                } else {
                    $no = 1;
                    echo "}";
                    echo "</br>";
                    echo "{";
                    echo $no . $material['name'];
                    $no++;
                }
            }


        // $products = Products::with('category', '');
        // return response()->json($districts);
        // $curl = curl_init();

        // curl_setopt_array($curl, array(
        // CURLOPT_URL => "https://api.rajaongkir.com/starter/city",
        // CURLOPT_RETURNTRANSFER => true,
        // CURLOPT_ENCODING => "",
        // CURLOPT_MAXREDIRS => 10,
        // CURLOPT_TIMEOUT => 30,
        // CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        // CURLOPT_CUSTOMREQUEST => "GET",
        // CURLOPT_HTTPHEADER => array(
        //     "key: 504cc84cfea7378d14e67403bea6e71c"
        // ),
        // ));

        // $response = curl_exec($curl);
        // $err = curl_error($curl);

        // curl_close($curl);

        // if ($err) {
        //     echo "cURL Error #:" . $err;
        // } else {
        //     $response = json_decode($response,true);
        //     $countProvince = count($response['rajaongkir']['results']);
        //     foreach ($response as $value)
        //     {
        //         for($no = 0;$no < $countProvince;$no++)
        //         {
        //             echo $value['results'][$no]['city_name'];
        //             echo "\r\n";
        //         }

        //     }
        // }

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


        // $roles = Role::where('id', '=', 2)->with(['permissions'])->get();
        // $permissions = Permission::all()->pluck('name','id')->toArray();
        // foreach ($roles as $role)
        // {
        //     $rolePermissions = $role['permissions']->pluck('name')->toArray();
            // $maches = array_intersect($permissions, $rolePermissions);
            // $differences = array_diff($rolePermissions, $permissions);
            // foreach ($permissions as $key => $value)
            // {
            //     $roleper = array($role['permissions']);
            //     $pername = array($permissions);
            //     return $pername;
        //         if (in_array($value, $rolePermissions))
        //         {
        //             echo "<b>" . $key . "</b>";
        //             echo "<b>" . $value . "</b>";
        //             echo "\r\n";
        //         } else {
        //             echo $key;
        //             echo $value;
        //             echo "\r\n";
        //         }
        //     }
        // }

    }
}
