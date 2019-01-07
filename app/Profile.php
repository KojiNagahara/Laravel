<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'nickname', 'avatar_filename', 'user_id'
    ];

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function skills() {
        return $this->hasMany('App\Skill');
    }
}
