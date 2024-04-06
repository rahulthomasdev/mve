<?php

namespace App\Utils;

class OrderUtility
{
    public static function generateUniqueOrderNumber($prefix = '', $length = 8)
    {
        // Generate a unique part based on timestamp and hashing
        $uniquePart = strtoupper(substr(md5(uniqid(mt_rand(), true)), 0, $length));

        // Combine the prefix and the unique part
        $orderNumber = $prefix . $uniquePart;

        return $orderNumber;
    }
}
