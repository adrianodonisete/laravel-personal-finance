<?php

namespace App\Http\Controllers\Finance;

use App\Http\Controllers\Controller;
use App\Models\Finance\FinanceModel;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;

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
        $array_operations = $finance->makeArrayOperations($list_operations);

        return view('entry.second', [
            'title' => 'Cadastro de entradas - Passo 2',
            'array_operations' => $array_operations,
        ]);
    }
}
