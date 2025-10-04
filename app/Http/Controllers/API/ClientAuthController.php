<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Client;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class ClientAuthController extends Controller
{
    public function register(Request $request){

        $request->validate([
         'first_name'=> 'required|string|max:255', 
         'second_name'=>'required|string|max:255', 
         'number'=>'required|string|max:20', 
         'email'=>'required|email|string|max:255|unique:clients,email', 
         'password'=> 'required|string|min:10|confirmed', 
         'birthday'=>'nullable|date', 
        ]);

        $client = \App\Models\Client::create([
        'first_name'=> $request->first_name, 
        'second_name'=>$request->second_name, 
        'number'=>$request->number, 
        'email'=>$request->email, 
        'password'=> bcrypt($request->password), 
        'birthday'=> $request->birthday, 

        ]);

        $token = $client->createToken('token')->plainTextToken; 

       return response()->json([
        'message' => 'User registered successfully', 
        'client'=> $client,
        'token' => $token, 
    ], 201 ); 
    
    }


public function login(Request $request)
{
    $request->validate([
        'email' => 'required|string|email',
        'password' => 'required|string',
    ]);

    $client = Client::where('email', $request->email)->first();

    if (!$client || !Hash::check($request->password, $client->password)) {
        return response()->json(['message' => 'Invalid credentials'], 401);
    }

    $token = $client->createToken('token')->plainTextToken;

    return response()->json([
        'message' => 'Client logged in successfully',
        'client' => $client,
        'token' => $token,
    ]);
}


public function logout(Request $request)
{
    // Revoke the current token
    $request->user()->currentAccessToken()->delete();

    return response()->json([
        'message' => 'Client logged out successfully'
    ]);
}
    
}
