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
        try {
            // Retorno de todas as informações dos treinos
            return Training::all();
        } catch (\Exception $e) {
            return response()->json([
                "message" => 'Erro ao exibir Treinos: ' . $e->getMessage(),
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

    // ============== SALVA UM NOVO TREINO ==============
    public function store(Request $request)
    {
        $rules = [
                'id_instructor' => 'required',
                'id_student' => 'required',
                ];
        try {
            $trainingData = $request->all();
            $this->validate($request, $rules);
            $training = Training::create($trainingData);
            if ($training) {
                return response()->json([
                    "message" => 'Treino criado com sucesso',
                    "status" => 200,
                    "data" => $training
                ], 200);
            }
        } catch (\Exception $e) {
            return response()->json([
                "message" => 'Erro ao salvar Treino: ' . $e->getMessage(),
                "status" => 400
            ], 400);
        }
    }

    // ============== EXIBE UM TREINO PELO ID ==============
    public function show(string $id)
    {
        try {
            $training = Training::find($id);
            if ($training) {
                return response()->json([
                    "message" => 'Treino obtido com sucesso',
                    "status" => 200,
                    "data" => $training
                ], 200);
            }
        } catch (\Exception $e) {
            return response()->json([
                "message" => 'Erro ao obter Treino: ' . $e->getMessage(),
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

    // ============== ATUALIZA UM TREINO PELO ID ==============
    public function update(Request $request, string $id)
    {
        $rules = [
                'id_instructor' => 'required',
                'id_student' => 'required',
                ];
        try {
            $this->validate($request, $rules);
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
        } catch (\Exception $e) {
            return response()->json([
                "message" => 'Erro ao atualizar Treino: ' . $e->getMessage(),
                "status" => 400
            ], 400);
        };
    }

    // ============== DELETA UM TREINO PELO ID ==============
    public function destroy(string $id)
    {
        try {
            $training = Training::find($id)->delete();
            if ($training) {
                return response()->json([
                    "message" => 'Treino deletado com sucesso',
                    "status" => 200
                ], 200);
            }
        } catch (\Exception $e) {
            return response()->json([
                "message" => 'Erro ao deletar Treino: ' . $e->getMessage(),
                "status" => 400
            ], 400);
        };
    }
}
