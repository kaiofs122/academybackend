<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrainingExercise extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_training',
        'id_exercise',
        'repetitions',
        'series',
    ];


    // Nome da tabela
    protected $table = 'training_exercises';

    public function training() {
       return $this->hasOne(Training::class, 'id_training');
    }

    public function exercise() {
        return $this->hasOne(Exercise::class, 'id_exercise');
    }

}
