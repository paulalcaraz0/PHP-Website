<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Resume extends Model
{
    protected $fillable = [
        'user_id',
        'name',
        'title',
        'phone',
        'email',
        'location',
        'summary',
        'skills',
        'projects',
        'education',
        'organizations',
        'profile_picture'
    ];

    // Cast JSON fields to arrays automatically
    protected $casts = [
        'skills' => 'array',
        'projects' => 'array',
        'education' => 'array',
        'organizations' => 'array',
    ];

    // Relationship: Resume belongs to User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}