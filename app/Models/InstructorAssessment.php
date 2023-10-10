<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InstructorAssessment extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_instructor',
        'id_student',
        'amount_stars_didatic',
        'amount_stars_patience',
        'amount_stars_charisma'
    ];

    // Nome da tabela
    protected $table = 'instructors_assessments';

    public function instructor() {
        return $this->hasOne(Instructor::class, 'id_instructor');
    }

    public function student() {
        return $this->hasOne(Student::class, 'id_student');
    }
}
