<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Scale extends Model
{
    protected $fillable = [
        'question',
        'startDetail',
        'start',
        'endDetail',
        'end'
    ];

    public function question()
    {
        return $this->belongsTo('App\Question');
    }

}
