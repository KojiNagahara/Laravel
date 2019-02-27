<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    public const INVITED = 0;
    public const DENIED = 1;
    public const JOINED = 2;
    public const LEAVED = 3;

    protected $fillable = [
        'name', 'description','isActive'
    ];

    public function members()
    {
        return $this->belongsToMany('App\User')
            ->as('detail')
            ->withPivot(['status', 'isAdmin'])
            ->withTimestamps();
    }

    public function isAdmin(User $user)
    {
        if ($this->members()->where('user_id', $user->id)->count() == 0) {
            return false;
        }
        return $this->members()->where('user_id', $user->id)->first()->detail->isAdmin;
    }

}
