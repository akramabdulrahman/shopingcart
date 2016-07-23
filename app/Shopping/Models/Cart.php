<?php

namespace App\Shopping\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model {

    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    /**
     * returns the user who owns the cart
     *
     * @return $mixed
     */
    public function user() {
        return $this->belongsTo('App\User');
    }

    /**
     * returns the cart items 
     *
     * @return $mixed
     */
    public function cartItems() {
        return $this->hasMany('App\Shopping\Models\CartItem');
    }

    /**
     * returns the cart items 
     *
     * @return $mixed
     */
    public function getTotalPrice() {
        $items = $this->cartItems;
        return $items->map(function ($item, $key) {
                    return $item->product->price * ($item->qty);
                })->sum();
    }

}
