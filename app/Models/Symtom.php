<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Symtom extends Model
{
    use HasFactory;

    protected $fillable = [
        'symtom_name',
        'symtom_frequency',
    ];

    // Nome da tabela
    protected $table = 'symtoms';

}
