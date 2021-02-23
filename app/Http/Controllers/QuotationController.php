<?php

namespace App\Http\Controllers;

use App\Models\Currency;
use App\Models\SupplyRequest;
use Illuminate\Http\Request;
use App\Models\Quotation;
use Illuminate\Support\Facades\Auth;

class QuotationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $requestDetail = SupplyRequest::find($id);
        $currencies = Currency::all();


        if (!$requestDetail) {
            return redirect(null, 404);
        }

        return view('qoutation.index', [
            'request' => $requestDetail,
            'currencies' => $currencies
        ]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $insert = Quotation::create([
            'title' => $request->title,
            'request_id' => $id,
            'user_id' => Auth::user()->id,
            'message' => $request->message,
            'price' => $request->price,
            'currency' => $request->currency,
        ]);

        if ($insert) {
            return redirect()
                ->route('myRequests')
                ->with('success', 'The quotation was successfully created!');
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

        $qoutations = Quotation::where('request_id', $id)->get();
        $requestDetail = SupplyRequest::find($id);


        return view('qoutation.show', [
            'qoutations' => $qoutations,
            'request' => $requestDetail
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
}
