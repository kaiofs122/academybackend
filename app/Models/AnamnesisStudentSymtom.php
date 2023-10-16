<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnamnesisStudentSymtom extends Model
{
    use HasFactory;

    protected $fillable = [
        'anamnesis_id',
        'symtom_id',
    ];

    // Nome da tabela
    protected $table = 'anamnesis_student_symtoms';

    public function student() {
        return $this->hasOne(Anamnesis::class, 'anamnesis_id');
    }

    public function instructor() {
        return $this->hasOne(Symtom::class, 'symtom_id');
    }

}
