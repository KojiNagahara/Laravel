<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'nickname', 'avatar_filename', 'user_id'
    ];

    public function user() {
        return $this->belongsTo('App\User')->first();
    }

    public function skills() {
        return $this->belongsToMany('App\Skill')
            ->as('skillLevel')
            ->withPivot(['level', 'description'])
            ->withTimestamps();
    }
}
