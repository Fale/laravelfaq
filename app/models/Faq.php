<?php

namespace App\Models;

use Eloquent;

class Faq extends Eloquent {

    public $timestamps = false;

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }

}
