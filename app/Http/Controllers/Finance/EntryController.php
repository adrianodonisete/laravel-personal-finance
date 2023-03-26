<?php

namespace App\Http\Controllers\Finance;

use App\Http\Controllers\Controller;
use App\Models\Files\MakeCsv;
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

    public function results(): View
    {
        $name_file = $this->request->input('name_file', 'new_month_' . date('Y_m_d'));
        $all = $this->request->input();

        $finance = new FinanceModel();
        $results = $finance->makeResults($all);

        $contentFile = MakeCsv::makeContentFile($all);

        return view('entry.results', [
            'title' => 'Resultado arquivo: ' . $name_file,
            'name_file' => $name_file,
            'results' => $results,
            'contentFile' => $contentFile,
        ]);
    }
}
