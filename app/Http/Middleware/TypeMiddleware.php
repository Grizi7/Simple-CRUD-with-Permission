<?php

namespace App\Http\Middleware;

use App\Enums\UserTypeEnum;
use Closure;
use Illuminate\Http\Request;

class TypeMiddleware
{
    public function handle(Request $request, Closure $next, ...$types)
    {
        $user = auth()->user();

        if (! $user || ! in_array($user->type->value, array_map(fn($type) => UserTypeEnum::from($type)->value, $types))) {
            return response()->json(['message' => 'Forbidden'], 403);
        }
        return $next($request);
    }
}
