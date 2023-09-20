<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Instructor;

class InstructorController extends Controller
{   
    // ============== RETORNA TODOS OS INSTRUTORES ==============
    public function index()
    {
        // Retorno de todas as informações dos instrutores
        return Instructor::all();
    }

    /*
    public function create()
    {
        //
    }
    */

    // ============== SALVA UM NOVO INSTRUTOR ==============
    public function store(Request $request)
    {
        $instructor = $request->all();
        $instructor = Instructor::create($instructor);
        if ($instructor) {
            return response()->json([
                "message" => 'Instrutor criada com sucesso',
                "status" => 200,
                "data" => $instructor
            ], 200);
        }
        return $this->error('Erro ao criar instrutor', 400);
    }

    // ============== EXIBE UM INSTRUTOR PELO ID ==============
    public function show(string $id)
    {
        $instructor = Instructor::find($id);
        if ($instructor) {
            return response()->json([
                "message" => 'Instrutor obtido com sucesso',
                "status" => 200,
                "data" => $instructor
            ], 200);
        }
        return $this->error('Erro ao obter dados do instrutor', 400);
    }

    /*
    public function edit(string $id)
    {
        //
    }
    */

    // ============== ATUALIZA UM INSTRUTOR PELO ID ==============
    public function update(Request $request, string $id)
    {
        $instructor = Instructor::find($id)->update([
            "instructor_name" => $request->instructor_name,
            "instructor_cpf" => $request->instructor_cpf,
            "instructor_telephone" => $request->instructor_telephone,
            "instructor_email" => $request->instructor_email,
            "instructor_date_birth" => $request->instructor_date_birth,
            "instructor_time_arrival" => $request->instructor_time_arrival,
            "instructor_time_exit" => $request->instructor_time_exit,
            "instructor_address" => $request->instructor_address,
            "instructor_address_number" => $request->instructor_address_number,
            "instructor_city" => $request->instructor_city,
            "instructor_zip_code" => $request->instructor_zip_code,
            "instructor_state" => $request->instructor_state
        ]);
        if ($instructor) {
            return response()->json([
                "message" => 'Instrutor atualizado com sucesso',
                "status" => 200,
                "data" => $request->all()
            ], 200);
        }
        return $this->error('Erro ao atualizar instrutor', 400);
    }

    // ============== DELETA UM INSTRUTOR PELO ID ==============
    public function destroy(string $id)
    {
        $instructor = Instructor::find($id)->delete();
        if ($instructor) {
            return response()->json([
                "message" => 'Instrutor deletado com sucesso',
                "status" => 200
            ], 200);
        }
        return $this->error('Erro ao remover instrutor', 400);
    }
}
