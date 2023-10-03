<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\NotificationInstructor;

class NotificationInstructorController extends Controller
{
    // ============== RETORNA TODAS AS NOTIFICAÇÕES ==============
    public function index()
    {
        try {
            // Retorno de todas as informações das notificações
            return NotificationInstructor::all();
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
                'id_instructor' => 'required',
                'text_notification' => 'required',
                ];
        try {
            $notificationInstructorData = $request->all();
            $this->validate($request, $rules);
            $notificationInstructor = NotificationInstructor::create($notificationInstructorData);
            if ($notificationInstructor) {
                return response()->json([
                    "message" => 'Notificação criada com sucesso',
                    "status" => 200,
                    "data" => $notificationInstructor
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
            $notificationInstructor = NotificationInstructor::find($id);
            if ($notificationInstructor) {
                return response()->json([
                    "message" => 'Notificação obtida com sucesso',
                    "status" => 200,
                    "data" => $notificationInstructor
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
                'id_instructor' => 'required',
                'text_notification' => 'required',
                ];
        try {
            $this->validate($request, $rules);
            $notificationInstructor = NotificationInstructor::find($id)->update([
                'id_instructor' => $request->id_instructor,
                'text_notification' => $request->text_notification
            ]);
            if ($notificationInstructor) {
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
            $notificationInstructor = NotificationInstructor::find($id)->delete();
            if ($notificationInstructor) {
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
