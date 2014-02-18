<?php

namespace App\Models;

use Eloquent;
use File;

class Faq extends Eloquent {

    public $timestamps = false;

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }

    public function getQuestionAttribute()
    {
        preg_match( "/^#([[:print:]]*)\n(.*)/is", File::get(base_path() . '/faq/' . $this->path . ".md"), $match);
        return $match[1];
    }

    public function getAnswerAttribute()
    {
        preg_match( "/^#([[:print:]]*)\n(.*)/is", File::get(base_path() . '/faq/' . $this->path . ".md"), $match);
        return $match[2];
    }
}
