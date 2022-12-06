<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Arr;

class CityController extends Controller
{
    public function index(Request $request)
    {
        $data['cities'] = DB::table('cities')->get();
        //$data1 = Arr::pluck($data, 'cities.city_name', 'cities.city_val');
        return view('index',$data);
    }
}
