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
        try{
            // Retorno de todas as informações das aulas-datas
            return ClassDate::all();
        } catch (\Exception $e){
            return response()->json([
                "message" => 'Erro ao listar Horários das aulas: ' . $e->getMessage(),
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

    // ============== SALVA UMA NOVA AULA-DATA ==============
    public function store(Request $request)
    {
        $rules = ['id_class' => 'required',
                'class_hour' => 'required',
                'class_start_time' => 'required',
                'class_duration' => 'required',];
        try {
            $classDateData = $request->all();
            $this->validate($request, $rules);
            $classDate = ClassDate::create($classDateData);
            if ($classDate) {
                return response()->json([
                    "message" => 'Horário de aula criado com sucesso',
                    "status" => 200,
                    "data" => $classDate
                ], 200);
            }
        } catch (\Exception $e){
            return response()->json([
                "message" => 'Erro ao criar Horário de aula: ' . $e->getMessage(),
                "status" => 400
            ], 400);
        }
    }

    // ============== EXIBE UMA AULA-DATA PELO ID ==============
    public function show(string $id)
    {   
        try {
            $classDate = ClassDate::find($id);
            if ($classDate) {
                return response()->json([
                    "message" => 'Horário de aula obtido com sucesso',
                    "status" => 200,
                    "data" => $classDate
                ], 200);
            }
        } catch (\Exception $e){
            return response()->json([
                "message" => 'Erro ao exibir Horário de aula: ' . $e->getMessage(),
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

    // ============== ATUALIZA UMA AULA-DATA PELO ID ==============
    public function update(Request $request, string $id)
    {
        $rules = ['id_class' => 'required',
                'class_hour' => 'required',
                'class_start_time' => 'required',
                'class_duration' => 'required',];
        try {
            $this->validate($request, $rules);
            $classDate = ClassDate::find($id)->update([
                'id_class' => $request->id_class,
                'class_date' => $request->class_date,
                'class_start_time' => $request->class_start_time,
                'class_duration' => $request->class_duration
            ]);
            if ($classDate) {
                return response()->json([
                    "message" => 'Horário de aula atualizado com sucesso',
                    "status" => 200,
                    "data" => $request->all()
                ], 200);
            }
        } catch (\Exception $e){
            return response()->json([
                "message" => 'Erro ao atualizar Horário de aula: ' . $e->getMessage(),
                "status" => 400
            ], 400);
        }
    }
    

    // ============== DELETA UMA AULA-DATA PELO ID ==============
    public function destroy(string $id)
    {
        try {
            $classDate = ClassDate::find($id)->delete();
            if ($classDate) {
                return response()->json([
                    "message" => 'Horário de aula deletado com sucesso',
                    "status" => 200
                ], 200);
            }
        } catch (\Exception $e) {
            return response()->json([
                "message" => 'Erro ao deletar Horário de aula: ' . $e->getMessage(),
                "status" => 400
            ], 400);
        }
    }
}