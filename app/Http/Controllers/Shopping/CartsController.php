<?php

namespace App\Http\Controllers\Shopping;

use App\Http\Controllers\Controller;
use App\Shopping\Models\Cart;
use App\Shopping\Models\CartItem;
use App\Shopping\Factories\CheckoutFactory;
use Auth;
use Illuminate\Http\Request;

class CartsController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $cart = Cart::where('user_id', Auth::user()->id)->first();

        if (!$cart) {
            $cart = new Cart();
            $cart->user_id = Auth::user()->id;
            $cart->save();
        }

      
        return view('Shopping.Cart.index', ['items' => $cart->cartItems, 'total' => $cart->getTotalPrice()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $cart = Cart::where('user_id', Auth::user()->id)->first();

        if (!$cart) {
            $cart = new Cart();
            $cart->user_id = Auth::user()->id;
            $cart->save();
        }
        $cartItem = CartItem::firstOrNew([
                    "product_id" => $request->input('product_id'),
                    "cart_id" => $cart->id
        ]);
        if ($cartItem->exists) {
            $cartItem->qty++;
        } else {
            $cartItem = new Cartitem();
            $cartItem->product_id = $request->input('product_id');
            $cartItem->cart_id = $cart->id;
        }

        $cartItem->save();

        return redirect('/cart');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function RemoveItem($id) {
        $cartItem = CartItem::find($id);
        if ($cartItem->qty > 1) {
            $cartItem->qty--;
            $cartItem->save();
        } else {
            $cartItem->delete();
        }
        return redirect('/cart');
    }

    public function checkout() {
        $cart = Auth::user()->cart()->first();
        $items = $cart->cartItems()->get();
        $checkoutFactory = new CheckoutFactory();
        foreach ($items as $item) {
            $checkoutHandler = $checkoutFactory::build($item->product);
            $checkoutHandler->checkout($item->product, Auth::user());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        //
    }

}
