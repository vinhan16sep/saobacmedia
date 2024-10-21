<?php

if(!function_exists('numberFormat')){
	function numberFormat($number = 0){
		return number_format((int)$number, config('cart.format.decimals'), config('cart.format.decimal_point'), config('cart.format.thousand_separator'));
	}
}

if(!function_exists('getDataCart')){
	function getDataCart($percent, $checkDiscount = null){
		$cart = \Cart::instance(config('cart.instance'))->content();
        $sub_total = \Cart::instance(config('cart.instance'))->total(0,'','');
        $count = $cart->count();
        $discount_value = 0;
        if (session()->has('discount_code') || $checkDiscount === true) {
            $discount_value = ($sub_total/100)*$percent;
            $total = $sub_total - $discount_value;
        }
        $total = $total ?? $sub_total;
		if($count == 0 && session()->has('discount_code')){
			session()->forget('discount_code');
		}
		return [
			$cart, $sub_total, $count, $total, $discount_value
		];
	}
}

if(!function_exists('getImage')){
	function getImage($image){
		if (empty($image)) {
			return asset("/images/no-image-available-list.jpg");
		}
		return asset($image);
	}
}