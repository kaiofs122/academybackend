<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AnamnesisStudentSymtom;

class AnamnesisStudentSymtomController extends Controller
{
    // ============== RETORNA TODOS OS SINTOMAS ==============
    public function index()
    {
        try {
            // Retorno de todas as informações dos sintomas
            return AnamnesisStudentSymtom::all();
        } catch (\Exception $e){
            return response()->json([
                "message" => 'Erro ao listar Sintoma do Estudante: ' . $e->getMessage(),
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

    // ============== SALVA UM NOVO SINTOMA DO ESTUDANTE ==============
    public function store(Request $request)
    {
        $rules = [
            'anamnesis_id' => 'required',
            'symtom_id' => 'required',
        ];
        try {
            $studentSymtomData = $request->all();
            $this->validate($request, $rules);
            $studentSymtom = AnamnesisStudentSymtom::create($studentSymtomData);
            if ($studentSymtom) {
                return response()->json([
                    "message" => 'Sintoma do Estudante criado com sucesso',
                    "status" => 200,
                    "data" => $studentSymtom
                ], 200);
            }
        } catch (\Exception $e){
            return response()->json([
                "message" => 'Erro ao criar Sintoma do Estudante: ' . $e->getMessage(),
                "status" => 400
            ], 400);
        }
    }

    // ============== EXIBE UM SINTOMA DO ESTUDANTE PELO ID ==============
    public function show(string $id)
    {
        try {
            $studentSymtom = AnamnesisStudentSymtom::find($id);
            if ($studentSymtom) {
                return response()->json([
                    "message" => 'Sintoma do Estudante obtido com sucesso',
                    "status" => 200,
                    "data" => $studentSymtom
            ], 200);
            }
        } catch (\Exception $e) {
            return response()->json([
                "message" => 'Erro ao exibir Sintoma do Estudante: ' . $e->getMessage(),
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

    // ============== ATUALIZA UM SINTOMA DO ESTUDANTE PELO ID ==============
    public function update(Request $request, string $id)
    {
        $rules = [
            'anamnesis_id' => 'required',
            'symtom_id' => 'required',
        ];
        try {
            $this->validate($request, $rules);
            $studentSymtom = AnamnesisStudentSymtom::find($id)->update([
                'anamnesis_id' => $request->anamnesis_id,
                'symtom_id' => $request->symtom_id,
            ]);
            if ($studentSymtom) {
                return response()->json([
                    "message" => 'Sintoma do Estudante atualizado com sucesso',
                    "status" => 200,
                    "data" => $request->all()
                ], 200);
            }
        } catch (\Exception $e) {
            return response()->json([
                "message" => 'Erro ao atualizar Sintoma do Estudante: ' . $e->getMessage(),
                "status" => 400
            ], 400);
        }
    }

    // ============== DELETA UM SINTOMA DO ESTUDANTE PELO ID ==============
    public function destroy(string $id)
    {
        try {
            $studentSymtom = AnamnesisStudentSymtom::find($id)->delete();
            if ($studentSymtom) {
                return response()->json([
                    "message" => 'Sintoma do Estudante deletado com sucesso',
                    "status" => 200
               ], 200);
            }
        } catch (\Exception $e) {
            return response()->json([
                "message" => 'Erro ao deletar Sintoma do Estudante: ' . $e->getMessage(),
                "status" => 400
            ], 400);
        }
    }
}
