<?php

namespace App\Http\Controllers\api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\auth\LoginRequest;
use App\Http\Requests\auth\RegisterRequest;
use App\Models\User;
use App\Services\Auth\AuthService;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    /**
     * @param LoginRequest $request
     * @return Response|\Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory
     */
    public function login(LoginRequest $request): Response|\Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory
    {
        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password))
            return response(['error' => __('auth.failed')],Response::HTTP_UNAUTHORIZED);

        return response(resolve(AuthService::class)->getResponseBodyAuth($user), Response::HTTP_OK);
    }

    /**
     * @param RegisterRequest $request
     * @return Response|\Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory
     */
    public function register(RegisterRequest $request): Response|\Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory
    {
        $user = User::where('email', $request->email)->first();

        if ($user)
            return response(['error' => 'There is already a user with this email'],Response::HTTP_BAD_REQUEST);

        $newUser = User::create([
            'uuid' => Str::uuid()->toString(),
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        return response(resolve(AuthService::class)->getResponseBodyAuth($newUser), Response::HTTP_OK);
    }
}
