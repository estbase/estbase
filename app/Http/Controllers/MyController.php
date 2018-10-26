<?php

namespace App\Http\Controllers;

use estbase\Core\Domain\Player\Repository\PlayerRepository;

class MyController extends Controller
{
    public function index()
    {
        // TODO - Borrar despues de las pruebas
        // Aqui cridar al repo del player
        $playerRepo = new PlayerRepository();
        // Agafar-ne un o tots:
        $player = $playerRepo->all();
        // Tornar un:
        return response()->json($player);
    }
}