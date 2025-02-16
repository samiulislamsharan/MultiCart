<?php

use Carbon\Carbon;

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

function checkTokenExpiryInMinutes($time, $timeDiff = 60)
{
    $data = Carbon::parse($time->format('Y-m-d h:i:s a'));
    $now = Carbon::now();

    $diff = $data->diffInMinutes($now);

    if ($diff > $timeDiff) {
        return true;
    } else {
        return false;
    }
}

function generateRandomString($length = 20)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';

    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}