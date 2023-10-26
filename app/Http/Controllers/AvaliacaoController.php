<?php

namespace App\Http\Controllers;

use App\Models\Avaliacao;
use App\Http\Requests\StoreAvaliacaoRequest;
use App\Http\Requests\UpdateAvaliacaoRequest;
use App\Models\Documentario;
use Exception;

class AvaliacaoController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {

            $obj = new Avaliacao();
            $avaliacao = $obj->all();

            return [
                'status' => 1,
                'data' => $avaliacao
            ];

        } catch (Exception $e) {
            
            return [
                "status" => 0,
                "error" => $e->getMessage(),
            ];
        };
    }

    /**
     * Show the form for creating a new resource.
     *  @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     * @param  \App\Http\Requests\StoreAvaliacaoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAvaliacaoRequest $request, Documentario $documentario)
    {
        try {
            
            $obj = new Avaliacao();
            $avaliacao = $obj->create(['documentario_id'=> $documentario->id,'nota' => $request->input('nota')]);

            return [
                'status' => 1,
                'data' => $avaliacao
            ];

        } catch (Exception $e){

            return [
                "status" => 0,
                "error" => $e->getMessage(),
            ];

        }
    }

    /**
     * Display the specified resource.
     * @param  \App\Models\Avaliacao  $avaliacao
     * @return \Illuminate\Http\Response
     */
    public function show(Avaliacao $avaliacao)
    {
        try {

            return [
                "status" => 1,
                "data" => $avaliacao
            ];

        } catch (Exception $e){

            return [
                "status" => 0,
                "error" => $e->getMessage(),
            ];

        }
    }

    /**
     * Show the form for editing the specified resource.
     * 
     *  @param  \App\Models\Avaliacao  $avaliacao
     * @return \Illuminate\Http\Response
     */
    public function edit(Avaliacao $avaliacao)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     * 
     * @param  \App\Http\Requests\UpdateAvaliacaoRequest  $request
     * @param  \App\Models\Avaliacao  $avaliacao
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAvaliacaoRequest $request, Avaliacao $avaliacao)
    {
        try {
            $avaliacao->update($request->all());

            return [
                "status" => 1,
                "data" => $avaliacao
            ];

        } catch (Exception $e){

            return [
                "status" => 0,
                "error" => $e->getMessage()
            ];
            
        }
    }

    /**
     * Remove the specified resource from storage.
     * @param  \App\Models\Avaliacao  $avaliacao
     * @return \Illuminate\Http\Response
     */
    public function destroy(Avaliacao $avaliacao)
    {
        try {

            $avaliacao->delete();

            return [
                "status" => 1,
                "data" => $avaliacao
            ];

        } catch (Exception $e){

            return [
                "status" => 1,
                "error" => $e->getMessage()
            ];

        }
    }
}
