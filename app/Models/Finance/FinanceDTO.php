<?php

namespace App\Models\Finance;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

use App\Enums\Category;
use App\Enums\Operation;
use App\Helpers\DateHelper;

class FinanceDTO extends Model
{
    protected $fillable = [
        'operation_type', 'category', 'detail', 'operation_date', 'operation_value',
    ];

    protected function operationType(): Attribute
    {
        return Attribute::make(
            set: fn (string $value) => trim($value),
        );
    }

    protected function category(): Attribute
    {
        return Attribute::make(
            set: fn (string $value) => trim($value),
        );
    }

    protected function detail(): Attribute
    {
        return Attribute::make(
            set: fn (string $value) => substr(trim($value), 0, 255),
        );
    }

    protected function operationDate(): Attribute
    {
        return Attribute::make(
            set: fn (string $value) => DateHelper::parseDate($value, 'Y-m-d'),
        );
    }

    protected function operationValue(): Attribute
    {
        return Attribute::make(
            set: fn (string $value) => FinanceHandler::moneyBrToFloat($value),
            get: fn (float $value) => number_format($value, 2, '.', ''),
        );
    }
}
