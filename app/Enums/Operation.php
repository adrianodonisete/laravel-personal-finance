<?php

namespace App\Enums;

enum Operation: string
{
    case entries = 'Entrada';
    case expenses = 'Saída';

    public static function getValue(string $name): string
    {
        $name = str_replace('-', '_', $name);

        foreach (self::cases() as $status) {
            if ($name === $status->name) {
                return $status->value;
            }
        }
        return 'none';
    }
}
