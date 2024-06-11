<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Publication; 

class Expert extends Model
{
    use HasFactory;

    // Define the table name if it's not the plural of the model name
    protected $table = 'expert';

    protected $primaryKey = 'expert_id'; // Specify the custom primary key


    // Define the attributes that are mass assignable
    protected $fillable = ['name', 'domain', 'origin', 'email', 'user_id'];

    // only retrieve expert publication
    public function publications()
    {
        return $this->hasMany(Publication::class, 'owner_id')->where('owner_type', 'Expert');
    }
}
