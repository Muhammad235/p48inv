<?php

if (!function_exists('generate_refferal_id')) {
    
    function generate_refferal_id() : string 
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';

        for ($i = 0; $i < 8; $i++) {
            $randomString .= $characters[rand(0, strlen($characters) - 1)];
        }

        // get the last two digit of the timestamp
        $timestampPart = substr(time(), -2); 
        $randomString .= $timestampPart;

        return $randomString;
    }
}