<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AnamnesisJobActivity;

class AnamnesisJobActivityController extends Controller
{
    // ============== RETORNA TODAS AS ANAMNESIS JOB ACTIVITIES ==============
    public function index()
    {
        try {
            // Retorno de todas as informações das ANAMNESIS JOB ACTIVITIES
            return AnamnesisJobActivity::all();
        } catch (\Exception $e){
            return response()->json([
                "message" => 'Erro ao listar Anamnesis Job Activities: ' . $e->getMessage(),
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

    // ============== SALVA UMA NOVA ANAMNESIS JOB ACTIVITY ==============
    public function store(Request $request)
    {
        $rules = [
                'name'=> 'required',
                'comments'=> 'required',
                ];
        try {
            $anamnesisJobActivityData = $request->all();
            $this->validate($request, $rules);
            $anamnesisJobActivity = AnamnesisJobActivity::create($anamnesisJobActivityData);
            if ($anamnesisJobActivity) {
                return response()->json([
                    "message" => 'Anamnesis Job Activity criada com sucesso',
                    "status" => 200,
                    "data" => $anamnesisJobActivity
                ], 200);
            }
        } catch (\Exception $e){
            return response()->json([
                "message" => 'Erro ao criar Anamnesis Job Activity: ' . $e->getMessage(),
                "status" => 400
            ], 400);
        }
    }

    // ============== EXIBE UMA ANAMNESIS JOB ACTIVITY PELO ID ==============
    public function show(string $id)
    {
        try {
            $anamnesisJobActivity = AnamnesisJobActivity::find($id);
            if ($anamnesisJobActivity) {
                return response()->json([
                    "message" => 'Anamnesis Job Activity obtida com sucesso',
                    "status" => 200,
                    "data" => $anamnesisJobActivity
            ], 200);
            }
        } catch (\Exception $e) {
            return response()->json([
                "message" => 'Erro ao exibir Anamnesis Job Activity: ' . $e->getMessage(),
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

    // ============== ATUALIZA UMA ANAMNESIS JOB ACTIVITY PELO ID ==============
    public function update(Request $request, string $id)
    {
        $rules = [
                'name' => 'required',
                'comments' => 'required',
                ];
        try {
            $this->validate($request, $rules);
            $anamnesisJobActivity = AnamnesisJobActivity::find($id)->update([
                'name' => $request->name,
                'comments' => $request->comments
            ]);
            if ($anamnesisJobActivity) {
                return response()->json([
                    "message" => 'Anamnesis Job Activity atualizada com sucesso',
                    "status" => 200,
                    "data" => $request->all()
                ], 200);
            }
        } catch (\Exception $e) {
            return response()->json([
                "message" => 'Erro ao atualizar Anamnesis Job Activity: ' . $e->getMessage(),
                "status" => 400
            ], 400);
        }
    }

    // ============== DELETA UMA ANAMNESIS JOB ACTIVITY PELO ID ==============
    public function destroy(string $id)
    {
        try {
            $anamnesisJobActivity = AnamnesisJobActivity::find($id)->delete();
            if ($anamnesisJobActivity) {
                return response()->json([
                    "message" => 'Anamnesis Job Activity deletada com sucesso',
                    "status" => 200
            ], 200);
            }
        } catch (\Exception $e) {
            return response()->json([
                "message" => 'Erro ao deletar Anamnesis Job Activity: ' . $e->getMessage(),
                "status" => 400
            ], 400);
        }
    }
}
