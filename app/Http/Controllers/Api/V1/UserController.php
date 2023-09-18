<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Retorno de todas as informações dos usuários
        return User::all();

        // Retorno de apenas nome e email dos usuários
        // return User::select('name as NomeUsuario', 'email as EmailUsuario')->get();
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
    public function store(Request $request)
    {
        $user = $request->all();
        $user['password'] = bcrypt($request->password);
        $user = User::create($user);
        if ($user) {
            return response()->json([
                "message" => 'Usuário criado com sucesso',
                "status" => 200,
                "data" => $user
            ], 200);
        }
        return $this->error('Erro ao criar usuario', 400);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
