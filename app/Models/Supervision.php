<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Supervision extends Model
{
    use HasFactory;

    protected $fillable = [
        'platinum_id',
        'crmp_id'
    ];

    public function platinum(): BelongsTo
    {
        return $this->belongsTo(Platinum::class);
    }

    public function crmp(): BelongsTo
    {
        return $this->belongsTo(Crmp::class);
    }
}
