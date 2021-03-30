<?php

namespace App\Http\Controllers;

use App\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cities = City::all();
        return $this->successResponse($cities);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required',
            'department_id' => 'required',

        ];
        $this->validate($request, $rules);

        $campos = $request->all();
        //dd($campos);
        $city = City::create($campos);
        return $this->successResponse($city);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\City  $city
     * @return \Illuminate\Http\Response
     */
    public function show(City $city)
    {
        return $this->successResponse($city);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\City  $city
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, City $city)
    {
        /* $rules = [
            'name' => 'required',
            'department_id' => 'required',
        ];
        //dd($request);
        $this->validate($request,$rules); */
        $city->fill($request->all());
        

        //dd($request);
        if($city->isClean()){
            return response()->json("No se hicieron cambios",422);
        }

        $city->save();
        
        return $this->successResponse($city);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\City  $city
     * @return \Illuminate\Http\Response
     */
    public function destroy(City $city)
    {
        $city->delete();
        return $this->successResponse($city);
    }
}
