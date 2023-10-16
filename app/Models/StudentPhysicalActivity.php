<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentPhysicalActivity extends Model
{
    use HasFactory;

    protected $fillable = [
        'physical_activity_name',
        'physical_activity_frequency',
        'physical_activity_duration',
    ];

    // Nome da tabela
    protected $table = 'student_physical_activity';

}
