<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GeneralAssessment extends Model
{
    use HasFactory;

    protected $fillable = [
        'assessment_count',
        'average_stars',
    ];

    // Nome da tabela
    protected $table = 'general_assessments';
}
