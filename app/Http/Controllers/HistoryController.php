<?php

namespace App\Http\Controllers;

use App\Models\History;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HistoryController extends Controller
{
    public function index():  View
    {
        $history = History::query()
            ->where('user_id', Auth::user()->id)
            ->orderBy('created_at', 'desc')
            ->limit(3)
            ->get();
        return view('history', [
            'history' => $history
        ]);
    }
}
