<?php

namespace App\Shopping\Contracts;

use App\Shopping\Models\Product;
use App\User;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CheckOutInterface
 *
 * @author blackthrone
 */
interface CheckoutInterface {

    /**
     * @todo make this method rely on cart object
     * @param $product 
     * @param $user
     * @return boolean
     *  */
    public function checkout(Product $product, User $user);
}
