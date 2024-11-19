<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserBalanceRequest;
use App\Models\UserBalance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserBalanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return UserBalance::get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserBalanceRequest $request)
    {
        UserBalance::create([
            'total_value' =>$request -> total_value,
            'currency' => $request -> currency,
            'user_id' => Auth::user()->id,
            'credit_value' => $request->credit_value,
        ]);
        return response()->json(['message' => 'Foydalanuvchi balans yaratildi'],201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserBalanceRequest $request, string $id)
    {
        UserBalance::where('id',$id)
        ->update([
            'total_value' =>$request -> total_value,
            'currency' => $request -> currency,
            'user_id' => Auth::user()->id,
            'credit_value' => $request->credit_value,
        ]);
        return response()->json(['message' => 'Foydalanuvchi balans yangilandi'],200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $balance = UserBalance::find($id);
        $balance->delete();
        return response()->json(['message' => 'delete', "user_balances" => $balance],200);
    }
}
