<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use App\DeliveryTime;
use App\Holiday;
use DB;

class DeliveryTimeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(Request $request,$city_id)
    {
        //valider le champ partner name avant la creation
       //validate the partner name field before creation
        $validator = Validator::make($request->all(), [
            'deliveryTime_at[]' => 'required',
            'body' => 'required',
        ]);
       //we create a new delivery time then we associated to a city id 
        foreach ($request->deliveryTime_at as $deliveryTime_at) {
           $deliveryTime = DB::table('delivery_times')
           ->insert(
            ['city_id' => $city_id,
             'delivery_at' =>$deliveryTime_at->delivery_at
           ]);
        }
        
        return response()->json([
            "message" =>"association reussie"
        ], 200);
    }

    /**
     * Display the specified Day off.
     *
     */
    public function excludeDay(Request $request,$city_id)
    {
       $holidays=Holiday::where('city_id',$city_id)->get();
       foreach ($holidays as $holiday) {
           $holiday->day_off=Carbon::parse($holiday->day_off)->format('M d Y');
       }
        return response()->json([
            "holidays" =>$holidays
        ], 200);
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
