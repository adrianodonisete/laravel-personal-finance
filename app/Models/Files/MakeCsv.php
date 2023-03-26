<?php

namespace App\Models\Files;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Helpers\Currency;
use App\Helpers\DateHelper;

class MakeCsv extends Model
{
    use HasFactory;

    public static function makeContentFile(array $all): string
    {
        $operation_type = $all['operation_type'] ?? [];
        $operation_category = $all['category'] ?? [];
        $operation_detail = $all['detail'] ?? [];
        $operation_date = $all['operation_date'] ?? [];
        $operation_value = $all['operation_value'] ?? [];

        $arrayFinal = [];
        foreach ($operation_value as $key => $_) {
            $type = $operation_type[$key] ?? 'none';
            $category = $operation_category[$key] ?? 'none';
            $detail = $operation_detail[$key] ?? 'none';
            $date = $operation_date[$key] ?? '';
            $value = $operation_value[$key] ?? 'none';

            $date = DateHelper::parseDate($date, 'd/m/Y');
            $value = Currency::toRealBr($value);

            $line = "{$type};{$category};{$detail};{$date};{$value}";
            $arrayFinal[] = $line;
        }

        return implode(PHP_EOL, $arrayFinal);
    }
}
