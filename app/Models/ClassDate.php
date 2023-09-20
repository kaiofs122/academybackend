<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassDate extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_class',
        'class_date',
        'class_start_time',
        'class_duration'
    ];

    // Nome da tabela
    protected $table = 'classes_dates';

    public function class() {
        return $this->hasOne(ClassModel::class, 'id_class');
    }
}
