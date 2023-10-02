<?php

namespace App\Http\Controllers;

use App\Models\Vehiculos;
use Illuminate\Http\Request;

class VehiculosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $vehiculos= Vehiculos::with(['reservas'])
        ->where('placa','like',"%{$request->buscar}%")
        ->get();
        return $vehiculos;
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
        $input = $request->all(); 
        $input['user_id']= auth()->user()->id; 
        $vehiculos=Vehiculos::create($input);
        
        return \response()->json(['res'=> true, 'message'=> 'Insertado correctamente'],200);

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
        $vehiculos = Vehiculos::with(['reservas'])->find($id);
        return $vehiculos;
        
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
        $input = $request->all();
        $vehiculos = Vehiculos::find($id);
        $vehiculos->update($input);
        return \response()->json(['res'=> true,'message'=> 'Modificado correctamente'],200);
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
        try{
            //
            Vehiculos::destroy($id);
            return \response()->json(['res'=> true, 'message'=> 'elimando correctamente'],200);
        }
        catch (\Exception $e) {
            return \response()->json(['res'=> false, 'message'=> $e->getMessage()],200);
    
        }
    }
}
