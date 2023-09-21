<?php

namespace App\Http\Controllers;

use App\Models\UserTipo;
use App\Http\Requests\StoreUserTipoRequest;
use App\Http\Requests\UpdateUserTipoRequest;

class UserTipoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $obj = new userTipo();
            $userTipo = $obj->all();

            return [
                'status' => 1,
                'data' => $userTipo
            ];

        } catch (Exception $e){

            return [
                "status" => 0,
                "error" => $e->getMessage(),
            ];
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserTipoRequest $request)
    {
        try {
            
            $obj = new userTipo();
            $userTipo = $obj->create($request->all());

            return [
                'status' => 1,
                'data' => $userTipo
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
    public function show(UserTipo $userTipo)
    {
        try {

            return [
                "status" => 1,
                "data" => $userTipo
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
     */
    public function edit(UserTipo $userTipo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserTipoRequest $request, UserTipo $userTipo)
    {
        try {
            $userTipo->update($request->all());

            return [
                "status" => 1,
                "data" => $userTipo
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
    public function destroy(UserTipo $userTipo)
    {
        try {

            $userTipo->delete();

            return [
                "status" => 1,
                "data" => $userTipo
            ];

        } catch (Exception $e){

            return [
                "status" => 1,
                "error" => $e->getMessage()
            ];

        }
    }
    
}
