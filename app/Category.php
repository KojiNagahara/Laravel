<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name'
    ];

    public function skills() {
        return $this->hasMany('App\Skill');
    }

    public function answers() {
        return $this->hasMany('App\Answer');
    }
}
