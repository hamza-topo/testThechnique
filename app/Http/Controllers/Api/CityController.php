<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\City;
class CityController extends Controller
{
    /**
     * Create a new CityController instance.
     *
     * @return void
     */
     public function __construct()
     {   
        //prendre par consideration l'affichage de la liste des villes si la partie client existe;l'exception de la route partners
        $this->middleware('auth:api', ['except' => ['cities']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        //ca doit afficher les villes non supprimés dont le status est 1
        $cities = City::where('status',1)->with('partner')->get();
        return response()->json([
            "cities" => $cities
        ], 200);
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
        //valider le champ partner name avant la creation
       //validate the partner name field before creation
        $validator = Validator::make($request->all(), [
            'citiy_name' => 'required|max:50',
            'partner_id'=>'required',
            'body' => 'required',
        ]);

        $city = City::create($request->only(["citiy_name","partner_id"]));

        return response()->json([
            "city" => $city
        ], 200);
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
         $validator = Validator::make($request->all(), [
            'citiy_name' => 'required|max:50',
            'body' => 'required',
        ]);

        $city= City::find($id)->update($request->only('citiy_name'));
        return response()->json([
            "city" => $city
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       //soft delete modifier seulement le status
        City::findOrfail($id)->update('status',0);
        return response()->json(['status' => true, 'message' => 'Category Deleted']);
    }
}
