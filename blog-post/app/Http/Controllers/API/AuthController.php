<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class AuthController extends Controller
{

    //GET-ERI
    public function login(Request $request)
    {
        if(!Auth::attempt($request->only('email','password')))
        {
            return response()->json
            ([
                'message' => 'You did not login successfully'
            ], 401);
        }

        $user = User::where('email', $request['email'])->firstOrFail();

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json
        ([
            'message' => 'Salutations ' .$user->name_and_surname. ' and welcome to the amazing world of mechanical engineering!!!', 'access_token' => $token, 'token_type' => 'Bearer',
        ]);
    }

    //POST-ERI
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(),
        [
            'name_and_surname' => 'required|string|max:255',
            'username' => 'required|string|max:255',
            'email' => 'required|string|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);

        if($validator->fails())
        {
            return response()->json($validator->errors());
        }

        $user = User::create
        ([
            'name_and_surname' => $request->name_and_surname,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json
        ([
            'data' => $user,
            'access_token' => $token,
            'token_type' => 'Bearer',
        ]);
    }
}
