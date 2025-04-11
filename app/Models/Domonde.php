<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Domonde extends Model
{
    use HasFactory;
    protected $fillable = [
        'numberOfPersensons',
        'numberOfDays',
        'description',
        'stars',
    ];
    
    
    
}
