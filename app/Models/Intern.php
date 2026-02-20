<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Intern extends Model
{
    use HasFactory;
    
    protected $fillable = ["user_id", "matricule", "salutation", "id_card_number", "phone_number", "school", "diploma", "department", "level",  "duration", "start_date", "end_date", "date_of_birth", "language", "other_information"];


    public function user() {
        return $this->belongsTo(User::class);
    }
}
