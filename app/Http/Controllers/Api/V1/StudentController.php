<?php

namespace App\Http\Controllers\Api\V1;


use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    // ============== RETORNA TODOS OS ALUNOS ==============
    public function index()
    {
        // Retorno de todas as informações dos alunos
        return Student::all();
    }

    /*
    public function create()
    {
        //
    }
    */

    // ============== SALVA UM NOVO ALUNO ==============
    public function store(Request $request)
    {
        $student = $request->all();
        $student = Student::create($student);
        if ($student) {
            return response()->json([
                "message" => 'Aluno criado com sucesso',
                "status" => 200,
                "data" => $student
            ], 200);
        }
        return $this->error('Erro ao criar aluno', 400);
    }

    // ============== EXIBE UM ALUNO PELO ID ==============
    public function show(string $id)
    {
        $student = Student::find($id);
        if ($student) {
            return response()->json([
                "message" => 'Aluno obtido com sucesso',
                "status" => 200,
                "data" => $student
            ], 200);
        }
        return $this->error('Erro ao obter dados do aluno', 400);
    }

    /*
    public function edit(string $id)
    {
        //
    }
    */

    // ============== ATUALIZA UM ALUNO PELO ID ==============
    public function update(Request $request, string $id)
    {
        $student = Student::find($id)->update([
            "student_name" => $request->student_name,
            "student_cpf" => $request->student_cpf,
            "student_email" => $request->student_email,
            "student_telephone" => $request->student_telephone,
            "student_date_birth" => $request->student_date_birth,
            "student_weight" => $request->student_weight,
            "student_height" => $request->student_height,
            "student_level" => $request->student_level,
            "student_goal" => $request->student_goal,
            "id_instructor" => $request->id_instructor,
            "student_frequency" => $request->student_frequency,
            "student_photo_url" => $request->student_photo_url,
            "student_address" => $request->student_address,
            "student_address_number" => $request->student_address_number,
            "student_city" => $request->student_city,
            "student_zip_code" => $request->student_zip_code,
            "student_state" => $request->student_state
        ]);
        if ($student) {
            return response()->json([
                "message" => 'Aluno atualizado com sucesso',
                "status" => 200,
                "data" => $request->all()
            ], 200);
        }
        return $this->error('Erro ao atualizar aluno', 400);
    }

    // ============== DELETA UM ALUNO PELO ID ==============
    public function destroy(string $id)
    {
        $student = Student::find($id)->delete();
        if ($student) {
            return response()->json([
                "message" => 'Aluno deletado com sucesso',
                "status" => 200
            ], 200);
        }
        return $this->error('Erro ao remover aluno', 400);
    }
}
