<?php

namespace App\Http\Controllers;

use App\Models\Documentario;
use App\Http\Requests\StoreDocumentarioRequest;
use App\Http\Requests\UpdateDocumentarioRequest;

class DocumentarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {

            $obj = new Documentario();
            $documentario = $obj->all();

            return [
                'status' => 1,
                'data' => $documentario
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
     */
    // public function create()
    // {
    //     //
    // }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDocumentarioRequest $request)
    {
        try {
            
            $obj = new Documentario();
            $documentario = $obj->create($request->all());

            return [
                'status' => 1,
                'data' => $documentario
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
     */
    public function show(Documentario $documentario)
    {
        try {

            return [
                'status' => 1,
                'data' => $documentario
            ];

        } catch (Exception $e){

            return [
                "status" => 0,
                "error" => $e->getMessage(),
            ];

        }
    }

  

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDocumentarioRequest $request, Documentario $documentario)
    {
        try {
            $documentario->update($request->all());

            return [
                "status" => 1,
                "data" => $documentario
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
     */
    public function destroy(Documentario $documentario)
    {
        try {

            $documentario->delete();

            return [
                "status" => 1,
                "data" => $documentario
            ];

        } catch (Exception $e){

            return [
                "status" => 1,
                "error" => $e->getMessage()
            ];

        }
    }
    
}
