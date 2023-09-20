<?php

namespace App\Http\Controllers\Api\V1;

use IllUMAinate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\GeneralAssessment;

class GeneralAssessmentController extends Controller
{
    // ============== RETORNA TODOS AS AVALIAÇÕES ==============
    public function index()
    {
        // Retorno de todas as informações das avaliações
        return GeneralAssessment::all();
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
        $generalAssessment = $request->all();
        $generalAssessment = GeneralAssessment::create($generalAssessment);
        if ($generalAssessment) {
            return response()->json([
                "message" => 'Avaliação criada com sucesso',
                "status" => 200,
                "data" => $generalAssessment
            ], 200);
        }
        return $this->error('Erro ao criar avaliação', 400);
    }

    // ============== EXIBE UMA AVALIAÇÃO PELO ID ==============
    public function show(string $id)
    {
        $generalAssessment = GeneralAssessment::find($id);
        if ($generalAssessment) {
            return response()->json([
                "message" => 'Avaliação obtida com sucesso',
                "status" => 200,
                "data" => $generalAssessment
            ], 200);
        }
        return $this->error('Erro ao obter dados da avaliação', 400);
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
        return $this->error('Erro ao atualizar avaliação', 400);
    }

    // ============== DELETA UMA AVALIAÇÃO PELO ID ==============
    public function destroy(string $id)
    {
        $generalAssessment = GeneralAssessment::find($id)->delete();
        if ($generalAssessment) {
            return response()->json([
                "message" => 'Avaliação deletada com sucesso',
                "status" => 200
            ], 200);
        }
        return $this->error('Erro ao remover avaliação', 400);
    }
}
