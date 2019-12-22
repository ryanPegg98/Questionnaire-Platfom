<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = [
      'question',
      'type',
      'layout',
      'creator',
      'questionnaire'
    ];

    public function questionnaire()
    {
        return $this->belongsTo('App\Questionnaire');
    }
}
