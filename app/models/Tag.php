<?php namespace App\Models;

use Eloquent;

class Tag extends Eloquent {

    public $timestamps = false;

    public function faqs()
    {
        return $this->belongsToMany('App\Models\Faq');
    }

}
