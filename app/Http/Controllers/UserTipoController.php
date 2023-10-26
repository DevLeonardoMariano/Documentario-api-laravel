<?php

namespace App\Http\Controllers;

use App\Models\UserTipo;
use App\Http\Requests\StoreUserTipoRequest;
use App\Http\Requests\UpdateUserTipoRequest;
use Exception;

class UserTipoController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $obj = new UserTipo();
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
     * @param  \App\Http\Requests\StoreUserTipoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserTipoRequest $request)
    {
        try {
            
            $obj = new UserTipo();
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
     * 
     * @param  \App\Models\UserTipo  $userTipo
     * @return \Illuminate\Http\Response
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
     * 
     * @param  \App\Models\UserTipo  $userTipo
     * @return \Illuminate\Http\Response
     */
    public function edit(UserTipo $userTipo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     * 
     * @param  \App\Http\Requests\UpdateUserTipoRequest  $request
     * @param  \App\Models\UserTipo  $userTipo
     * @return \Illuminate\Http\Response
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
     * 
     * @param  \App\Models\UserTipo  $userTipo
     * @return \Illuminate\Http\Response
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
