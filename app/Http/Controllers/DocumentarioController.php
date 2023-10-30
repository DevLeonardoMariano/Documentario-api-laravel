<?php

namespace App\Http\Controllers;

use App\Models\Documentario;
use App\Http\Requests\StoreDocumentarioRequest;
use App\Http\Requests\UpdateDocumentarioRequest;
use Exception;

class DocumentarioController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     * @return \Illuminate\Http\Response
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
     * 
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     * 
     * @param  \App\Http\Requests\StoreDocumentarioRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDocumentarioRequest $request)
    {
        try {
            
            $file = $request->file('imagem');
            $imageName = time().'.'.$file->extension();
            $imagePath = public_path(). '/images';
            $file->move($imagePath, $imageName);

            $data = $request->all();

            $documentario = new Documentario(["titulo" => $data["titulo"],  "autor" => $data["autor"], 
            "resumo" => $data["resumo"], "imagem" => $imageName]);

            $documentario->save();

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
     * 
     * @param  \App\Models\Documentario  $documentario
     * @return \Illuminate\Http\Response
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
     * 
     * @param  \App\Http\Requests\UpdateDocumentarioRequest  $request
     * @param  \App\Models\Documentario  $documentario
     * @return \Illuminate\Http\Response
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
     * 
     * @param  \App\Models\Documentario  $documentario
     * @return \Illuminate\Http\Response
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
                "status" => 0,
                "error" => $e->getMessage()
            ];

        }
    }
    
}
