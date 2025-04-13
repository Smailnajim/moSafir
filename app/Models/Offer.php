<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    use HasFactory;
    public function domond(){
        return $this->hasMany(Domonde::class);
    }
    public function address(){
        return $this->belongsTo(Address::class);
    }
    public function categories(){
        return $this->belongsToMany(Category::class);
    }

    protected $fillable = [
        'title',
        'description',
        'price',
        'stars',
        'address_id',
    ];
    
    
    
}
