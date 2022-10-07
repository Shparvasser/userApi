<?php

namespace App\Services\Auth;

use App\Models\User;

class AuthService
{
    /**
     *
     * @param User $user
     * @return array
     */
    public function getResponseBodyAuth(User $user): array
    {
        $token = $user->createToken(config('app.name'));

        return [
            'user_uuid' => $user->uuid,
            'email' => $user->email,
            'balance' => $user->balance,
            'sanctum_token' => $token->plainTextToken
        ];
    }
}
