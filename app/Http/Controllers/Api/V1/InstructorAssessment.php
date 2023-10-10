<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\InstructorAssessment;

class InstructorAssessmentController extends Controller
{
    // ============== RETORNA TODAS AS AVALIAÇÕES ==============
    public function index()
    {
        try {
            // Retorno de todas as informações das avaliações
            return InstructorAssessment::all();
        } catch (\Exception $e) {
            return response()->json([
                "message" => 'Erro ao listar Avaliações: ' . $e->getMessage(),
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

    // ============== SALVA UMA NOVA AVALIAÇÃO ==============
    public function store(Request $request)
    {
        $rules = [
                'id_instructor' => 'required',
                'id_student' => 'required',
                'amount_stars_didatic' => 'required',
                'amount_stars_patience' => 'required',
                'amount_stars_charisma' => 'required',
                ];
        try {
            $instructorAssessmentData = $request->all();
            $this->validate($request, $rules);
            $instructorAssessment = InstructorAssessment::create($instructorAssessmentData);
            if ($instructorAssessment) {
                return response()->json([
                    "message" => 'Avaliação criada com sucesso',
                    "status" => 200,
                    "data" => $instructorAssessment
                ], 200);
            }
        } catch (\Exception $e) {
            return response()->json([
                "message" => 'Erro ao criar Avaliação: ' . $e->getMessage(),
                "status" => 400
            ], 400);
        }
    }

    // ============== EXIBE UMA AVALIAÇÃO PELO ID ==============
    public function show(string $id)
    {
        try {
            $instructorAssessment = InstructorAssessment::find($id);
            if ($instructorAssessment) {
                return response()->json([
                    "message" => 'Avaliação obtida com sucesso',
                    "status" => 200,
                    "data" => $instructorAssessment
                ], 200);  
            } 
        } catch (\Exception $e){
            return response()->json([
                "message" => 'Erro ao exibir avaliação: ' . $e->getMessage(),
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

    // ============== ATUALIZA UMA AVALIAÇÃO PELO ID ==============
    public function update(Request $request, string $id)
    {
        $rules = [
                'id_instructor' => 'required',
                'id_student' => 'required',
                'amount_stars_didatic' => 'required',
                'amount_stars_patience' => 'required',
                'amount_stars_charisma' => 'required',
                ];
        try {
            $this->validate($request, $rules);
            $instructorAssessment = InstructorAssessment::find($id)->update([
                'assessment_count' => $request->assessment_count,
                'average_stars' => $request->average_stars
            ]);
            if ($instructorAssessment) {
                return response()->json([
                    "message" => 'Avaliação atualizada com sucesso',
                    "status" => 200,
                    "data" => $request->all()
                ], 200);
            }
        } catch (\Exception $e){
            return response()->json([
                "message" => 'Erro ao atualizar Avaliação: ' . $e->getMessage(),
                "status" => 400
            ], 400);
        }

    }

    // ============== DELETA UMA AVALIAÇÃO PELO ID ==============
    public function destroy(string $id)
    {
        try {
            $instructorAssessment = InstructorAssessment::find($id)->delete();
            if ($instructorAssessment) {
                return response()->json([
                    "message" => 'Avaliação deletada com sucesso',
                    "status" => 200
                ], 200);
            }  
        } catch (\Exception $e) {
            return response()->json([
                "message" => 'Erro ao deletar Avaliação: ' . $e->getMessage(),
                "status" => 400
            ], 400);
        }
    }
}
