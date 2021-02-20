<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;


class BrandsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $brands = Brand::simplePaginate(10);

        return view('dashboard.brands.index', [
            'brands' => $brands
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.brands.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $create = Brand::create($request->all());


        if (!$create) {
            return redirect()->back()->with([
                'error' => 'There is something error! Please try again later.',
            ]);
        }

        return redirect(route('dashboard.brands'))->with([
            'success' => 'The brand has been successfully created!',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $brand = Brand::find($id);

        return view('dashboard.brands.show', [
            'brand' => $brand
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $brand = Brand::find($id);

        return view('dashboard.brands.edit', [
            'brand' => $brand
        ]);
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
        $brand = Brand::find($id);

        if(!$brand){
            return redirect()->back()->with([
                'error' => 'There is something error! Please try again later.',
            ]);
        }

        $brand->update($request->all());
        $update = $brand->save();

        if (!$update) {
            return redirect()->back()->with([
                'error' => 'There is something error! Please try again later.',
            ]); 
        }

        return redirect()->back()->with([
            'success' => 'The brand has been successfully updated!',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $destroy = Brand::destroy($id);

        if ($destroy) {
            return redirect(route('dashboard.brands'))
                ->with('success', 'The brand is successfully removed!');
        } else {
            return redirect(route('dashboard.brands'))
                ->with(
                    'error',
                    'There is something error, please try again later!'
                );
        }
    }
}
