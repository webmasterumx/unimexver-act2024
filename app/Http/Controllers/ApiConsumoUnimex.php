<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiConsumoUnimex extends Controller
{
    public function getRvoes()
    {

        $ruta = "https://comunimex.lat/TestingUnimexApi/api/PaginaWebUMX/CatRvoe";

        $response = Http::get($ruta);

        return $response->json();
    }
}
