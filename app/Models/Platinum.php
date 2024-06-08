<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Platinum extends Model
{
    use HasFactory;

    protected $fillable = [
        'educationLevel',
        'educationField',
        'educationInstitute',
        'package',
        'staff_id',
        'user_id'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function staff(): BelongsTo
    {
        return $this->belongsTo(Staff::class);
    }

    public function crmp(): HasOne
    {
        return $this->hasOne(Crmp::class);
    }

    public function supervision(): HasOne
    {
        return $this->hasOne(Supervision::class);
    }
}
