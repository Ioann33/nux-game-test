<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;

class LinkController extends Controller
{
    public function index(): Factory|Application|View|\Illuminate\Contracts\Foundation\Application
    {
        $token = session('token');
        if (empty($token)) {
            abort(404);
        }
        $url = config('app.url')."/account/$token";
        return view('linkPage', ['url' => $url]);
    }
}
