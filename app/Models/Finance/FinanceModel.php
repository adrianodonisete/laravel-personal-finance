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
}
