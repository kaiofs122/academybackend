<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_instructor',
        'description',
        'max_students',
    ];

    // Nome da tabela
    protected $table = 'lessons';

    public function instructor() {
        return $this->hasOne(Instructor::class, 'id_instructor');
    }
}
