<?php

namespace App\Http\Controllers;

use App\Solicitude;
use Illuminate\Http\Request;

class SolicitudeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $solicitude = Solicitude::all();
        return $this->successResponse($solicitude);
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
        $rules = [
            'name' => 'required',
        'surname' => 'required',
        'name_business' => 'required',
        'phone' => 'required',
        'email' => 'required',
        'direction' => 'required',
        'description' => 'required',
        'city_id' => 'required',
        ];
        $this->validate($request, $rules);

        $campos = $request->all();
        //dd($campos);
        $solicitude = Solicitude::create($campos);
        return $this->successResponse($solicitude);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Solicitude  $solicitude
     * @return \Illuminate\Http\Response
     */
    public function show(Solicitude $solicitude)
    {
        return $this->successResponse($solicitude);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Solicitude  $solicitude
     * @return \Illuminate\Http\Response
     */
    public function edit(Solicitude $solicitude)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Solicitude  $solicitude
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Solicitude $solicitude)
    {
        $solicitude->fill($request->all());
        

        //dd($request);
        if($solicitude->isClean()){
            return response()->json("No se hicieron cambios",422);
        }

        $solicitude->save();
        
        return $this->successResponse($solicitude);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Solicitude  $solicitude
     * @return \Illuminate\Http\Response
     */
    public function destroy(Solicitude $solicitude)
    {
        $solicitude->delete();
        return $this->successResponse($solicitude);
    }
}
