<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;

class LinkController extends Controller
{
    public function index(): View
    {
        $token = session('token');
        if (empty($token)) {
            abort(404);
        }
        $url = config('app.url')."/account/$token";
        return view('linkPage', ['url' => $url]);
    }
}
