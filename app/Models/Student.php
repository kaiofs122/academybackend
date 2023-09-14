<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'cpf',
        'email',
        'telephone',
        'date_birth',
        'presence',
        'lack',
        'weight',
        'height',
        'level',
        'goal',
        'id_instructor',
        'Frequency',
        'url_picture',
        'road',
        'neighborhood',
        'city',
        'zip_code',
        'state',
    ];

    // Nome da tabela
    protected $table = 'students';

    public function instructors() {
        return $this->hasOne(Instructor::class, 'id_instructor');
    }

}
