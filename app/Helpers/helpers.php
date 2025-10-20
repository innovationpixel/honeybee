<?php

if (!function_exists('getCartCount')) {
    function getCartCount()
    {
        $cart = session()->get('cart', []);

        $totalCount = 0;

        foreach ($cart as $item) {
            $totalCount += 1;
        }

        return $totalCount;
    }
}
