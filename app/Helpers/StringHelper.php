<?php

namespace App\Helpers;

class StringHelper
{
    public static function cleanInput(string $string): string
    {
        return htmlentities($string, ENT_QUOTES, 'UTF-8');
    }
}
