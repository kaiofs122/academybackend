<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exercise extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'exercise_name',
        'exercise_description',
        'exercise_url_tutorial',
    ];

    // Nome da tabela
    protected $table = 'exercises';
}
