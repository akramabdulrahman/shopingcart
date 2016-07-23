<?php

namespace App\Http\Controllers;

use App\Shopping\Models\Product;

class HomeController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $products = Product::all();
        return view('home', ['products' => $products]);
    }

}