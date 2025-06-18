<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    //

    public function register(RegisterRequest $request)
    {
        return response()->json([
            'message' => 'User registered successfully',
        ]);
    }
}
