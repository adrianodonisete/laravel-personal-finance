<?php

namespace App\Models\Finance;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FinanceModel extends Model
{
    use HasFactory;

    public function makeArrayOperations(string $list_operations): array
    {
        $list_operations = str_replace(["\r\n", "\n", "\r"], PHP_EOL, $list_operations);
        $arrAux = explode(PHP_EOL, $list_operations);

        $array = [];
        foreach ($arrAux as $line) {
            $line = str_replace("\t", ';', $line);
            $array[] = array_map('trim', explode(';', $line));
        }
        return $array;
    }

    public function makeResults(array $all): array
    {
        $operation_type = $all['operation_type'] ?? [];
        $operation_category = $all['category'] ?? [];
        $operation_value = $all['operation_value'] ?? [];

        $calc_general = [];
        foreach ($operation_value as $key => $value) {
            $value = floatval($value);
            $type = $operation_type[$key] ?? 'none';
            $category = $operation_category[$key] ?? 'none';

            $calc_general['general'][] = $value;
            $calc_general["type_{$type}"][] = $value;
            $calc_general["category_{$category}"][] = $value;
        }

        $calc_value = [];
        foreach ($calc_general as $key => $arrayValues) {
            $calc_value[$key] = array_sum($arrayValues);
        }

        return $calc_value;
    }
}
