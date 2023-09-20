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
        // Retorno de todas as informações das aulas
        return ClassModel::all();
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
        $class = $request->all();
        $class = ClassModel::create($class);
        if ($class) {
            return response()->json([
                "message" => 'Aula criada com sucesso',
                "status" => 200,
                "data" => $class
            ], 200);
        }
        return $this->error('Erro ao criar aula', 400);
    }

    // ============== EXIBE UMA AULA PELO ID ==============
    public function show(string $id)
    {
        $class = ClassModel::find($id);
        if ($class) {
            return response()->json([
                "message" => 'Aula obtida com sucesso',
                "status" => 200,
                "data" => $class
            ], 200);
        }
        return $this->error('Erro ao obter dados da aula', 400);
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
        return $this->error('Erro ao atualizar aula', 400);
    }

    // ============== DELETA UMA AULA PELO ID ==============
    public function destroy(string $id)
    {
        $class = ClassModel::find($id)->delete();
        if ($class) {
            return response()->json([
                "message" => 'Aula deletada com sucesso',
                "status" => 200
            ], 200);
        }
        return $this->error('Erro ao remover aula', 400);
    }
}
