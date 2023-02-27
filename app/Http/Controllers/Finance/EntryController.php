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

    public function insertEntries(): View
    {
        return view('layout.sb-admin', ['content' => 'Cadastro de entradas']);
    }
}
