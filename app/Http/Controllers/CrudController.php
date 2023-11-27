<?php

namespace App\Http\Controllers;

use App\Models\Crud;
use Illuminate\Http\Request;

class CrudController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $crud = new Crud();
        $crud = Crud::all();
        return response()->json($crud);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    
     public function store(Request $request)
    {
        $data = $request->all();
        $nuevo_crud = Crud::create($data);
        return response()->json($nuevo_crud);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Crud  $crud
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {   
        $crud = Crud::find($id);
        return response()->json($crud);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Crud  $crud
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
        $crud = Crud::find($id);
        $crud = $crud->fill($request->all());
        $crud->save();

        return response()->json($crud);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Crud  $crud
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        $crud = Crud::find($id);
        $crud->delete();
        return response()->json(['message','Se eliminó correctamente']);
    }
}
