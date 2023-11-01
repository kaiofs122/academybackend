<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentPhysicalActivity;

class StudentPhysicalActivityController extends Controller
{
    // ============== RETORNA TODOS AS ATIVIDADES FISICAS DOS ALUNOS ==============
    public function index()
    {
        try {
            // Retorno de todas as informações das atividades fisicas
            return StudentPhysicalActivity::all();
        } catch (\Exception $e){
            return response()->json([
                "message" => 'Erro ao listar Atividade fisica: ' . $e->getMessage(),
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

    // ============== SALVA UMA NOVA ATIVIDADE FISICA DO ALUNO ==============
    public function store(Request $request)
    {
        $rules = [
            'physical_activity_name' => 'required',
            'physical_activity_frequency' => 'required',
            'physical_activity_duration' => 'required',
        ];
        try {
            $studentPhysicalActivityData = $request->all();
            $this->validate($request, $rules);
            $studentPhysicalActivity = StudentPhysicalActivity::create($studentPhysicalActivityData);
            if ($studentPhysicalActivity) {
                return response()->json([
                    "message" => 'Atividade fisica criada com sucesso',
                    "status" => 200,
                    "data" => $studentPhysicalActivity
                ], 200);
            }
        } catch (\Exception $e){
            return response()->json([
                "message" => 'Erro ao criar Atividade fisica: ' . $e->getMessage(),
                "status" => 400
            ], 400);
        }
    }

    // ============== EXIBE UM ATIVIDADE FISICA DO ALUNO PELO ID ==============
    public function show(string $id)
    {
        try {
            $studentPhysicalActivity = StudentPhysicalActivity::find($id);
            if ($studentPhysicalActivity) {
                return response()->json([
                    "message" => 'Atividade fisica obtida com sucesso',
                    "status" => 200,
                    "data" => $studentPhysicalActivity
            ], 200);
            }
        } catch (\Exception $e) {
            return response()->json([
                "message" => 'Erro ao exibir Atividade fisica: ' . $e->getMessage(),
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

    // ============== ATUALIZA UMA ATIVIDADE FISICA DO ALUNO PELO ID ==============
    public function update(Request $request, string $id)
    {
        $rules = [
            'physical_activity_name' => 'required',
            'physical_activity_frequency' => 'required',
            'physical_activity_duration' => 'required',
        ];
        try {
            $this->validate($request, $rules);
            $studentPhysicalActivity = StudentPhysicalActivity::find($id)->update([
                'physical_activity_name' => $request->physical_activity_name,
                'physical_activity_frequency' => $request->physical_activity_frequency,
                'physical_activity_duration' => $request->physical_activity_duration
            ]);
            if ($studentPhysicalActivity) {
                return response()->json([
                    "message" => 'Atividade fisica atualizada com sucesso',
                    "status" => 200,
                    "data" => $request->all()
                ], 200);
            }
        } catch (\Exception $e) {
            return response()->json([
                "message" => 'Erro ao atualizar Atividade fisica: ' . $e->getMessage(),
                "status" => 400
            ], 400);
        }
    }

    // ============== DELETA UMA ATIVIDADE FISICA DO ALUNO PELO ID ==============
    public function destroy(string $id)
    {
        try {
            $studentPhysicalActivity = StudentPhysicalActivity::find($id)->delete();
            if ($studentPhysicalActivity) {
                return response()->json([
                    "message" => 'Atividade fisica deletada com sucesso',
                    "status" => 200
               ], 200);
            }
        } catch (\Exception $e) {
            return response()->json([
                "message" => 'Erro ao deletar Atividade fisica: ' . $e->getMessage(),
                "status" => 400
            ], 400);
        }
    }
}
