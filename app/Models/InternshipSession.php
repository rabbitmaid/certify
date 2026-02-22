<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class InternshipSession extends Model
{
     protected $fillable = [
        'title',
        'start_date',
        'end_date',
        'status',
        'description',
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
    ];

    public function interns() : BelongsToMany
    {
        return $this->belongsToMany(Intern::class);
    }
}
