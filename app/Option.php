<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    protected $fillable = [
        'question',
        'option',
    ];

    public function question() {
        return $this->belongsTo(Question::class);
    }
}
