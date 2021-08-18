<?php

namespace App;

use TCG\Voyager\Traits\Translatable;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use Translatable;
    protected $translatable = ['name'];
    
    public function products()
    {
        return $this->belongsToMany('App\Products');
    }
}
