<?php

namespace App\Models;

use App\Models\CertificateSubmission;
use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    protected $fillable = [
        'recipient',
        'submission_id',
        'generator',
        'reference',
        'file_path',
        'data',
    ];

    protected $casts = [
        'data' => 'array',
    ];

    public function getGenerator()
    {
        return $this->belongsTo(User::class, 'generator', 'id');
    }

    public function getRecipient()
    {
        return $this->belongsTo(User::class, 'recipient', 'id');
    }

    public function submission()
    {
        return $this->belongsTo(CertificateSubmission::class);
    }
}
