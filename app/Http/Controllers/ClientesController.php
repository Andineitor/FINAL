<?php

namespace App\Http\Controllers;

use App\Models\Clientes;
use Illuminate\Http\Request;

class ClientesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        //en este apartdao creare el la funcion para poder buscar al cliente 
        //por CEDULA Y NOMBRE
        $clientes= Clientes::with(['reservas'])
        ->where('cedula','like',"%{$request->buscar}%")
        ->orwhere('nombre','like',"%{$request->buscar}%")
        ->get();
        return $clientes;
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
        $clientes=Clientes::create($input);
        
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

        $clientes = Clientes::with(['reservas'])->find($id);
        return $clientes;
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
        $clientes = Clientes::find($id);
        $clientes->update($input);
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
            Clientes::destroy($id);
            return \response()->json(['res'=> true, 'message'=> 'elimando correctamente'],200);
        }
        catch (\Exception $e) {
            return \response()->json(['res'=> false, 'message'=> $e->getMessage()],200);
    
        }
    }
}
