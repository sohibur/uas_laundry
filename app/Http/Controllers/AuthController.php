<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function register(Request $request)
    {
        $valid = $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|max:255',
            'password' => 'required',
            'alamat' => 'required|max:255'
        ]);
        $password = Hash::make($request->password);
        $regis = User::create([
            'name' => $valid['name'],
            'email' => $valid['email'],
            'password' => $password,
            'alamat' => $valid['alamat']
        ]);

        if($regis) {
            return response()->json([
                'success' => true,
                'message' => 'Berhasil di Daftarkan',
                'data' => $regis
            ], 201);
        }else{
            return response()->json([
                'success' => false,
                'message' => 'Gagal Mendaftarkan',
                'data' => ''
            ], 404);
        }
    }

    public function login(Request $request)
    {
        $valid = $this->validate($request, [
            'email' => 'required|exists:users,email',
            'password' => 'required',
        ]);
        $user = User::where('email', $valid['email'])->first();

        if(Hash::check($valid['password'], $user->password)){
            $apiToken = base64_encode(str::random(40));
            $user->update([
                'api_token' => $apiToken
            ]);
            return response()->json([
                'success' => true,
                'message' => 'Berhasil Login',
                'data' => [
                    'user' => $user,
                    'api_token' => $apiToken
                ]
            ], 201);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Gagal Login',
                'data' => ''
            ]);
        }
    }

    //
}
