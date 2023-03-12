<?php

namespace App\Models\Finance;

class FinanceHandler
{
    public static function moneyBrToFloat(string $value): float
    {
        $value = str_replace(['R', '$', '.', ','], ['', '', '', '.'], $value);
        return floatval(trim($value));
    }
}
