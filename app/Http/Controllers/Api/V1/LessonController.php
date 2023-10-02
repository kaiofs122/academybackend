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
        try {
            // Retorno de todas as informações das lessons
            return Lesson::all();   
        } catch (\Exception $e) {
            return response()->json([
                "message" => 'Erro ao exibir Lições: ' . $e->getMessage(),
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

    // ============== SALVA UMA NOVA LESSON ==============
    public function store(Request $request)
    {
        $rules = ['id_instructor' => 'required',
                'lesson_description' => 'required',
                'lesson_max_students' => 'required',
                ];
        try {
            $lesson = $request->all();
            $this->validate($request, $rules);
            $lesson = Lesson::create($lesson);
            if ($lesson) {
                return response()->json([
                    "message" => 'Lição criada com sucesso',
                    "status" => 200,
                    "data" => $lesson
                ], 200);
            }   
        } catch (\Exception $e) {
            return response()->json([
                "message" => 'Erro ao criar Lição: ' . $e->getMessage(),
                "status" => 400
            ], 400);
        }
    }

    // ============== EXIBE UMA LESSON PELO ID ==============
    public function show(string $id)
    {
        try {
            $lesson = Lesson::find($id);
            if ($lesson) {
                return response()->json([
                    "message" => 'Lição obtida com sucesso',
                    "status" => 200,
                    "data" => $lesson
                ], 200);
            } 
        } catch (\Exception $e){
            return response()->json([
                "message" => 'Erro ao exibir Lição: ' . $e->getMessage(),
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

    // ============== ATUALIZA UMA LESSON PELO ID ==============
    public function update(Request $request, string $id)
    {
        $rules = ['id_instructor' => 'required',
                'lesson_description' => 'required',
                'lesson_max_students' => 'required',
                ];
        try {
            $this->validate($request, $rules);
            $lesson = Lesson::find($id)->update([
                'id_instructor' => $request->id_instructor,
                'lesson_description' => $request->lesson_description,
                'lesson_max_students' => $request->lesson_max_students
            ]);
            if ($lesson) {
                return response()->json([
                    "message" => 'Lição atualizada com sucesso',
                    "status" => 200,
                    "data" => $request->all()
                ], 200);
            }
        } catch (\Exception $e){
            return response()->json([
                "message" => 'Erro ao atualizar Lição: ' . $e->getMessage(),
                "status" => 400
            ], 400);
        }
    }

    // ============== DELETA UMA LESSON PELO ID ==============
    public function destroy(string $id)
    {
        try {
           $lesson = Lesson::find($id)->delete();
            if ($lesson) {
                return response()->json([
                    "message" => 'Lição deletada com sucesso',
                    "status" => 200
                ], 200);
            } 
        } catch (\Exception $e){
            return response()->json([
                "message" => 'Erro ao deletar Lição: ' . $e->getMessage(),
                "status" => 400
            ], 400);
        }
    }
}
