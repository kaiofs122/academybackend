<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NotificationStudent extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_student',
        'text_notification',
    ];

    // Nome da tabela
    protected $table = 'notifications_students';

    public function student() {
        return $this->hasOne(Student::class, 'id_student');
    }
}
