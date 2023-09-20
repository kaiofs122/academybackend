<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Lesson;

class LessonController extends Controller
{
    // ============== RETORNA TODAS AS LESSONS ==============
    public function index()
    {
        // Retorno de todas as informações das lessons
        return Lesson::all();
    }

    /*
    public function create()
    {
        //
    }
    */

    // ============== SALVA UMA NOVA LESSON ==============
    public function store(Request $request)
    {
        $lesson = $request->all();
        $lesson = Lesson::create($lesson);
        if ($lesson) {
            return response()->json([
                "message" => 'Lesson criada com sucesso',
                "status" => 200,
                "data" => $lesson
            ], 200);
        }
        return $this->error('Erro ao criar lesson', 400);
    }

    // ============== EXIBE UMA LESSON PELO ID ==============
    public function show(string $id)
    {
        $lesson = Lesson::find($id);
        if ($lesson) {
            return response()->json([
                "message" => 'Lesson obtida com sucesso',
                "status" => 200,
                "data" => $lesson
            ], 200);
        }
        return $this->error('Erro ao obter dados da lesson', 400);
    }

    /*
    public function edit(string $id)
    {
        //
    }
    */

    // ============== ATUALIZA UMA LESSON PELO ID ==============
    public function update(Request $request, string $id)
    {
        $lesson = Lesson::find($id)->update([
            'id_instructor' => $request->id_instructor,
            'lesson_description' => $request->lesson_description,
            'lesson_max_students' => $request->lesson_max_students
        ]);
        if ($lesson) {
            return response()->json([
                "message" => 'Lesson atualizada com sucesso',
                "status" => 200,
                "data" => $request->all()
            ], 200);
        }
        return $this->error('Erro ao atualizar lesson', 400);
    }

    // ============== DELETA UMA LESSON PELO ID ==============
    public function destroy(string $id)
    {
        $lesson = Lesson::find($id)->delete();
        if ($lesson) {
            return response()->json([
                "message" => 'Lesson deletada com sucesso',
                "status" => 200
            ], 200);
        }
        return $this->error('Erro ao remover lesson', 400);
    }
}
