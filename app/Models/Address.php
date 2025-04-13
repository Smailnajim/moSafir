<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;
    public function offers(){
        return $this->hasMany(Offer::class);
    }
    protected $fillable = [
        'place',
    ];
}
