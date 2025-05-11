<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    use HasFactory;
    public function domonds(){
        return $this->hasMany(Domonde::class);
    }
    public function address(){
        return $this->belongsTo(Address::class,"adress_id");
    }
    public function categories(){
        return $this->belongsToMany(Category::class, "offer_category");
    }

    protected $fillable = [
        'title',
        'description',
        'price',
        'stars',
        'address_id',
    ];
    
    
    
}
