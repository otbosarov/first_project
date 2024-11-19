<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use PhpParser\Node\Expr\FuncCall;

class UserController extends Controller
{
    public function register(RegisterRequest $request)
    {
        $user = User::create([
            'full_name' => $request->full_name,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
        ]);
        $token = $user->createToken('auth-token')->plainTextToken;
        return response()->json(['message' => 'Foydalanuvchi yaratildi', "token" => $token], 201);
    }
    public function login(LoginRequest $request)
    {
        if (strlen($request->username) == 0 || strlen($request->password) == 0)
            return 'error';

        $user = User::where('username', $request->get('username'))->first();
        if (!$user)
            return response()->json(['message' => 'Login yoki Parol noto\'g\'ri'], 400);
        if (!Hash::check($request->get('password'), $user->password))
            return response()->json(['message' => 'Login yoki Parol noto\'g\'ri'], 400);

        $token = $user->createToken('auth-token')->plainTextToken;
        return ['token' => $token];
    }
    public function update(Request $request, int $id)
    {
        if (Auth::user()->id == $id) {
            $user =  User::where('id', $id)
                ->update([
                    'full_name' => $request->full_name,
                    'password' => Hash::make($request->password),
                    'phone' => $request->phone,
                ]);
            return response()->json(['message' => 'Foydalanuvchi yangilandi ', 'user' => $user], 200);
        } else {
            return "Amaliyot bajarish uchun huquq yo'q";
        }
    }

    public function show(int $id){
        $user = User::find($id);
       if (!$user){
        return response()->json(["message" => "Foydalanuvchi topilmadi"], 404);
       }
       else{
        return $user;
       }
    }
}
