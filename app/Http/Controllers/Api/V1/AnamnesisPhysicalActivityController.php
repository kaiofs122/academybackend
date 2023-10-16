<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AnamnesisPhysicalActivity;

class AnamnesisPhysicalActivityController extends Controller
{
    // ============== RETORNA TODAS AS ANAMNESIS PHYSICAL ACTIVITIES ==============
    public function index()
    {
        try {
            // Retorno de todas as informações das ANAMNESIS PHYSICAL ACTIVITIES
            return AnamnesisPhysicalActivity::all();
        } catch (\Exception $e){
            return response()->json([
                "message" => 'Erro ao listar Anamnesis Physical Activities: ' . $e->getMessage(),
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

    // ============== SALVA UMA NOVA ANAMNESIS PHYSICAL ACTIVITY ==============
    public function store(Request $request)
    {
        $rules = [
                'anamnesis_id' => 'required',
                'physical_activity_id' => 'required',
                ];
        try {
            $anamnesisPhysicalActivityData = $request->all();
            $this->validate($request, $rules);
            $anamnesisPhysicalActivity = AnamnesisPhysicalActivity::create($anamnesisPhysicalActivityData);
            if ($anamnesisPhysicalActivity) {
                return response()->json([
                    "message" => 'Anamnesis Physical Activity criada com sucesso',
                    "status" => 200,
                    "data" => $anamnesisPhysicalActivity
                ], 200);
            }
        } catch (\Exception $e){
            return response()->json([
                "message" => 'Erro ao criar Anamnesis Physical Activity: ' . $e->getMessage(),
                "status" => 400
            ], 400);
        }
    }

    // ============== EXIBE UMA ANAMNESIS PHYSICAL ACTIVITY PELO ID ==============
    public function show(string $id)
    {
        try {
            $anamnesisPhysicalActivity = AnamnesisPhysicalActivity::find($id);
            if ($anamnesisPhysicalActivity) {
                return response()->json([
                    "message" => 'Anamnesis Physical Activity obtida com sucesso',
                    "status" => 200,
                    "data" => $anamnesisPhysicalActivity
            ], 200);
            }
        } catch (\Exception $e) {
            return response()->json([
                "message" => 'Erro ao exibir Anamnesis Physical Activity: ' . $e->getMessage(),
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

    // ============== ATUALIZA UMA ANAMNESIS PHYSICAL ACTIVITY PELO ID ==============
    public function update(Request $request, string $id)
    {
        $rules = [
                'anamnesis_id' => 'required',
                'physical_activity_id' => 'required',
                ];
        try {
            $this->validate($request, $rules);
            $anamnesisPhysicalActivity = AnamnesisPhysicalActivity::find($id)->update([
                'anamnesis_id' => $request->anamnesis_id,
                'physical_activity_id' => $request->physical_activity_id
            ]);
            if ($anamnesisPhysicalActivity) {
                return response()->json([
                    "message" => 'Anamnesis Physical Activity atualizada com sucesso',
                    "status" => 200,
                    "data" => $request->all()
                ], 200);
            }
        } catch (\Exception $e) {
            return response()->json([
                "message" => 'Erro ao atualizar Anamnesis Physical Activity: ' . $e->getMessage(),
                "status" => 400
            ], 400);
        }
    }

    // ============== DELETA UMA ANAMNESIS PHYSICAL ACTIVITY PELO ID ==============
    public function destroy(string $id)
    {
        try {
            $anamnesisPhysicalActivity = AnamnesisPhysicalActivity::find($id)->delete();
            if ($anamnesisPhysicalActivity) {
                return response()->json([
                    "message" => 'Anamnesis Physical Activity deletada com sucesso',
                    "status" => 200
            ], 200);
            }
        } catch (\Exception $e) {
            return response()->json([
                "message" => 'Erro ao deletar Anamnesis Physical Activity: ' . $e->getMessage(),
                "status" => 400
            ], 400);
        }
    }
}
