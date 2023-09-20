<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Exercise;

class ExerciseController extends Controller
{
    // ============== RETORNA TODOS OS EXERCÍCIOS ==============
    public function index()
    {
        // Retorno de todas as informações dos exercícios
        return Exercise::all();
    }

    /*
    public function create()
    {
        //
    }
    */

    // ============== SALVA UM NOVO EXERCÍCIO ==============
    public function store(Request $request)
    {
        $exercise = $request->all();
        $exercise = Exercise::create($exercise);
        if ($exercise) {
            return response()->json([
                "message" => 'Exercício criado com sucesso',
                "status" => 200,
                "data" => $exercise
            ], 200);
        }
        return $this->error('Erro ao criar exercício', 400);
    }

    // ============== EXIBE UM EXERCÍCIO PELO ID ==============
    public function show(string $id)
    {
        $exercise = Exercise::find($id);
        if ($exercise) {
            return response()->json([
                "message" => 'Exercício obtido com sucesso',
                "status" => 200,
                "data" => $exercise
            ], 200);
        }
        return $this->error('Erro ao obter dados do exercício', 400);
    }

    /*
    public function edit(string $id)
    {
        //
    }
    */

    // ============== ATUALIZA UM EXERCÍCIO PELO ID ==============
    public function update(Request $request, string $id)
    {
        $exercise = Exercise::find($id)->update([
            'exercise_name' => $request->exercise_name,
            'exercise_description' => $request->exercise_description,
            'exercise_url_picture' => $request->exercise_url_picture
        ]);
        if ($exercise) {
            return response()->json([
                "message" => 'Exercício atualizado com sucesso',
                "status" => 200,
                "data" => $request->all()
            ], 200);
        }
        return $this->error('Erro ao atualizar exercício', 400);
    }

    // ============== DELETA UM EXERCÍCIO PELO ID ==============
    public function destroy(string $id)
    {
        $exercise = Exercise::find($id)->delete();
        if ($exercise) {
            return response()->json([
                "message" => 'Exercício deletado com sucesso',
                "status" => 200
            ], 200);
        }
        return $this->error('Erro ao remover exercício', 400);
    }
}
