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
        // Retorno de todas as informações das relações treino-exercício
        return TrainingExercise::all();
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
        $trainingExercise = $request->all();
        $trainingExercise = TrainingExercise::create($trainingExercise);
        if ($trainingExercise) {
            return response()->json([
                "message" => 'Relação treino-exercício criada com sucesso',
                "status" => 200,
                "data" => $trainingExercise
            ], 200);
        }
        return $this->error('Erro ao criar relação treino-exercício', 400);
    }

    // ============== EXIBE UMA RELAÇÃO TREINO-EXERCÍCIO PELO ID ==============
    public function show(string $id)
    {
        $trainingExercise = TrainingExercise::find($id);
        if ($trainingExercise) {
            return response()->json([
                "message" => 'Relação treino-exercício obtida com sucesso',
                "status" => 200,
                "data" => $trainingExercise
            ], 200);
        }
        return $this->error('Erro ao obter dados da relação treino-exercício', 400);
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
        $trainingExercise = TrainingExercise::find($id)->update([
            'id_training' => $request->id_training,
            'id_exercise' => $request->id_exercise,
            'training_repetitions' => $request->training_repetitions,
            'training_series' => $request->training_series,
        ]);
        if ($trainingExercise) {
            return response()->json([
                "message" => 'Relação treino-exercício atualizada com sucesso',
                "status" => 200,
                "data" => $request->all()
            ], 200);
        }
        return $this->error('Erro ao atualizar relação treino-exercício', 400);
    }

    // ============== DELETA UMA RELAÇÃO TREINO-EXERCÍCIO PELO ID ==============
    public function destroy(string $id)
    {
        $trainingExercise = TrainingExercise::find($id)->delete();
        if ($trainingExercise) {
            return response()->json([
                "message" => 'Relação treino-exercício deletada com sucesso',
                "status" => 200
            ], 200);
        }
        return $this->error('Erro ao remover relação treino-exercício', 400);
    }
}
