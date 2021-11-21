<?php

namespace App\Http\Controllers;

use App\Exceptions\AuthException;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests\AuthRequest;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    public function __invoke(AuthRequest $request)
    {
        $input = $request->only(["email", "password"]);

        if (!Auth::attempt($input)) {
            throw new AuthException();
        }

        $user = Auth::user(); /** @var \App\Models\User $user **/

        $token = $user->createToken("jwt");

        return response()->json([
            "token" => $token->plainTextToken,
        ]);
    }
}
