<?php

namespace App\Models;

use Eloquent;

class Category extends Eloquent {

    public $timestamps = false;

    public function faqs()
    {
        return $this->hasMany('App\Models\Faq');
    }

}
