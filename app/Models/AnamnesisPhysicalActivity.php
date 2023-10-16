<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnamnesisPhysicalActivity extends Model
{
    use HasFactory;

    protected $fillable = [
        'anamnesis_id',
        'physical_activity_id'
    ];

    // Nome da tabela
    protected $table = 'anamnesis_physical_activities';

    public function anamnesis() {
        return $this->hasOne(Anamnesis::class, 'anamnesis_id');
    }

    public function studentPhysicalActivity() {
        return $this->hasOne(StudentPhysicalActivities::class, 'physical_activity_id');
    }
}
