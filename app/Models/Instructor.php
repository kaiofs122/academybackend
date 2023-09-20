<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instructor extends Model
{
    use HasFactory;

    protected $fillable = [
        "instructor_name",
        "instructor_cpf",
        "instructor_telephone",
        "instructor_email",
        "instructor_date_birth",
        "instructor_time_arrival",
        "instructor_time_exit",
        "instructor_address",
        "instructor_address_number",
        "instructor_city",
        "instructor_zip_code",
        "instructor_state",
    ];

    // Nome da tabela
    protected $table = "instructors";
}
