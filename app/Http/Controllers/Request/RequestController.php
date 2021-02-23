<?php

namespace App\Http\Controllers\Request;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Condition;
use App\Models\Manufacturer;
use Illuminate\Http\Request;
use App\Http\Requests\RequestRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\SupplyRequest;
use App\Models\Brand;
use App\Models\RequestsManufacturer;
use Illuminate\Support\Arr;

class RequestController extends Controller
{
    /**
     * Auth Middleware
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $requests = SupplyRequest::all();
        $title = 'All Requests';

        return view('request.all')->with(compact('requests', 'title'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function myRequests()
    {
        $requests = User::find(Auth::user()->id)
            ->requests()
            ->get();
        $title = 'My Requests';

        return view('request.my')->with(compact('requests', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $conditions = Condition::all();
        $manufacturers = Manufacturer::all();
        $brands = Brand::all();
        $title = 'Basic Info';

        return view('request.create')->with(
            compact('title', 'manufacturers', 'conditions', 'brands')
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequestRequest $request)
    {
        $newSupplyRequest = SupplyRequest::create(
            $request->all() + ['user_id' => Auth::user()->id, 'brand_id' => 1]
        );

        foreach ($request->conditions as $condition) {
            $newSupplyRequest->conditions()->attach($condition);
        }

        foreach ($request->manufacturers as $manufacturer) {
            $newSupplyRequest->manufacturers()->attach($manufacturer);
        }

        return redirect()
            ->route('myRequests')
            ->with('success', config('supply.create_message'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $request = SupplyRequest::findOrFail($id);

        return view('request.show')->with(compact('request'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function filter(Request $request)
    {
        $brand = $request->brand ?? null;
        $model = $request->model ?? null;
        $part_no = $request->part_no ?? null;

        $requests = SupplyRequest::leftJoin(
            'brands',
            'brands.id',
            '=',
            'requests.brand_id'
        )
            ->where('model', 'LIKE', '%' . $model . '%')
            ->orWhere('name', 'LIKE', '%' . $brand . '%')
            ->orWhere('part_no', 'LIKE', '%' . $part_no . '%')
            ->get();

        $title = 'Filtered Requests';

        return view('request.all')->with(compact('requests', 'title'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function manufacturer($id)
    {
        $manufacturers = RequestsManufacturer::where(
            'manufacturer_id',
            $id
        )->get();

        

        foreach ($manufacturers as $manufacturer) {
            $ids[] = $manufacturer->request_id;
        }

        $requests = SupplyRequest::findMany($ids);

        $title = 'List of Manufacturers';

        return view('request.all')->with(compact('requests', 'title'));
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function quotation(Request $request, $id)
    {
        return 'sad';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $destroy = SupplyRequest::destroy($id);

        if ($destroy) {
            return redirect(route('myRequests'))->with(
                'success',
                'The request is successfully removed!'
            );
        } else {
            return redirect(route('myRequests'))->with(
                'error',
                'There is something error, please try again later!'
            );
        }
    }
}
