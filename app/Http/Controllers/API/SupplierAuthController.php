<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Supplier; 
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class SupplierAuthController extends Controller
{
     public function register(Request $request){

        $request->validate([
         'first_name'=> 'required|string|max:255', 
         'last_name'=>'required|string|max:255', 
         'number'=>'required|string|max:20', 
         'email'=>'required|string|email|max:255|unique:suppliers,email', 
         'password'=> 'required|string|min:10|confirmed', 
         'company_name'=>'required|string|max:255',
        ]);

        $supplier = \App\Models\Supplier::create([
        'first_name'=> $request->first_name, 
        'last_name'=>$request->last_name, 
        'number'=>$request->number, 
        'email'=>$request->email, 
        'password'=> bcrypt($request->password), 
        'company_name'=> $request->company_name, 

        ]);

        $token = $supplier->createToken('auth_token')->plainTextToken;

        return response()->json([
            'message'  => 'Supplier registered successfully',
            'supplier' => $supplier,
            'token'    => $token,
        ], 201);
        
}

public function login(Request $request)
{
    $request->validate([
        'email' => 'required|string|email',
        'password' => 'required|string',
    ]);

    $supplier = Supplier::where('email', $request->email)->first();

    if (!$supplier || !Hash::check($request->password, $supplier->password)) {
        return response()->json(['message' => 'Invalid credentials'], 401);
    }

    $token = $supplier->createToken('auth_token')->plainTextToken;

    return response()->json([
        'message' => 'Supplier logged in successfully',
        'supplier' => $supplier,
        'token' => $token,
    ]);
}


public function logout(Request $request)
{
    // Revoke the current token
    $request->user()->currentAccessToken()->delete();

    return response()->json([
        'message' => 'Supplier logged out successfully'
    ]);
}


}