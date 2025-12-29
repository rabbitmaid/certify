<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Intern extends Model
{
    use HasFactory;
    
    protected $fillable = ["user_id", "matricule", "name", "email", "gender", "phone_number", "school", "diploma", "department", "duration", "start_date", "end_date"];


    public function user() {
        return $this->belongsTo(User::class);
    }
}
