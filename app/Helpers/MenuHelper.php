<?php

namespace App\Helpers;

class MenuHelper
{
    public static function isThatPage(string $option, string $page): bool
    {
        $allPages = self::allPages();
        return in_array(needle: $page, haystack: $allPages[$option]);
    }

    public static function allPages(): array
    {
        return [
            'entradas' => ['entry.first', 'entry.second', 'entry.results'],
            'relatorios' => ['report.all', 'report.months'],
        ];
    }
}
