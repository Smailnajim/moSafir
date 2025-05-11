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

    public function country(){
        return $this->belongsTo(Country::class);
    }

    protected $fillable = [
        'city',
    ];
}