<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

   
    public function timeline()
    {
        //include all of the user`s tweet 
        //as well as the tweet of everyone he fallow

        $ids = $this->fallows()->pluck('id');
        $ids->push($this->id);

        return Tweet::whereIn('user_id', $ids)->latest()->get();
    }

    // public function fallow(User $user)
    // {
    //     return $this->fallows()->save($user);
    // }

    public function tweets()
    {
        return $this->hasMany(Tweet::class);
    }

    public function fallows()
    {
        return $this->belongsToMany(User::class, 'fallows', 'user_id', 'fallowing_user_id');
    }

    public function getRouteKeyName()
    {
        return 'name';
    }
}
