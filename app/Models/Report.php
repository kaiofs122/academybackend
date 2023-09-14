<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_instructor',
        'id_student',
        'description_reports',
    ];

    // Nome da tabela
    protected $table = 'reports';

    public function instructor() {
        return $this->hasOne(Instructor::class, 'id_instructor');
    }

    public function student() {
        return $this->hasOne(Student::class, 'id_student');
    }
}
