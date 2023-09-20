<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        "student_name",
        "student_cpf",
        "student_email",
        "student_telephone",
        "student_date_birth",
        "student_weight",
        "student_height",
        "student_level",
        "student_goal",
        "id_instructor",
        "student_Frequency",
        "student_photo_url",
        "student_address",
        "student_address_number",
        "student_city",
        "student_zip_code",
        "student_state",
    ];

    // Nome da tabela
    protected $table = "students";

    public function instructors() {
        return $this->hasOne(Instructor::class, "id_instructor");
    }

}
