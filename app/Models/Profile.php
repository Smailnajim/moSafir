<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'user_id'
    ];

    public function owner(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function users(){
        return $this->belongsToMany(User::class, 'user_profile_table_pivo', 'profile_id', 'user_id');
    }
}
