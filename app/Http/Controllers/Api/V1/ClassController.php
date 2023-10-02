<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ClassModel;

class ClassController extends Controller
{
    // ============== RETORNA TODAS AS AULAS ==============
    public function index()
    {
        try {
            // Retorno de todas as informações das aulas
            return ClassModel::all();
        } catch (\Exception $e){
            return response()->json([
                "message" => 'Erro ao listar aulas: ' . $e->getMessage(),
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

    // ============== SALVA UMA NOVA AULA ==============
    public function store(Request $request)
    {
        $rules = ['id_lesson' => 'required',
                'id_student' => 'required',];
        try {
            $classData = $request->all();
            $this->validate($request, $rules);
            $class = ClassModel::create($classData);
            if ($class) {
                return response()->json([
                    "message" => 'Aula criada com sucesso',
                    "status" => 200,
                    "data" => $class
                ], 200);
            }
        } catch (\Exception $e){
            return response()->json([
                "message" => 'Erro ao criar aula: ' . $e->getMessage(),
                "status" => 400
            ], 400);
        }
    }

    // ============== EXIBE UMA AULA PELO ID ==============
    public function show(string $id)
    {
        try {
            $class = ClassModel::find($id);
            if ($class) {
                return response()->json([
                    "message" => 'Aula obtida com sucesso',
                    "status" => 200,
                    "data" => $class
            ], 200);
            }
        } catch (\Exception $e) {
            return response()->json([
                "message" => 'Erro ao exibir aula: ' . $e->getMessage(),
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

    // ============== ATUALIZA UMA AULA PELO ID ==============
    public function update(Request $request, string $id)
    {
        $rules = ['id_lesson' => 'required',
                'id_student' => 'required',];
        try {
            $this->validate($request, $rules);
            $class = ClassModel::find($id)->update([
                'id_lesson' => $request->id_lesson,
                'id_student' => $request->id_student
            ]);
            if ($class) {
                return response()->json([
                    "message" => 'Aula atualizada com sucesso',
                    "status" => 200,
                    "data" => $request->all()
                ], 200);
            }
        } catch (\Exception $e) {
            return response()->json([
                "message" => 'Erro ao atualizar aula: ' . $e->getMessage(),
                "status" => 400
            ], 400);
        }
    }

    // ============== DELETA UMA AULA PELO ID ==============
    public function destroy(string $id)
    {
        try {
            $class = ClassModel::find($id)->delete();
            if ($class) {
                return response()->json([
                    "message" => 'Aula deletada com sucesso',
                    "status" => 200
               ], 200);
            }
        } catch (\Exception $e) {
            return response()->json([
                "message" => 'Erro ao deletar aula: ' . $e->getMessage(),
                "status" => 400
            ], 400);
        }
    }
}
