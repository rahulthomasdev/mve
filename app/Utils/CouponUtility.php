<?php

namespace App\Utils;

class CouponUtility
{
    public static function generateCouponCode($length = 8)
    {
        // Characters allowed in the coupon code
        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';

        // Generate a random string of the specified length
        $couponCode = '';
        for ($i = 0; $i < $length; $i++) {
            $couponCode .= $characters[rand(0, strlen($characters) - 1)];
        }

        return $couponCode;
    }
}
