<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class InternshipBatch extends Model
{
    protected $fillable = [
        'internship_session_id',
        'title',
        'category',
        'description',
    ];


    public function internshipSession(): BelongsTo
    {
        return $this->belongsTo(InternshipSession::class);
    }

    public function interns(): BelongsToMany
    {
        return $this->belongsToMany(Intern::class);
    }
}
