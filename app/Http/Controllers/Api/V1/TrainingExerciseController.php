<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\TrainingExercise;

class TrainingExerciseController extends Controller
{
    // ============== RETORNA TODAS AS RELAÇÕES TREINO-EXERCÍCIO ==============
    public function index()
    {
        try {
            // Retorno de todas as informações das relações treino-exercício
            return TrainingExercise::all();
        } catch (\Exception $e) {
            return response()->json([
                "message" => 'Erro ao exibir relações Treino-Exercício: ' . $e->getMessage(),
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

    // ============== SALVA UMA NOVA RELAÇÃO TREINO-EXERCÍCIO ==============
    public function store(Request $request)
    {
        $rules = [
                'id_training' => 'required',
                'id_exercise' => 'required',
                'training_repetitions' => 'required',
                'training_series' => 'required',
                ];
        try {
            $trainingExerciseData = $request->all();
            $this->validate($request, $rules);
            $trainingExercise = TrainingExercise::create($trainingExerciseData);
            if ($trainingExercise) {
                return response()->json([
                    "message" => 'Relação Treino-Exercício criada com sucesso',
                    "status" => 200,
                    "data" => $trainingExercise
                ], 200);
            }
        } catch (\Exception $e) {
            return response()->json([
                "message" => 'Erro ao salvar relação Treino-Exercício: ' . $e->getMessage(),
                "status" => 400
            ], 400);
        }
    }

    // ============== EXIBE UMA RELAÇÃO TREINO-EXERCÍCIO PELO ID ==============
    public function show(string $id)
    {
        try {
            $trainingExercise = TrainingExercise::find($id);
            if ($trainingExercise) {
                return response()->json([
                    "message" => 'Relação Treino-Exercício obtida com sucesso',
                    "status" => 200,
                    "data" => $trainingExercise
                ], 200);
            }
        } catch (\Exception $e) {
            return response()->json([
                "message" => 'Erro ao obter relação Treino-Exercício: ' . $e->getMessage(),
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

    // ============== ATUALIZA UMA RELAÇÃO TREINO-EXERCÍCIO PELO ID ==============
    public function update(Request $request, string $id)
    {
        $rules = [
            'id_training' => 'required',
            'id_exercise' => 'required',
            'training_repetitions' => 'required',
            'training_series' => 'required',
            ];
        try {
            $this->validate($request, $rules);
            $trainingExercise = TrainingExercise::find($id)->update([
                'id_training' => $request->id_training,
                'id_exercise' => $request->id_exercise,
                'training_repetitions' => $request->training_repetitions,
                'training_series' => $request->training_series,
            ]);
            if ($trainingExercise) {
                return response()->json([
                    "message" => 'Relação Treino-Exercício atualizada com sucesso',
                    "status" => 200,
                    "data" => $request->all()
                ], 200);
            }
        } catch (\Exception $e) {
            return response()->json([
                "message" => 'Erro ao atualizar relação Treino-Exercício: ' . $e->getMessage(),
                "status" => 400
            ], 400);
        }
    }

    // ============== DELETA UMA RELAÇÃO TREINO-EXERCÍCIO PELO ID ==============
    public function destroy(string $id)
    {
        try {
            $trainingExercise = TrainingExercise::find($id)->delete();
            if ($trainingExercise) {
                return response()->json([
                    "message" => 'Relação Treino-Exercício deletada com sucesso',
                    "status" => 200
                ], 200);
            }
        } catch (\Exception $e) {
            return response()->json([
                "message" => 'Erro ao deletar relação Treino-Exercício: ' . $e->getMessage(),
                "status" => 400
            ], 400);
        }
    }
}
