<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Resources\ClientResource;
use http\Client;
use Illuminate\Http\Request;
use phpseclib\Crypt\Hash;

class AuthClientController extends Controller
{
    public function auth(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'device_name' => 'required',
        ]);

        $client = \App\Models\Client::where('email', $request->email)->first();

        if(!$client && Hash::check($request->password, $client->password)) {
            return response()->json(['message' => 'Falha na autênticação'], 404);
        }

        $token = $client->createToken($request->device_name)->plainTextToken;

        return response()->json(['token' => $token]);

    }

    public function me(Request $request){

        $client = $request->user();
        return new ClientResource($client);

    }

    public function logout(Request $request){

        $client = $request->user();

        // Revoque all tokens client
        $client->tokens()->delete();
        return response()->json([], 204);

    }
}
