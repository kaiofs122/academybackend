<?php

namespace App\Http\Controllers\Api\V1;


use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\FirebaseController;

class StudentController extends Controller
{
    // ============== RETORNA TODOS OS ALUNOS ==============
    public function index()
    {
        try {
            // Retorno de todas as informações dos alunos
            return Student::all();
        } catch (\Exception $e){
            return response()->json([
                "message" => 'Erro ao listar Alunos: ' . $e->getMessage(),
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

    // ============== SALVA UM NOVO ALUNO ==============
    public function store(Request $request)
    {
        $rules = [
            'student_name' => 'required',
            'student_cpf' => 'required',
            'student_email' => 'required',
            'student_telephone' => 'required',
            'student_date_birth' => 'required',
            'student_weight' => 'required',
            'student_height' => 'required',
            'student_level' => 'required',
            'student_goal' => 'required',
            'id_instructor' => 'required',
            'student_frequency' => 'required',
            'student_photo_url' => 'required',
            'student_address' => 'required',
            'student_address_number' => 'required',
            'student_city' => 'required',
            'student_zip_code' => 'required',
            'student_state' => 'required',
            ];
        try {
            $studentData = $request->all();
            $this->validate($request, $rules);
            $student = Student::create($studentData);
            $student_photo_url = FirebaseController::store($request);
            if ($student) {
                return response()->json([
                    "message" => 'Aluno criado com sucesso',
                    "status" => 200
                ], 200);
            }
        } catch (\Exception $e) {
            return response()->json([
                "message" => 'Erro ao criar Aluno: ' . $e->getMessage(),
                "status" => 400
            ], 400);
        }
    }

    // ============== EXIBE UM ALUNO PELO ID ==============
    public function show(string $id)
    {
        try{
            $student = Student::find($id);
            if ($student) {
                return response()->json([
                    "message" => 'Aluno obtido com sucesso',
                    "status" => 200,
                    "data" => $student
                ], 200);
            }
        } catch (\Exception $e){
            return response()->json([
                "message" => 'Erro ao exibir Aluno: ' . $e->getMessage(),
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

    // ============== ATUALIZA UM ALUNO PELO ID ==============
    public function update(Request $request, string $id)
    {
        $rules = [
            'student_name' => 'required',
            'student_cpf' => 'required',
            'student_email' => 'required',
            'student_telephone' => 'required',
            'student_date_birth' => 'required',
            'student_weight' => 'required',
            'student_height' => 'required',
            'student_level' => 'required',
            'student_goal' => 'required',
            'id_instructor' => 'required',
            'student_frequency' => 'required',
            'student_photo_url' => 'required',
            'student_address' => 'required',
            'student_address_number' => 'required',
            'student_city' => 'required',
            'student_zip_code' => 'required',
            'student_state' => 'required',
            ];
        try {
            $this->validate($request, $rules);
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
        } catch (\Exception $e) {
            return response()->json([
                "message" => 'Erro ao atualizar Aluno: ' . $e->getMessage(),
                "status" => 400
            ], 400);
        }
    }

    // ============== DELETA UM ALUNO PELO ID ==============
    public function destroy(string $id)
    {
        try {
            $student = Student::find($id)->delete();
            if ($student) {
                return response()->json([
                    "message" => 'Aluno deletado com sucesso',
                    "status" => 200
                ], 200);
            }
        } catch (\Exception $e) {
            return response()->json([
                "message" => 'Erro ao deletar Aluno: ' . $e->getMessage(),
                "status" => 400
            ], 400);
        }
    }
}
