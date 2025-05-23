<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Profile;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    public function role(){
        return $this->belongsTo(Role::class);
    }
    public function reactions(){
        return $this->hasMany(Reaction::class);
    }
    public function posts(){
        return $this->hasMany(Post::class);
    }
    public function domond(){
        return $this->hasMany(Domonde::class);
    }
    public function status(){
        return $this->belongsTo(Status::class);
    }

    public function myProfile(){
        return $this->hasOne(Profile::class);
    }

    public function profiles(){
        return $this->belongsToMany(Profile::class, 'user_profile_table_pivo', 'user_id', 'profile_id');
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'image',
        'email',
        'password',
        'role_id',
        'status_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
