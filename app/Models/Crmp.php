<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Crmp extends Model
{
    use HasFactory;

    protected $fillable = [
        'platinum_id'
    ];

    public function platinum(): BelongsTo
    {
        return $this->belongsTo(Platinum::class);
    }

    public function supervisions(): HasMany
    {
        return $this->hasMany(Supervision::class);
    }
}
