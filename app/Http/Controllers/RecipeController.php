<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recipe;

class RecipeController extends Controller
{
    public function index()
    {
        $recipes = Recipe::all();
        $list = [];

        foreach ($recipes as $data) {
            $object = [
                "id" => $data->id,
                "user_id" => $data->user_id,
                "category" => $data->category->name,
                "name" => $data->name,
                "description" => $data->description,
                "instructions" => $data->instructions,
                "image" => $data->image,
            ];

            array_push($list, $object);
        }
        return response()->json($list, 200);
    }

    public function show($id)
    {
        $recipe = Recipe::find($id);

        if (!$recipe) {
            return response()->json(['message' => 'Recipe not found'], 404);
        }

        $data = [
            "id" => $recipe->id,
            "user_id" => $recipe->user_id,
            "category" => $recipe->category->name,
            "name" => $recipe->name,
            "description" => $recipe->description,
            "instructions" => $recipe->instructions,
            "image" => $recipe->image,
        ];

        return response()->json($data, 200);

    }


    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|integer',
            'name' => 'required|string',
            'description' => 'required|string',
            'instructions' => 'nullable|string',
            'image' => 'nullable|string',
        ]);

        $recipe = Recipe::create([
            'user_id' => $request->user_id,
            'name' => $request->name,
            'description' => $request->description,
            'category_id' => 1,
            'instructions' => $request->instructions ?? '',
            'image' => $request->image ?? '',
        ]);

        return response()->json($recipe, 201);
    }
}
