<?php

namespace App\Traits;

trait CartTrait {
    public function emptyCart()
    {
        session()->put('cart', []);
        session()->put('cart-quantity', []);
    }
}