<?php

if(!function_exists( 'dump') ) {
    function dump()
    {
        array_map(function($x) {
            dump($x);
        }, func_get_args());
    }
}
if (!function_exists('dd')) {
    function dd()
    {
        array_map(function($x) {
            dump($x);
        }, func_get_args());
        die;
    }
}
if (!function_exists('d')) {
    function d()
    {
        array_map(function($x) {
            dump($x);
        }, func_get_args());
    }
}