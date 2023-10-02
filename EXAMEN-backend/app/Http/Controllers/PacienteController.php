<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePacienteRequest;
use App\Models\Paciente;
use Illuminate\Http\Request;

class PacienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    //listar o buscar dentro de una tabla
    public function index(Request $request)
    {
        //pruebas backend
      //  $input = $request->all();
        // $pacientes=Paciente::with(['citas',])->paginate('2');
        // return $pacientes;


        //buscar pacientes

        $pacientes = Paciente::with(['citas'])
            ->where('cedula', 'like', "%{$request->buscar}%")
            ->orwhere('nombre', 'like', "%{$request->buscar}%")
            ->get();


        return $pacientes;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    //
    public function store(CreatePacienteRequest $request)
    {
        //
        $input = $request->all(); 
        $input['user_id']= auth()->user()->id; 
        $pacientes=Paciente::create($input);
        
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
        $pacientes = Paciente::with(['citas'])->find($id);
        return $pacientes;
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
        $pacientes = Paciente::find($id);
        $pacientes->update($input);
        return \response()->json(['res'=> true,'message'=> 'Modificado correctamente'],200);




    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


     //eliminar datos
    public function destroy($id)
    {
        try{
        //
        Paciente::destroy($id);
        return \response()->json(['res'=> true, 'message'=> 'elimando correctamente'],200);
    }
    catch (\Exception $e) {
        return \response()->json(['res'=> false, 'message'=> $e->getMessage()],200);

    }
}
}