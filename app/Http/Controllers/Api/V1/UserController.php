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
        try {
            // Retorno de todas as informações dos usuários
            return User::all();
            // Retorno de apenas nome e email dos usuários
            // return User::select('name as NomeUsuario', 'email as EmailUsuario')->get();
        } catch (\Exception $e) {
            return response()->json([
                "message" => 'Erro ao exibir Usuários: ' . $e->getMessage(),
                "status" => 400
            ], 400);
        }
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
        $rules = [
                'user_email' => 'required',
                'user_password' => 'required',
                ];
        try {
            $userData = $request->all();
            $this->validate($request, $rules);
            $userData['password'] = bcrypt($request->password);
            $user = User::create($userData);
            if ($user) {
                return response()->json([
                    "message" => 'Usuário criado com sucesso',
                    "status" => 200,
                    "data" => $user
                ], 200);
            }
        } catch (\Exception $e) {
            return response()->json([
                "message" => 'Erro ao salvar Usuário: ' . $e->getMessage(),
                "status" => 400
            ], 400);
        }
    }

    // ============== EXIBE UM USUÁRIO PELO ID ==============
    public function show(string $id)
    {
        try {
            $user = User::find($id);
            if ($user) {
                return response()->json([
                    "message" => 'Usuário obtido com sucesso',
                    "status" => 200,
                    "data" => $user
                ], 200);
            }
        } catch (\Exception $e) {
            return response()->json([
                "message" => 'Erro ao obter Usuário: ' . $e->getMessage(),
                "status" => 400
            ], 400);
        }
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
        $rules = [
            'user_email' => 'required',
            'user_password' => 'required',
            ];
        try {
            $this->validate($request, $rules);
            $user = User::find($id)->update([
                'user_email' => $request->user_email,
                'user_password' => bcrypt($request->password)
            ]);
            if ($user) {
                return response()->json([
                    "message" => 'Usuário atualizado com sucesso',
                    "status" => 200,
                    "data" => $request->all()
                ], 200);
            }
        } catch (\Exception $e) {
            return response()->json([
                "message" => 'Erro ao atualizar Usuário: ' . $e->getMessage(),
                "status" => 400
            ], 400);
        }
    }

    // ============== DELETA UM USUÁRIO PELO ID ==============
    public function destroy(string $id)
    {
        try {
            $user = User::find($id)->delete();
            if ($user) {
                return response()->json([
                    "message" => 'Usuário deletado com sucesso',
                    "status" => 200
                ], 200);
            }
        } catch (\Exception $e) {
            return response()->json([
                "message" => 'Erro ao deletar Usuário: ' . $e->getMessage(),
                "status" => 400
            ], 400);
        }
    }
}
