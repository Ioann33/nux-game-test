<?php

namespace App\Http\Controllers;

use App\Models\History;
use App\Services\GameService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GameController extends Controller
{
    public function index(GameService $gameService): View
    {
        $result = $gameService->getResult();
        $prize = $gameService->getWinAmount($result);
        $randomNumber = $gameService->getRandomNumber();
        History::query()->create(
            [
               'user_id' => Auth::user()->id,
                'result' => $result,
                'amount' => $prize,
                'number' => $randomNumber
            ]
        );
        return view('game', [
            'result' => $result,
            'prize' => $prize,
            'number' => $randomNumber
        ]);
    }
}
