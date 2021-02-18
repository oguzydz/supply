<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SupplyRequest;

class RequestsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $requests = SupplyRequest::simplePaginate(10);

        return view('dashboard.requests', [
            'requests' => $requests,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function detail($id)
    {
        $requestDetail = SupplyRequest::find($id);

        return view('dashboard.requests.detail', [
            'request' => $requestDetail,
        ]);
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
        //
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
        $requestDetail = SupplyRequest::find($id);

        return view('dashboard.requests.edit', [
            'request' => $requestDetail,
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


        $supplyRequest = SupplyRequest::find($id);

        if(!$supplyRequest){
            return redirect()->back()->with([
                'error' => 'There is something error! Please try again later.',
            ]);
        }

        $supplyRequest->update($request->all());
        $update = $supplyRequest->save();

        if ($update) {
            return redirect()->back()->with([
                'success' => 'The request has been successfully updated!',
            ]);
        } else {
            return redirect()->back()->with([
                'error' => 'There is something error! Please try again later.',
            ]);
        }
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
}
