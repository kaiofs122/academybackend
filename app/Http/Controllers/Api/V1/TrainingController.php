<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Training;

class TrainingController extends Controller
{
    // ============== RETORNA TODOS OS TREINOS ==============
    public function index()
    {
        // Retorno de todas as informações dos treinos
        return Training::all();
    }

    /*
    public function create()
    {
        //
    }
    */

    // ============== SALVA UM NOVO TREINO ==============
    public function store(Request $request)
    {
        $training = $request->all();
        $training = Training::create($training);
        if ($training) {
            return response()->json([
                "message" => 'Treino criado com sucesso',
                "status" => 200,
                "data" => $training
            ], 200);
        }
        return $this->error('Erro ao criar treino', 400);
    }

    // ============== EXIBE UM TREINO PELO ID ==============
    public function show(string $id)
    {
        $training = Training::find($id);
        if ($training) {
            return response()->json([
                "message" => 'Treino obtido com sucesso',
                "status" => 200,
                "data" => $training
            ], 200);
        }
        return $this->error('Erro ao obter dados do treino', 400);
    }

    /*
    public function edit(string $id)
    {
        //
    }
    */

    // ============== ATUALIZA UM TREINO PELO ID ==============
    public function update(Request $request, string $id)
    {
        $training = Training::find($id)->update([
            'id_instructor' => $request->id_instructor,
            'id_student' => $request->id_student
        ]);
        if ($training) {
            return response()->json([
                "message" => 'Treino atualizado com sucesso',
                "status" => 200,
                "data" => $request->all()
            ], 200);
        }
        return $this->error('Erro ao atualizar treino', 400);
    }

    // ============== DELETA UM TREINO PELO ID ==============
    public function destroy(string $id)
    {
        $training = Training::find($id)->delete();
        if ($training) {
            return response()->json([
                "message" => 'Treino deletado com sucesso',
                "status" => 200
            ], 200);
        }
        return $this->error('Erro ao remover treino', 400);
    }
}
