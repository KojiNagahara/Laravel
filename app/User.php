<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function hasProfile()
    {
        return $this->profile() != null;
    }

    public function profile()
    {
        return $this->hasOne('App\Profile')->first();
    }

    public function teams()
    {
        return $this->belongsToMany('App\Team')
            ->as('belongsTo')
            ->withPivot(['status', 'isAdmin'])
            ->withTimestamps();
    }

    public function activeTeams()
    {
        return $this->teams()
            ->where('isActive', true);
    }
}
