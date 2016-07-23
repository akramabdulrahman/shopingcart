<?php

namespace App\Shopping\Factories;

use App\Shopping\Models\Product;
use Exception;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ProductFactory
 *
 * @author blackthrone
 */
class CheckoutFactory {

    /**
     * @param $product 
     * @return $mixed 
     *  */
    public static function Build(Product $product) {
        $checkout = 'Shopping\\CheckoutHandlers\\' . $product->paymentType . "Checkout";
        if (class_exists($checkout)) {
            return new $checkout;
        } else {
            throw new Exception("Invalid Checkout method given.");
        }
    }

}
