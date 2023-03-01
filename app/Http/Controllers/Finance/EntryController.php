<?php

namespace App\Http\Controllers\Finance;

use App\Http\Controllers\Controller;
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
        return view('entry.second', ['title' => 'Cadastro de entradas - Passo 2']);
    }
}
