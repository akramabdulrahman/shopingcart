<?php

namespace App\Shopping\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Laracasts\Presenter\PresentableTrait;

class CartItem extends Model {

    use PresentableTrait;

    /**
     * the data renderer this model uses
     *
     * @var string
     */
    protected $presenter = "\Shopping\Presenters\CartItemPresenter";

    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    /**
     * returns the cart that has this item 
     *
     * @return $mixed
     */
    public function cart() {
        return $this->belongsTo('App\Shopping\Models\Cart');
    }

    /**
     * returns the product represented by the cart item 
     *
     * @return $mixed
     */
    public function product() {
        return $this->belongsTo('App\Shopping\Models\Product');
    }

    /**
     * The "booting" method of the model.
     *
     * @return void
     */
    protected static function boot() {
        parent::boot();

        static::addGlobalScope('ProductScope', function(Builder $builder) {
            $builder->with('product');
        });
    }

}
