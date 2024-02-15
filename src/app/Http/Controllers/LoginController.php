<?php

namespace App\Http\Controllers;

use App\Jobs\LoginJob;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login(Request $request): \Illuminate\Http\JsonResponse
    {
        $identity = $request->input('identity');

        dispatch(new LoginJob($identity));

        return response()->json(['message' => 'Login job dispatched']);
    }
}
