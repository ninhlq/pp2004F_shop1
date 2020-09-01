<?php

if (!function_exists('vnd_format')) {
    function vnd_format($price, $quantity= 1, $multiply = 1000) {
        return number_format(($price * $quantity * $multiply), 0, ',', '.');
    }
}