<?php

namespace App\Helpers;

class Currency
{
    public static function toRealBr(string $value): string
    {
        if (!is_numeric($value)) {
            return $value;
        }

        return 'R$ ' . number_format(floatval($value), 2, ',', '.');
    }
}
