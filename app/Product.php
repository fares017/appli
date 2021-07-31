<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

   /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['stock'];

  public function getprice(){
      $price = $this->price;
      return number_format($price, 0, ',', ' ')." DA";

    }

    public function categories(){
      return $this->belongsToMany('App\category');
    }
    
    public function orders(){
      return $this->belongsToMany('App\Order');
    }

    
    public function wishlists()
    {
        return $this->belongsToMany('App\Wishlist');
    }
    
}
