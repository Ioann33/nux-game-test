<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRegisterRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;

class UserRegisterController extends Controller
{
    public function create(UserRegisterRequest $request): RedirectResponse
    {
        $validatedData = $request->validated();
        $token = md5($validatedData['username'].$validatedData['phone'].rand(100,10000));
        User::query()->create([
            'username' => $validatedData['username'],
            'phone' => $validatedData['phone'],
            'link_token' => $token,
            'date_link_token' => date('Y-m-d H:i:s')
        ]);
        return redirect()->route('link')->with('token', $token);
    }
}
