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
        try {
            // Retorno de todas as informações dos exercícios
            return Exercise::all();
        } catch (\Exception $e){
            return response()->json([
                "message" => 'Erro ao listar Exercícios: ' . $e->getMessage(),
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

    // ============== SALVA UM NOVO EXERCÍCIO ==============
    public function store(Request $request)
    {
        $rules = ['exercise_name' => 'required',
                'exercise_description' => 'required',
                'exercise_url_tutorial' => 'required',
                ];
        try {
            $exerciseData = $request->all();
            $this->validate($request, $rules);
            $exercise = Exercise::create($exerciseData);
            if ($exercise) {
                return response()->json([
                    "message" => 'Exercício criado com sucesso',
                    "status" => 200,
                    "data" => $exercise
                ], 200);
            }
        } catch (\Exception $e){
            return response()->json([
                "message" => 'Erro ao criar Exercício: ' . $e->getMessage(),
                "status" => 400
            ], 400);
        }
    }

    // ============== EXIBE UM EXERCÍCIO PELO ID ==============
    public function show(string $id)
    {
        try {
            $exercise = Exercise::find($id);
            if ($exercise) {
                return response()->json([
                    "message" => 'Exercício obtido com sucesso',
                    "status" => 200,
                    "data" => $exercise
                ], 200);
            }
        } catch (\Exception $e) {
            return response()->json([
                "message" => 'Erro ao exibir Exercício: ' . $e->getMessage(),
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

    // ============== ATUALIZA UM EXERCÍCIO PELO ID ==============
    public function update(Request $request, string $id)
    {
        $rules = ['exercise_name' => 'required',
                'exercise_description' => 'required',
                'exercise_url_tutorial' => 'required',
                ];
        try {
            $this->validate($request, $rules);
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
        } catch (\Exception $e){
            return response()->json([
                "message" => 'Erro ao atualizar Exercício: ' . $e->getMessage(),
                "status" => 400
            ], 400);
        }
 
    }

    // ============== DELETA UM EXERCÍCIO PELO ID ==============
    public function destroy(string $id)
    {
        try {
            $exercise = Exercise::find($id)->delete();
            if ($exercise) {
                return response()->json([
                    "message" => 'Exercício deletado com sucesso',
                    "status" => 200
                ], 200);
            }
        } catch (\Exceptio $e){
            return response()->json([
                "message" => 'Erro ao deletar Exercício: ' . $e->getMessage(),
                "status" => 400
            ], 400);
        }
    }
}
