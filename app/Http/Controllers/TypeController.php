<?php

namespace App\Http\Controllers;

use App\Http\Requests\TypeRequest;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Type::get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TypeRequest $request)
    {
        Type::create([
            'title' => $request->title,
            'user_id' => Auth::user()->id,
        ]);
        return response()->json(['message' => 'Xarajat turi yaratildi'],201);
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
    public function update(TypeRequest $request, string $id)
    {
        Type::where('id', $id)
        ->update([
            'title' => $request->title,
            'user_id' => Auth::user()->id,
        ]);
        return response()->json(['message' => 'Xarajat turi yangilandi'],200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $type = Type::find($id);
        $type->delete();
        return response()->json(['message' => 'delete', 'type' => "$type"],200);
    }
}
