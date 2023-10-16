<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnamnesisJobActivity extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'comments',
    ];

    // Nome da tabela
    protected $table = 'anamnesis_job_activities';

}
