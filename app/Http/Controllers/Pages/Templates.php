<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Templates extends Controller
{
    public Request $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function show($page)
    {
        if (view()->exists("auth.{$page}")) {
            $view = view("auth.{$page}");
        } elseif (view()->exists("sb-admin.{$page}")) {
            $view = view("sb-admin.{$page}");
        } else {
            $view = view("error.404", ['content' => "Página {$page} não encontrada"]);
        }

        return $view;
    }
}
