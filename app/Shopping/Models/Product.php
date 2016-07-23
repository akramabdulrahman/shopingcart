<?php

namespace App\Shopping\Models;

use Laracasts\Presenter\PresentableTrait;
use Illuminate\Database\Eloquent\Model;

class Product extends Model {

    use PresentableTrait;

    /**
     * the data renderer this model uses
     *
     * @var string
     */
    protected $presenter = "\Shopping\Presenters\ProductPresenter";

    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id', 'price'];

}
