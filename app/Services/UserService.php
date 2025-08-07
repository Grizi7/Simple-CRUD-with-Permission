<?php

namespace App\Services;

use App\Models\User;
use App\Enums\UserTypeEnum;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class UserService
{
    public function register(array $data): array
    {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'type' => UserTypeEnum::user->value,
            'status' => 1
        ]);

        $token = $user->createToken('authToken')->plainTextToken;

        return compact('user', 'token');
    }

    public function login(array $data): array
    {
        $user = User::where('email', $data['email'])
            ->where('status', 1)
            ->where('type', UserTypeEnum::user->value)
            ->first();

        if (! $user || ! Hash::check($data['password'], $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }

        $token = $user->createToken('authToken')->plainTextToken;

        return compact('user', 'token');
    }

    public function logout($user): void
    {
        $user->currentAccessToken()->delete();
    }
}
