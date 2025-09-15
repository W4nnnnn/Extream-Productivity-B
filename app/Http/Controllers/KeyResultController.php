<?php

namespace App\Http\Controllers;

use App\Models\KeyResult;
use Illuminate\Http\Request;

class KeyResultController extends Controller
{
    public function index()
    {
        return response()->json(KeyResult::all())
            ->header('Access-Control-Allow-Origin', '*')
            ->header('Access-Control-Allow-Methods', 'GET, POST, PUT, PATCH, DELETE, OPTIONS')
            ->header('Access-Control-Allow-Headers', 'Content-Type, Authorization');
    }

    public function show(KeyResult $keyResult)
    {
        return response()->json($keyResult)
            ->header('Access-Control-Allow-Origin', '*')
            ->header('Access-Control-Allow-Methods', 'GET, POST, PUT, PATCH, DELETE, OPTIONS')
            ->header('Access-Control-Allow-Headers', 'Content-Type, Authorization');
    }

    public function store(Request $request)
    {
        $request->validate([
            'objective_id' => 'required|exists:objectives,id',
            'kr' => 'required|string',
            'baseline' => 'required|numeric',
            'target' => 'required|numeric',
            'current' => 'required|numeric',
        ]);

        $keyResult = KeyResult::create($request->all());
        return response()->json($keyResult, 201)
            ->header('Access-Control-Allow-Origin', '*')
            ->header('Access-Control-Allow-Methods', 'GET, POST, PUT, PATCH, DELETE, OPTIONS')
            ->header('Access-Control-Allow-Headers', 'Content-Type, Authorization');
    }

    public function update(Request $request, KeyResult $keyResult)
    {
        $request->validate([
            'objective_id' => 'sometimes|required|exists:objectives,id',
            'kr' => 'sometimes|required|string',
            'baseline' => 'sometimes|required|numeric',
            'target' => 'sometimes|required|numeric',
            'current' => 'sometimes|required|numeric',
        ]);

        $keyResult->update($request->all());
        return response()->json($keyResult)
            ->header('Access-Control-Allow-Origin', '*')
            ->header('Access-Control-Allow-Methods', 'GET, POST, PUT, PATCH, DELETE, OPTIONS')
            ->header('Access-Control-Allow-Headers', 'Content-Type, Authorization');
    }

    public function destroy(KeyResult $keyResult)
    {
        $keyResult->delete();
        return response()->json(null, 204)
            ->header('Access-Control-Allow-Origin', '*')
            ->header('Access-Control-Allow-Methods', 'GET, POST, PUT, PATCH, DELETE, OPTIONS')
            ->header('Access-Control-Allow-Headers', 'Content-Type, Authorization');
    }
}
