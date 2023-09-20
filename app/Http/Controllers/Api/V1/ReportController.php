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
        // Retorno de todas as informações dos relatórios
        return Report::all();
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
        $report = $request->all();
        $report = Report::create($report);
        if ($report) {
            return response()->json([
                "message" => 'Relatório criado com sucesso',
                "status" => 200,
                "data" => $report
            ], 200);
        }
        return $this->error('Erro ao criar relatório', 400);
    }

    // ============== EXIBE UM RELATÓRIO PELO ID ==============
    public function show(string $id)
    {
        $report = Report::find($id);
        if ($report) {
            return response()->json([
                "message" => 'Relatório obtido com sucesso',
                "status" => 200,
                "data" => $report
            ], 200);
        }
        return $this->error('Erro ao obter dados do relatório', 400);
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
        return $this->error('Erro ao atualizar relatório', 400);
    }

    // ============== DELETA UM RELATÓRIO PELO ID ==============
    public function destroy(string $id)
    {
        $report = Report::find($id)->delete();
        if ($report) {
            return response()->json([
                "message" => 'Relatório deletado com sucesso',
                "status" => 200
            ], 200);
        }
        return $this->error('Erro ao remover relatório', 400);
    }
}
