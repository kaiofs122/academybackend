<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instructor extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'cpf',
        'telephone',
        'email',
        'date_birth',
        'time_arrival',
        'time_exit',
        'road',
        'neighborhood',
        'city',
        'zip-code',
        'state',
    ];

    // Nome da tabela
    protected $table = 'instructors';
}
