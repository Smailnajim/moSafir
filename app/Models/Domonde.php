<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Domonde extends Model
{
    use HasFactory;
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function offer(){
        return $this->belongsTo(Offer::class);
    }
    protected $fillable = [
        'numberOfPersensons',
        'numberOfDays',
        'description',
        'stars',
        'user_id',
        'offer_id',
    ];
    
    
    
}
