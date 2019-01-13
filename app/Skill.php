<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    protected $fillable = [
        'name', 'category_id'
    ];

    public function category() {
        return $this->belongsTo('App\Category');
    }

    public function profiles() {
        return $this->belongsToMany('App\Profile')
            ->as('skillLevel')
            ->withPivot(['level', 'description'])
            ->withTimestamps();
    }
}
