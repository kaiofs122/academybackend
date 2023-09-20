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
        // Retorno de todas as informações das notificações
        return NotificationInstructor::all();
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
        $notificationInstructor = $request->all();
        $notificationInstructor = NotificationInstructor::create($notificationInstructor);
        if ($notificationInstructor) {
            return response()->json([
                "message" => 'Notificação criada com sucesso',
                "status" => 200,
                "data" => $notificationInstructor
            ], 200);
        }
        return $this->error('Erro ao criar notificação', 400);
    }

    // ============== EXIBE UMA NOTIFICAÇÃO PELO ID ==============
    public function show(string $id)
    {
        $notificationInstructor = NotificationInstructor::find($id);
        if ($notificationInstructor) {
            return response()->json([
                "message" => 'Notificação obtida com sucesso',
                "status" => 200,
                "data" => $notificationInstructor
            ], 200);
        }
        return $this->error('Erro ao obter dados da notificação', 400);
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
        return $this->error('Erro ao atualizar notificação', 400);
    }

    // ============== DELETA UMA NOTIFICAÇÃO PELO ID ==============
    public function destroy(string $id)
    {
        $notificationInstructor = NotificationInstructor::find($id)->delete();
        if ($notificationInstructor) {
            return response()->json([
                "message" => 'Notificação deletada com sucesso',
                "status" => 200
            ], 200);
        }
        return $this->error('Erro ao remover notificação', 400);
    }
}
