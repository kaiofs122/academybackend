<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NotificationInstructor extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_instructor',
        'text_notification',
    ];

    // Nome da tabela
    protected $table = 'notifications_instructors';

    public function instructor() {
        return $this->hasOne(Instructor::class, 'id_instructor');
    }
}
