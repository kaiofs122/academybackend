<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
// use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    // ============== RETORNA TODOS OS USUÁRIOS ==============
    public function index()
    {
        // Retorno de todas as informações dos usuários
        return User::all();

        // Retorno de apenas nome e email dos usuários
        // return User::select('name as NomeUsuario', 'email as EmailUsuario')->get();
    }

    /*
    public function create()
    {
        //
    }
    */

    // ============== SALVA UM NOVO USUÁRIO ==============
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
        return $this->error('Erro ao criar usuário', 400);
    }

    // ============== EXIBE UM USUÁRIO PELO ID ==============
    public function show(string $id)
    {
        $user = User::find($id);
        if ($user) {
            return response()->json([
                "message" => 'Usuário obtido com sucesso',
                "status" => 200,
                "data" => $user
            ], 200);
        }
        return $this->error('Erro ao obter dados do usuário', 400);
    }

    /*
    public function edit(string $id)
    {
        //
    }
    */

    // ============== ATUALIZA UM USUÁRIO PELO ID ==============
    public function update(Request $request, string $id)
    {
        $user = User::find($id)->update([
            'id' => $request->id,
            'user_email' => $request->user_email,
            'user_password' => $request->user_password
        ]);
        if ($user) {
            return response()->json([
                "message" => 'Usuário atualizado com sucesso',
                "status" => 200,
                "data" => $request->all()
            ], 200);
        }
        return $this->error('Erro ao atualizar usuário', 400);
    }

    // ============== DELETA UM USUÁRIO PELO ID ==============
    public function destroy(string $id)
    {
        $user = User::find($id)->delete();
        if ($user) {
            return response()->json([
                "message" => 'Usuário deletado com sucesso',
                "status" => 200
            ], 200);
        }
        return $this->error('Erro ao remover usuário', 400);
    }
}
