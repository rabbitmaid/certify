<?php

namespace App\Models;

use App\Models\InternshipSession;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Intern extends Model
{
    use HasFactory, SoftDeletes;
    
    protected $fillable = ["user_id", "matricule", "salutation", "id_card_number", "phone_number", "school", "diploma", "department", "level",  "duration", "start_date", "end_date", "date_of_birth", "language", "other_information", "status", "rejection_reason" , 'approved_at', 'rejected_at' ,'unapproved_at'];

    protected $casts = [
        "start_date" => "date",
        "end_date" => "date",
        "date_of_birth" => "date",
        "approved_at" => "datetime",
        "rejected_at" => "datetime",
        "unapproved_at" => "datetime"
    ];


    public function user() 
    {
        return $this->belongsTo(User::class);
    }

    public function internSessions(): BelongsToMany
    {
        return $this->belongsToMany(InternshipSession::class);
    }
}
