<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Symtom;

class SymtomController extends Controller
{
    // ============== RETORNA TODOS OS SINTOMAS ==============
    public function index()
    {
        try {
            // Retorno de todas as informações dos sintomas
            return Symtom::all();
        } catch (\Exception $e){
            return response()->json([
                "message" => 'Erro ao listar Sintoma: ' . $e->getMessage(),
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

    // ============== SALVA UM NOVO SINTOMA ==============
    public function store(Request $request)
    {
        $rules = [
            'symtom_name' => 'required',
            'symtom_frequency' => 'required',
        ];
        try {
            $SymtomData = $request->all();
            $this->validate($request, $rules);
            $Symtom = Symtom::create($SymtomData);
            if ($Symtom) {
                return response()->json([
                    "message" => 'Sintoma criado com sucesso',
                    "status" => 200,
                    "data" => $Symtom
                ], 200);
            }
        } catch (\Exception $e){
            return response()->json([
                "message" => 'Erro ao criar Sintoma: ' . $e->getMessage(),
                "status" => 400
            ], 400);
        }
    }

    // ============== EXIBE UM SINTOMA PELO ID ==============
    public function show(string $id)
    {
        try {
            $Symtom = Symtom::find($id);
            if ($Symtom) {
                return response()->json([
                    "message" => 'Sintoma obtido com sucesso',
                    "status" => 200,
                    "data" => $Symtom
            ], 200);
            }
        } catch (\Exception $e) {
            return response()->json([
                "message" => 'Erro ao exibir Sintoma: ' . $e->getMessage(),
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

    // ============== ATUALIZA UM SINTOMA PELO ID ==============
    public function update(Request $request, string $id)
    {
        $rules = [
            'symtom_name' => 'required',
            'symtom_frequency' => 'required',
        ];
        try {
            $this->validate($request, $rules);
            $Symtom = Symtom::find($id)->update([
                'symtom_name' => $request->symtom_name,
                'symtom_frequency' => $request->symtom_frequency,
            ]);
            if ($Symtom) {
                return response()->json([
                    "message" => 'Sintoma atualizado com sucesso',
                    "status" => 200,
                    "data" => $request->all()
                ], 200);
            }
        } catch (\Exception $e) {
            return response()->json([
                "message" => 'Erro ao atualizar Sintoma: ' . $e->getMessage(),
                "status" => 400
            ], 400);
        }
    }

    // ============== DELETA UM SINTOMA PELO ID ==============
    public function destroy(string $id)
    {
        try {
            $Symtom = Symtom::find($id)->delete();
            if ($Symtom) {
                return response()->json([
                    "message" => 'Sintoma deletado com sucesso',
                    "status" => 200
               ], 200);
            }
        } catch (\Exception $e) {
            return response()->json([
                "message" => 'Erro ao deletar Sintoma: ' . $e->getMessage(),
                "status" => 400
            ], 400);
        }
    }
}
