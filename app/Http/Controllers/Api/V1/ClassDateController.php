<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ClassDate;

class ClassDateController extends Controller
{
    // ============== RETORNA TODAS AS AULA-DATA ==============
    public function index()
    {
        // Retorno de todas as informações das aulas-datas
        return ClassDate::all();
    }

    /*
    public function create()
    {
        //
    }
    */

    // ============== SALVA UMA NOVA AULA-DATA ==============
    public function store(Request $request)
    {
        $classDate = $request->all();
        $classDate = ClassDate::create($classDate);
        if ($classDate) {
            return response()->json([
                "message" => 'Aula-data criada com sucesso',
                "status" => 200,
                "data" => $classDate
            ], 200);
        }
        return $this->error('Erro ao criar aula-data', 400);
    }

    // ============== EXIBE UMA AULA-DATA PELO ID ==============
    public function show(string $id)
    {
        $classDate = ClassDate::find($id);
        if ($classDate) {
            return response()->json([
                "message" => 'Aula-data obtida com sucesso',
                "status" => 200,
                "data" => $classDate
            ], 200);
        }
        return $this->error('Erro ao obter dados da aula-data', 400);
    }

    /*
    public function edit(string $id)
    {
        //
    }
    */

    // ============== ATUALIZA UMA AULA-DATA PELO ID ==============
    public function update(Request $request, string $id)
    {
        $classDate = ClassDate::find($id)->update([
            'id_class' => $request->id_class,
            'class_date' => $request->class_date,
            'class_start_time' => $request->class_start_time,
            'class_duration' => $request->class_duration
        ]);
        if ($classDate) {
            return response()->json([
                "message" => 'Aula-data atualizada com sucesso',
                "status" => 200,
                "data" => $request->all()
            ], 200);
        }
        return $this->error('Erro ao atualizar aula-data', 400);
    }

    // ============== DELETA UMA AULA-DATA PELO ID ==============
    public function destroy(string $id)
    {
        $classDate = ClassDate::find($id)->delete();
        if ($classDate) {
            return response()->json([
                "message" => 'Aula-data deletada com sucesso',
                "status" => 200
            ], 200);
        }
        return $this->error('Erro ao remover aula-data', 400);
    }
}
