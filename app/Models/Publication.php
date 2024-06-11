<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class Publication extends Model
{
    use HasFactory;

    protected $table = 'publication';

    protected $fillable = ['title', 'year', 'type', 'owner_type', 'owner_id', 'file'];
    protected $primaryKey = 'id'; // Ensure this matches your primary key


    // Define the morph relationship to retrieve the owner
    public function owner()
    {
        return $this->belongsTo(Expert::class, 'owner_id');
    }

}
