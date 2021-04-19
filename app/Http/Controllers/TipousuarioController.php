<?php

namespace App\Http\Controllers;

use App\Models\tipousuario;
use Illuminate\Http\Request;

class TipousuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }
    public function store(){
        // metodo mostrar algo especifico
        return view('tipousuario.store');
        }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\tipousuario  $tipousuario
     * @return \Illuminate\Http\Response
     */
    public function show(tipousuario $tipousuario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\tipousuario  $tipousuario
     * @return \Illuminate\Http\Response
     */
    public function edit(tipousuario $tipousuario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\tipousuario  $tipousuario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, tipousuario $tipousuario)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\tipousuario  $tipousuario
     * @return \Illuminate\Http\Response
     */
    public function destroy(tipousuario $tipousuario)
    {
        //
    }
}
