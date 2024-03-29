<?php namespace App\Models;

use Eloquent;
use File;

class Faq extends Eloquent {

    public $timestamps = false;

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }

    public function getAnswerAttribute()
    {
        $file = File::get(base_path() . '/faq/' . $this->path . ".md");
        preg_match( "/^#([[:print:]]*)\n(.*)(?:\{\"tags\":.*\})/is", $file, $match);
        if (!count($match))
            preg_match( "/^#([[:print:]]*)\n(.*)/is", $file, $match);
        return $match[2];
    }

    public function tags()
    {
        return $this->belongsToMany('App\Models\Tag');
    }

}
