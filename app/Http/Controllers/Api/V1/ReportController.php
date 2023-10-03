<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Report;

class ReportController extends Controller
{
    // ============== RETORNA TODOS OS RELATÓRIOS ==============
    public function index()
    {
        try {
            // Retorno de todas as informações dos relatórios
            return Report::all();
        } catch (\Exception $e) {
            return response()->json([
                "message" => 'Erro ao exibir Relatórios: ' . $e->getMessage(),
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

    // ============== SALVA UM NOVO RELATÓRIO ==============
    public function store(Request $request)
    {
        $rules = [
                'id_instructor' => 'required',
                'id_student' => 'required',
                'description_reports' => 'required',
                ];
        try {
            $reportData = $request->all();
            $this->validate($request, $rules);
            $report = Report::create($reportData);
            if ($report) {
                return response()->json([
                    "message" => 'Relatório criado com sucesso',
                    "status" => 200,
                    "data" => $report
                ], 200);
            }
        } catch (\Exception $e) {
            return response()->json([
                "message" => 'Erro ao salvar Relatório: ' . $e->getMessage(),
                "status" => 400
            ], 400);
        }
    }

    // ============== EXIBE UM RELATÓRIO PELO ID ==============
    public function show(string $id)
    {
        try {
            $report = Report::find($id);
            if ($report) {
                return response()->json([
                    "message" => 'Relatório obtido com sucesso',
                    "status" => 200,
                    "data" => $report
                ], 200);
            }
        } catch (\Exception $e) {
            return response()->json([
                "message" => 'Erro ao obter Relatório: ' . $e->getMessage(),
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

    // ============== ATUALIZA UM RELATÓRIO PELO ID ==============
    public function update(Request $request, string $id)
    {
        $rules = [
                'id_instructor' => 'required',
                'id_student' => 'required',
                'description_reports' => 'required',
                ];
        try {
            $this->validate($request, $rules);
            $report = Report::find($id)->update([
                'id_instructor' => $request->id_instructor,
                'id_student' => $request->id_student,
                'description_reports' => $request->description_reports
            ]);
            if ($report) {
                return response()->json([
                    "message" => 'Relatório atualizado com sucesso',
                    "status" => 200,
                    "data" => $request->all()
                ], 200);
            }
        } catch (\Exception $e) {
            return response()->json([
                "message" => 'Erro ao atualizar Relatório: ' . $e->getMessage(),
                "status" => 400
            ], 400);
        }
    }

    // ============== DELETA UM RELATÓRIO PELO ID ==============
    public function destroy(string $id)
    {
        try {
            $report = Report::find($id)->delete();
            if ($report) {
                return response()->json([
                    "message" => 'Relatório deletado com sucesso',
                    "status" => 200
                ], 200);
            }
        } catch (\Exception $e) {
            return response()->json([
                "message" => 'Erro ao deletar Relatório: ' . $e->getMessage(),
                "status" => 400
            ], 400);
        }
    }
}
