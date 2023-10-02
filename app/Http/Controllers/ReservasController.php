<?php

namespace App\Http\Controllers;

use App\Models\Reservas;
use Illuminate\Http\Request;

class ReservasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $reservas = Reservas::with(['cliente', 'vehiculo'])
        ->where('codigo', 'like', "%{$request->buscar}%")
        ->get();
    

        return $reservas;
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
        $reservas=Reservas::create($input);
        
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
        $reservas = Reservas::with(['cliente', 'vehiculo'])->find($id);

        return $reservas;
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
        $reservas = Reservas::find($id);
        $reservas->update($input);
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
            Reservas::destroy($id);
            return \response()->json(['res'=> true, 'message'=> 'elimando correctamente'],200);
        }
        catch (\Exception $e) {
            return \response()->json(['res'=> false, 'message'=> $e->getMessage()],200);
    
        }
    }
}
