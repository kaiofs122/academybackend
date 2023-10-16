<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Anamnesis;

class AnamnesisController extends Controller
{
    // ============== RETORNA TODAS AS ANAMNESIS ==============
    public function index()
    {
        try {
            // Retorno de todas as informações das anamnesis
            return Anamnesis::all();
        } catch (\Exception $e){
            return response()->json([
                "message" => 'Erro ao listar Anamnesis: ' . $e->getMessage(),
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

    // ============== SALVA UMA NOVA ANAMNESIS ==============
    public function store(Request $request)
    {
        $rules = [
            'student_hours_worked_on_week' => 'required',
            'student_relatives_with_enfermities' => 'required',
            'student_surgeries' => 'required',
            'student_enfermities' => 'required',
            'student_alergies' => 'required',
            'student_accident_or_lesson' => 'required',
            'student_physical_activities_restricitions' => 'required',
            'student_smoker' => 'required',
            'anamnesis_coments' => 'required',
            'id_student' => 'required',
            'id_instructor' => 'required',
        ];
        try {
            $anamnesisData = $request->all();
            $this->validate($request, $rules);
            $anamnesis = Anamnesis::create($anamnesisData);
            if ($anamnesis) {
                return response()->json([
                    "message" => 'Anamnesis criada com sucesso',
                    "status" => 200,
                    "data" => $anamnesis
                ], 200);
            }
        } catch (\Exception $e){
            return response()->json([
                "message" => 'Erro ao criar anamnesis: ' . $e->getMessage(),
                "status" => 400
            ], 400);
        }
    }

    // ============== EXIBE UMA ANAMNESIS PELO ID ==============
    public function show(string $id)
    {
        try {
            $anamnesis = Anamnesis::find($id);
            if ($anamnesis) {
                return response()->json([
                    "message" => 'Anamnesis obtida com sucesso',
                    "status" => 200,
                    "data" => $anamnesis
            ], 200);
            }
        } catch (\Exception $e) {
            return response()->json([
                "message" => 'Erro ao exibir anamnesis: ' . $e->getMessage(),
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

    // ============== ATUALIZA UMA ANAMNESIS PELO ID ==============
    public function update(Request $request, string $id)
    {
        $rules = [
            'student_hours_worked_on_week' => 'required',
            'student_relatives_with_enfermities' => 'required',
            'student_surgeries' => 'required',
            'student_enfermities' => 'required',
            'student_alergies' => 'required',
            'student_accident_or_lesson' => 'required',
            'student_physical_activities_restricitions' => 'required',
            'student_smoker' => 'required',
            'anamnesis_coments' => 'required',
            'id_student' => 'required',
            'id_instructor' => 'required',
        ];
        try {
            $this->validate($request, $rules);
            $anamnesis = Anamnesis::find($id)->update([
                'student_hours_worked_on_week' => $request->student_hours_worked_on_week,
                'student_relatives_with_enfermities' => $request->student_relatives_with_enfermities,
                'student_surgeries' => $request->student_surgeries,
                'student_enfermities' => $request->student_enfermities,
                'student_alergies' => $request->student_alergies,
                'student_accident_or_lesson' => $request->student_accident_or_lesson,
                'student_physical_activities_restricitions' => $request->student_physical_activities_restricitions,
                'student_smoker' => $request->student_smoker,
                'anamnesis_coments' => $request->anamnesis_coments,
                'id_student' => $request->id_lesson,
                'id_instructor' => $request->id_student,
            ]);
            if ($anamnesis) {
                return response()->json([
                    "message" => 'Anamnesis atualizada com sucesso',
                    "status" => 200,
                    "data" => $request->all()
                ], 200);
            }
        } catch (\Exception $e) {
            return response()->json([
                "message" => 'Erro ao atualizar anamnesis: ' . $e->getMessage(),
                "status" => 400
            ], 400);
        }
    }

    // ============== DELETA UMA ANAMNESIS PELO ID ==============
    public function destroy(string $id)
    {
        try {
            $anamnesis = Anamnesis::find($id)->delete();
            if ($anamnesis) {
                return response()->json([
                    "message" => 'Anamnesis deletada com sucesso',
                    "status" => 200
               ], 200);
            }
        } catch (\Exception $e) {
            return response()->json([
                "message" => 'Erro ao deletar anamnesis: ' . $e->getMessage(),
                "status" => 400
            ], 400);
        }
    }
}
