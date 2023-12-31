<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Exception;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     
        try {
            $obj = new User();
            $users = $obj->all();

            return [
                'status' => 1,
                'data' => $users
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
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     * 
     * @param  \App\Http\Requests\StoreUserRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
        
        try {
            
            $obj = new User();
            $user = $obj->create($request->all());

            return [
                'status' => 1,
                'data' => $user
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
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        
        try {

            return [
                "status" => 1,
                "data" => $user
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
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     * 
     * @param  \App\Http\Requests\UpdateUserRequest  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest  $request,  User $user)
    {
        
        try {
            $user->update($request->all());

            return [
                "status" => 1,
                "data" => $user
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
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        
        try {

            $user->delete();

            return [
                "status" => 1,
                "data" => $user
            ];

        } catch (Exception $e){

            return [
                "status" => 1,
                "error" => $e->getMessage()
            ];

        }

    }

    public function login(LoginRequest  $request){

        $input = $request->all();

        $credentials = [
            "email" => $input["email"],
            "password" => $input["password"]
        ];

        if (auth()->attempt($credentials)) {

            $usuario = auth()->user();
            $token = $usuario->createToken('Documentario')->accessToken;

            return response()->json([
                "status" => true,
                "token" => $token,
                "usuario" => $usuario,
            ], 200);

        } else {

            return response()->json([
                "status" => false,
                'error' => 'Você não tem permissão para fazer esta solicitação.'
            ], 401);

        };
    }

    public function logout()
    {
        if (auth()->check()) {
            auth()->user()->token()->revoke();

            return response()->json([
                'status' => true,
                'message' => 'Logout successful.'
            ], 200);

        } else {
            return response()->json([
                'status' => false,
                'error' => 'Erro de logout. Talvez o seu token já tenha sido revogado. Por favor, tente novamente se não for o caso.'
            ], 500);
        }
    }
}
