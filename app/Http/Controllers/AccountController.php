<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRegisterRequest;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    public function show(): View
    {
        return view('account');
    }

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

    public function update(): RedirectResponse
    {
        $user = Auth::user();
        User::query()
            ->where('link_token', $user->link_token)
            ->update(
                [
                    'date_link_token' => date('Y-m-d H:i:s')
                ]
            );
        return redirect()->route('account', ['token' => $user->link_token]);
    }

    public function delete(): RedirectResponse
    {
        $user = Auth::user();
        User::query()
            ->where('link_token', $user->link_token)
            ->delete();
        return redirect()->route('start');
    }
}
