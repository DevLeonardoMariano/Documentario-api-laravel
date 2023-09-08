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
        $documentario = Documentario::all();

        return $documentario;
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
        $documentario = new Documentario($request->all());

        $documentario->save();

        return $documentario;
    }

    /**
     * Display the specified resource.
     */
    public function show(Documentario $documentario)
    {
        return $documentario;
    }

  

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDocumentarioRequest $request, Documentario $documentario)
    {
        $documentario->update($request->all());

        return $documentario;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Documentario $documentario)
    {
        //
    }
}
