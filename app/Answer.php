<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $fillable = [
        'level', 'description', 'category_id'
    ];

    public function category() {
        return $this->belongsTo('App\Category');
    }
}
