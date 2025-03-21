<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use Illuminate\Http\Request;

class AdController extends Controller
{
    public function index()
    {
        return response()->json(Ad::all());
    }

    public function show($id)
    {
        return response()->json(Ad::findOrFail($id));
    }

    public function store(Request $request)
    {
        $ad = Ad::create($request->all());
        return response()->json($ad, 201);
    }

    public function update(Request $request, $id)
    {
        $ad = Ad::findOrFail($id);
        $ad->update($request->all());
        return response()->json($ad);
    }

    public function destroy($id)
    {
        Ad::destroy($id);
        return response()->json(['message' => 'Annuncio eliminato']);
    }
}
