<?php

namespace App\Http\Middleware;

use App\Models\User;
use Carbon\Carbon;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class UserTokenSecure
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        /** @var User $user */
        $user = User::query()->where('link_token', $request->route('token'))->first();
        if (empty($user)) {
            return redirect()->route('start')->withErrors(['not exist such user']);
        }
        $currentDate = Carbon::now();
        $yourSpecificDate = Carbon::parse($user->date_link_token);
        if ($currentDate->diffInDays($yourSpecificDate) > 7) {
            $user->delete();
            return redirect()->route('start')->withErrors(['your account are expired']);
        }
        Auth::login($user);
        return $next($request);
    }
}
