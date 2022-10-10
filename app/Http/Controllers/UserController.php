<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
    public function login(Request $request)
    {
        try {
            $valid = $request->validate([
                'username' => "required|string|exists:users,username",
                'password' => "required|string"
            ]);
            $user = User::where('username', $valid['username'])->first();
            if (!$user || !Hash::check($valid['password'], $user->password)) {
                return response()->json(['status' => 0, 'message' => 'Wrong credentials'], 401);
            }
            $token = $user->createToken('api-token')->plainTextToken;
            return response()->json(['status' => 0, 'message' => 'error_logging_in', 'token' => $token], 200);
        } catch (Exception $error) {
            return response()->json(['status' => 0, 'message' => 'error_logging_in'], 403);
        }
    }
}
