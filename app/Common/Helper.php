<?php

function prx($arr)
{
    echo "<pre>";
    print_r($arr);
    echo "</pre>";
}

/**
 * make the string lowercase
 * then replace spaces with hyphens
 */
function replace_slug_str($str)
{
    $str = strtolower($str);
    $str = preg_replace('/\s+/', '-', $str);
    return $str;
}