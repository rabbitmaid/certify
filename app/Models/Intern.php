<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Intern extends Model
{
    use HasFactory;
    protected $fillable = ["matricule", "name", "email", "gender", "phone_number", "school", "diploma", "department", "duration", "start_date", "end_date"];
}
