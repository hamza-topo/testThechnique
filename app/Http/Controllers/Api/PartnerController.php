<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Partner;
class PartnerController extends Controller
{
     /**
     * Create a new PartnerController instance.
     *
     * @return void
     */
     public function __construct()
     {   
        //prendre par consideration l'affichage de la liste des partenaires si la partie client existe ,l'exception de la route partners
        $this->middleware('auth:api', ['except' => ['partners']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $partners = Partner::latest()->get();

        return response()->json([
            "partners" => $partners
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
            'partner_name' => 'required|max:100',
            'body' => 'required',
        ]);

        $partner = Partner::create($request->only(["partner_name"]));

        return response()->json([
            "partner" => $partner
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
            'partner_name' => 'required|max:100',
            'body' => 'required',
        ]);

        $partner= Partner::find($id)->update($request->only('partner_name'));
        return response()->json([
            "partner" => $partner
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
        //soft delete remember to modify the logic
        Partner::where('id', $id)->delete();
        return response()->json([], 202);
    }
}
