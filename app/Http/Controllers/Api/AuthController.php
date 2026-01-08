<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Staff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        // 1. Validate inputs
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // 2. Check user
        $user = Staff::where('email', $request->email)->first();

        // 3. Verify password & user existence
        if (! $user || ! Hash::check($request->password, $user->password)) {
            return response()->json(['message' => 'Invalid credentials'], 403);
        }

        // 4. Check status
        if ($user->status !== 'active') {
            return response()->json(['message' => 'Account is inactive'], 403);
        }

        // 5. Generate Token
        $token = $user->createToken('StaffToken')->accessToken;

        return response()->json([
            'access_token' => $token,
            'user' => $user,
            'role' => 'staff'
        ]);
    }
}