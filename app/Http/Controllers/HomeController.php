<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SupplyRequest;
use App\Models\Brand;
use App\Models\Manufacturer;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $requests = SupplyRequest::limit(5)->get();
        $title = "All Requests";
        $brands = Brand::all();
        $manufacturers = Manufacturer::all();

        return view('home')->with(compact('requests', 'title', 'brands', 'manufacturers'));
    }
}
