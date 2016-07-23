<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Shopping\Presenters;

use Laracasts\Presenter\Presenter;

/**
 * Description of CartItemPresenter
 *
 * @author blackthrone
 */
class CartItemPresenter extends Presenter {

    public function details() {
        $detail = "";
        if ($this->product->paymentType == "Subscription") {
            $detail.= "from [" . $this->start . "] to [" . $this->end . "] --";
        }
        $detail.= "[" . $this->qty . "] Items";

        return $detail;
    }

}
