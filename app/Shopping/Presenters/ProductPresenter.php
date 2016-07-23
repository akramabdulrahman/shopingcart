<?php

namespace Shopping\Presenters;

use Laracasts\Presenter\Presenter;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ProductPresenter
 *
 * @author blackthrone
 */
class ProductPresenter extends Presenter {
    public function formView(){
        return view("Shopping.ProductsForms.".$this->paymentType,array('product'=>$this))->render();
    }
    
    
}
