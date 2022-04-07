<?php

namespace App\Http\Controllers;

use App\Models\LogRecipe;
use Illuminate\Http\Request;

class LogRecipeController extends Controller
{
    public function createRecipeList(Request $request)
    {
        if (LogRecipe::where('recipe_id', $request->recipe_id)
            ->where('log_id', $request->log_id)->exists()
        ) {
            return response()->json([
                "message" => "Recipe is already in that list!"
            ], 404);
        } else {
            $recipeList = new LogRecipe;
            $recipeList->log_id = $request->log_id;
            $recipeList->recipe_id = $request->recipe_id;
            $recipeList->save();

            return response()->json([
                "message" => "List record has been created"
            ], 200);
        }
    }

    public function deleteRecipeList($id)
    {
        if (LogRecipe::where('id', $id)->exists()) {
            $recipeList = LogRecipe::find($id);
            $recipeList->delete();

            return response()->json([
                "message" => "Recipe list deleted"
            ]);
        } else {
            return response()->json([
                "message" => "Recipe list not found"
            ], 404);
        }
    }
}
