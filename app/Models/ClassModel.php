<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassModel extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_lesson',
        'id_student',
    ];

    // Nome da tabela
    protected $table = 'classes';

    public function lesson() {
        return $this->hasOne(Lesson::class, 'id_lesson');
    }

    public function students() {
        return $this->hasMany(Student::class, 'id_student', 'id');
    }
}
