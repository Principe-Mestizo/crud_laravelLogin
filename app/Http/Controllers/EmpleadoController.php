<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use Illuminate\Http\Request;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()

    {
        $datos['empleados']=Empleado::paginate(5);
        return view('empleado.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('empleado.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $campos=[
            'nombre'=>'required|string|max:100',
            'apellido_paterno'=>'required|string|max:100',
            'apellido_materno'=>'required|string|max:100',
            'correo'=>'required|email',
            'foto'=>'required|max:10000|'
        ];
        $mensaje=[
            'required'=>'El :attribute es requerido',
            'foto.required'=>'La foto es requerida'
        ];
        $this->validate($request,$campos, $mensaje);
        $datosEmpleado = $request->except(['_token']);
    
       Empleado::insert($datosEmpleado);
        // return response()->json($datosEmpleado);

        return redirect('empleado')->with('mensaje', 'Empleado agregado con éxito');
    }

    /**
     * Display the specified resource.
     */
    public function show(Empleado $empleado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $empleado=Empleado::findOrfail($id);    
        return view('empleado.edit', compact('empleado'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $campos=[
            'nombre'=>'required|string|max:100',
            'apellido_paterno'=>'required|string|max:100',
            'apellido_materno'=>'required|string|max:100',
            'correo'=>'required|email',
            'foto'=>'required|max:10000|'
        ];
        $mensaje=[
            'required'=>'El :attribute es requerido',
            'foto.required'=>'La foto es requerida'
        ];
        $this->validate($request,$campos, $mensaje);
        $datosEmpleado = request()->except(['_token', '_method']);
        Empleado::where('id', '=', $id)->update($datosEmpleado);
        $empleado=Empleado::findOrfail($id);    
        // return view('empleado.edit', compact('empleado'));
        return redirect('empleado')->with('mensaje', 'Empleado modificado');;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Empleado::destroy($id);
        return redirect('empleado')->with('mensaje', 'Empleado eliminado con éxito');;
    }
}
