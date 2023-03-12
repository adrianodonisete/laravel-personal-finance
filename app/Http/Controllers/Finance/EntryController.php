<?php

namespace App\Http\Controllers\Finance;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;

use App\Models\Finance\FinanceModel;
use App\Models\Finance\FinanceDTO;

class EntryController extends Controller
{
    public Request $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function firstStep(): View
    {
        return view('entry.first', ['title' => 'Cadastro de entradas - Passo 1']);
    }

    public function secondStep(): View
    {
        $list_operations = $this->request->input('list_operations', '');

        $finance = new FinanceModel();
        $all = $finance->makeArrayOperations($list_operations);

        $array_operations = [];
        foreach ($all as $operation) {
            $array_operations[] = new FinanceDTO([
                'operation_type' => $operation[0],
                'category' => $operation[1],
                'detail' => $operation[2],
                'operation_date' => $operation[3],
                'operation_value' => $operation[4],
            ]);
        }

        return view('entry.second', [
            'title' => 'Cadastro de entradas - Passo 2',
            'array_operations' => $array_operations,
        ]);
    }
}
