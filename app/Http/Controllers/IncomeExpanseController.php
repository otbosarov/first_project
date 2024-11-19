<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreIncomeExpanceRequest;
use App\Http\Requests\UpdateIncomeExpanceRequest;
use App\Models\IncomeExpanse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IncomeExpanseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return IncomeExpanse::get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreIncomeExpanceRequest $request):mixed
    {
        IncomeExpanse::create([
            'value' => $request->value,
            'currency' => $request->currency /* ?? "UZS" */,
            'type_id' => $request->type_id,
            'comment' => $request->comment,
            'user_id' => Auth::user()->id,
            'datetime' => now(),
        ]);
        return response()->json(['message' => 'yaratildi'],201);
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
    public function update(UpdateIncomeExpanceRequest $request, string $id)
    {
        IncomeExpanse::where('id', $id)
        ->update([
            'value' => $request->value,
            'currency' => $request->currency,
            'type_id' => $request->type_id,
            'comment' => $request->comment,
            'user_id' => Auth::user()->id,
            'datetime' => now(),
        ]);
        return response()->json(['message' => 'yangilandi'],200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
       $income_expanse = IncomeExpanse::find($id);
       $income_expanse->delete();
       return response()->json([
        'message' => 'delete',
        'income_expanse' => $income_expanse
    ],200);
    }
}
