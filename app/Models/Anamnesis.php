<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anamnesis extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_hours_worked_on_week',
        'student_relatives_with_enfermities',
        'student_surgeries',
        'student_enfermities',
        'student_alergies',
        'student_accident_or_lesson',
        'student_physical_activities_restricitions',
        'student_smoker',
        'anamnesis_coments',
        'id_student',
        'id_instructor',
    ];

    // Nome da tabela
    protected $table = 'anamnesis';

    public function student() {
        return $this->hasOne(Student::class, 'id_student');
    }

    public function instructor() {
        return $this->hasOne(Instructor::class, 'id_instructor');
    }
}
