<?php

namespace App\Http\Controllers\Api\V1;

use IllUMAinate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\GeneralAssessment;

class GeneralAssessmentController extends Controller
{
    // ============== RETORNA TODAS AS AVALIAÇÕES ==============
    public function index()
    {
        try {
            // Retorno de todas as informações das avaliações
            return GeneralAssessment::all();
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
        $rules = ['assessment_count' => 'required',
                'average_stars' => 'required',];
        try {
            $generalAssessmentData = $request->all();
            $this->validate($request, $rules);
            $generalAssessment = GeneralAssessment::create($generalAssessmentData);
            if ($generalAssessment) {
                return response()->json([
                    "message" => 'Avaliação criada com sucesso',
                    "status" => 200,
                    "data" => $generalAssessment
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
            $generalAssessment = GeneralAssessment::find($id);
            if ($generalAssessment) {
                return response()->json([
                    "message" => 'Avaliação obtida com sucesso',
                    "status" => 200,
                    "data" => $generalAssessment
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
        $rules = ['assessment_count' => 'required',
                'average_stars' => 'required',];
        try {
            $this->validate($request, $rules);
            $generalAssessment = GeneralAssessment::find($id)->update([
                'assessment_count' => $request->assessment_count,
                'average_stars' => $request->average_stars
            ]);
            if ($generalAssessment) {
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
            $generalAssessment = GeneralAssessment::find($id)->delete();
            if ($generalAssessment) {
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
