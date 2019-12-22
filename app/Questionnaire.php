<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Questionnaire extends Model
{
    protected $fillable = [
      'title',
      'description',
      'agreement',
      'status',
      'layout',
      'creator'
    ];

    /**
     * The questionnaire can only belong to one user
     */

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
