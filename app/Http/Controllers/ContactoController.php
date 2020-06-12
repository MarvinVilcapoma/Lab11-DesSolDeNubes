<?php

namespace App\Http\Controllers;

use App\Contacto;
use Illuminate\Http\Request;
use App;

class ContactoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contactos = App\Contacto::paginate(6);
        return view('inicio', compact('contactos') );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //$agregarContacto = request()->except('_token');
        //Contacto::insert($agregarContacto);
        $contactoAgregar = new Contacto;
        $request->validate([
            'nombre' => 'required',
            'apellido' => 'required',
            'correo' => 'required'
        ]);
        $contactoAgregar->nombre = $request->input('nombre');
        $contactoAgregar->apellido = $request->input('apellido');
        $contactoAgregar->correo = $request->input('correo');
        $contactoAgregar->save();
        //var_dump($contactoAgregar);
        //return $contactoAgregar;
        //return $agregarContacto;
        return back()->with('agregar','El contacto se registró correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Contacto  $contacto
     * @return \Illuminate\Http\Response
     */
    public function show(Contacto $contacto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Contacto  $contacto
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $contactoActualizar = App\Contacto::findOrFail($id);
        return view('editar',compact('contactoActualizar'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Contacto  $contacto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $contactoUpdate = App\Contacto::findOrFail($id);
        $contactoUpdate->nombre = $request->nombre;
        $contactoUpdate->apellido = $request->apellido;
        $contactoUpdate->correo = $request->correo;
        $contactoUpdate->save();

        return back()->with('update','El contacto se actualizó correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Contacto  $contacto
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $contactoEliminar = App\Contacto::findOrFail($id);
        $contactoEliminar->delete();

        return back()->with('eliminar','El contacto se eliminó correctamente');

    }
}
