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
        // Retorno de todas as informações das notificações
        return NotificationStudent::all();
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
        $notificationStudent = $request->all();
        $notificationStudent = NotificationStudent::create($notificationStudent);
        if ($notificationStudent) {
            return response()->json([
                "message" => 'Notificação criada com sucesso',
                "status" => 200,
                "data" => $notificationStudent
            ], 200);
        }
        return $this->error('Erro ao criar notificação', 400);
    }

    // ============== EXIBE UMA NOTIFICAÇÃO PELO ID ==============
    public function show(string $id)
    {
        $notificationStudent = NotificationStudent::find($id);
        if ($notificationStudent) {
            return response()->json([
                "message" => 'Notificação obtida com sucesso',
                "status" => 200,
                "data" => $notificationStudent
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
        return $this->error('Erro ao atualizar notificação', 400);
    }

    // ============== DELETA UMA NOTIFICAÇÃO PELO ID ==============
    public function destroy(string $id)
    {
        $notificationStudent = NotificationStudent::find($id)->delete();
        if ($notificationStudent) {
            return response()->json([
                "message" => 'Notificação deletada com sucesso',
                "status" => 200
            ], 200);
        }
        return $this->error('Erro ao remover notificação', 400);
    }
}
