<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\NotificationStudent;

class NotificationStudentController extends Controller
{
    // ============== RETORNA TODAS AS NOTIFICAÇÕES ==============
    public function index()
    {
        try {
            // Retorno de todas as informações das notificações
            return NotificationStudent::all();
        } catch (\Exception $e) {
            return response()->json([
                "message" => 'Erro ao exibir Notificações: ' . $e->getMessage(),
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

    // ============== SALVA UMA NOVA NOTIFICAÇÃO ==============
    public function store(Request $request)
    {
        $rules = [
                'id_student' => 'required',
                'text_notification' => 'required',
                ];
        try {
            $notificationStudentData = $request->all();
            $this->validate($request, $rules);
            $notificationStudent = NotificationStudent::create($notificationStudentData);
            if ($notificationStudent) {
                return response()->json([
                    "message" => 'Notificação criada com sucesso',
                    "status" => 200,
                    "data" => $notificationStudent
                ], 200);
            }
        } catch (\Exception $e) {
            return response()->json([
                "message" => 'Erro ao salvar Notificação: ' . $e->getMessage(),
                "status" => 400
            ], 400);
        }
    }

    // ============== EXIBE UMA NOTIFICAÇÃO PELO ID ==============
    public function show(string $id)
    {
        try {
            $notificationStudent = NotificationStudent::find($id);
            if ($notificationStudent) {
                return response()->json([
                    "message" => 'Notificação obtida com sucesso',
                    "status" => 200,
                    "data" => $notificationStudent
                ], 200);
            }
        } catch (\Exception $e) {
            return response()->json([
                "message" => 'Erro ao exibir Notificação: ' . $e->getMessage(),
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

    // ============== ATUALIZA UMA NOTIFICAÇÃO PELO ID ==============
    public function update(Request $request, string $id)
    {
        $rules = [
                'id_student' => 'required',
                'text_notification' => 'required',
                ];
        try {
            $this->validate($request, $rules);
            $notificationStudent = NotificationStudent::find($id)->update([
                'id_student' => $request->id_student,
                'text_notification' => $request->text_notification
            ]);
            if ($notificationStudent) {
                return response()->json([
                    "message" => 'Notificação atualizada com sucesso',
                    "status" => 200,
                    "data" => $request->all()
                ], 200);
            }
        } catch (\Exception $e) {
            return response()->json([
                "message" => 'Erro ao atualizar Notificação: ' . $e->getMessage(),
                "status" => 400
            ], 400);
        }
    }

    // ============== DELETA UMA NOTIFICAÇÃO PELO ID ==============
    public function destroy(string $id)
    {
        try {
            $notificationStudent = NotificationStudent::find($id)->delete();
            if ($notificationStudent) {
                return response()->json([
                    "message" => 'Notificação deletada com sucesso',
                    "status" => 200
                ], 200);
            }
        } catch (\Exception $e) {
            return response()->json([
                "message" => 'Erro ao deletar Notificação: ' . $e->getMessage(),
                "status" => 400
            ], 400);
        }
    }
}
