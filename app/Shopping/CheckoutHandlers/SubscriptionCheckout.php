<?php
namespace Shopping\CheckoutHandlers;

use App\Shopping\Contracts\CheckoutInterface;
use App\Shopping\Models\Product;
use App\User;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of SubscriptionCheckout
 *
 * @author blackthrone
 */
class SubscriptionCheckout implements CheckoutInterface {

    public function checkout(Product $product, User $user) {
        echo "your subscription has been obtained";
    }

}
