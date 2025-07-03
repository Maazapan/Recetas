<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recipe;

class RecipeController extends Controller
{
    public function index()
    {
        return response()->json(
            Recipe::orderBy('created_at', 'desc')->get()
        );
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|integer',
            'category_id' => 'required|integer',
            'name' => 'required|string',
            'description' => 'required|string',
            'instructions' => 'nullable|string',
            'image' => 'nullable|string',
        ]);

        $recipe = Recipe::create([
            'user_id' => $request->user_id,
            'category_id' => $request->category_id,
            'name' => $request->name,
            'description' => $request->description,
            'instructions' => $request->instructions ?? '',
            'image' => $request->image,
        ]);

        return response()->json($recipe, 201);
    }
}
