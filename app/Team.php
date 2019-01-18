<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    public const INVITED = 0;
    public const DENIED = 1;
    public const JOINED = 2;
    public const LEAVED = 3;

    protected $fillable = [
        'name', 'description','leader','isActive'
    ];

    public function members()
    {
        return $this->belongsToMany('App\User')
            ->as('member')
            ->withPivot(['status', 'isAdmin'])
            ->withTimestamps();
    }

    public function isAdmin(User $user)
    {
        return $this->members()->where('user_id', $user->id)->first()->member->isAdmin;
    }

}
