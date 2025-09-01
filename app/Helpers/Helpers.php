<?php

use Illuminate\Support\Facades\Auth;

if (!function_exists('user')) {
    /**
     * Get the currently authenticated user.
     *
     * @return \App\Models\User|null
     */
    function user() {
        return Auth::user();
    }

}

if (!function_exists('myanmarNumberFormat')) {
function myanmarNumberFormat($number) {
    $number = (string) $number;
    $length = strlen($number);

    if ($length <= 3) {
        return $number;
    }

    $firstGroup = substr($number, 0, $length % 2 == 0 ? 1 : 2);
    $rest = substr($number, strlen($firstGroup));

    $restGroups = str_split($rest, 2);
    array_unshift($restGroups, $firstGroup);

    return implode(',', $restGroups);
}
}
