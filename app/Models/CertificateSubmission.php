<?php

namespace App\Models;

use App\Models\Certificate;
use Illuminate\Database\Eloquent\Model;

class CertificateSubmission extends Model
{
    protected $fillable = [
        'user_id',
        'internship_batch_id',
        'template_id',
        'data',
        'status',
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
        return $this->belongsTo(internshipBatch::class);
    }

    public function template()
    {
        return $this->belongsTo(Template::class);
    }

}
