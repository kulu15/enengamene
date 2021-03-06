<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\BaseTrait;

class QuizReponse extends Model
{
    use BaseTrait;

    protected $guarded = [];

    /**
     * Retourne la question a laquelle cette reponse est liee.
     */
    public function quiz_question()
    {
        return $this->belongsTo('App\QuizQuestion');
    }
}

