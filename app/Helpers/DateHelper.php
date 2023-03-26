<?php

namespace App\Helpers;

use DateTime;

class DateHelper
{
    public static function isValidDateBr(string $date): bool
    {
        $format = 'd/m/Y';
        $d = DateTime::createFromFormat($format, $date);
        return $d && $d->format($format) == $date;
    }

    public static function isValidDate(string $date): bool
    {
        $format1 = 'Y-m-d H:i:s';
        $d = DateTime::createFromFormat($format1, $date);
        $valida1 = $d && $d->format($format1) == $date;

        $format2 = 'm/d/Y H:i:s';
        $d = DateTime::createFromFormat($format2, $date);
        $valida2 = $d && $d->format($format2) == $date;

        return $valida1 || $valida2;
    }

    public static function parseDate(string $date, $format = 'd/m/Y'): string
    {
        $date = trim($date);
        if (empty($date)) {
            return '';
        }

        if (strpos($date, '/') !== false) {
            $date = self::parseDateBrToMssql($date);
        }
        return date($format, strtotime($date));
    }

    public static function parseDateBrToMssql(string $date): string
    {
        $dia = substr($date, 0, 2);
        $mes = substr($date, 3, 2);
        $ano = substr($date, 6, 4);
        return $ano . '-' . $mes . '-' . $dia;
    }

    public static function timestampAddMonths(int $addMonths = 0): int|bool
    {
        return mktime(10, 10, 10, date('m') + $addMonths, date('d'), date('Y'));
    }

    public static function timestampAddDays(int $addDays = 0): int|bool
    {
        return mktime(10, 10, 10, date('m'), date('d') + $addDays, date('Y'));
    }
}
