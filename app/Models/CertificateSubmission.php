<?php

namespace App\Models;

use App\Models\Certificate;
use App\Models\InternshipBatch;
use Illuminate\Database\Eloquent\Model;

class CertificateSubmission extends Model
{
    protected $fillable = [
        'user_id',
        'internship_batch_id',
        'template_id',
        'data',
        'status',
        'type'
    ];

    protected $casts = [
        'data' => 'array',
    ];

    public function certificates()
    {
        return $this->hasMany(Certificate::class, 'submission_id');
    }

    public function internshipBatch()
    {
        return $this->belongsTo(InternshipBatch::class);
    }

    public function template()
    {
        return $this->belongsTo(Template::class);
    }

}
