<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\LogController;
use App\Http\Controllers\LogRecipeController;
use App\Http\Controllers\RecipeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);

Route::group(['middleware' => 'auth:sanctum'], function () {

    Route::post('logout', [AuthController::class, 'logout']);

    /* RECIPIES */
    Route::get('recipies', [RecipeController::class, 'getAllRecipies']);
    Route::get('recipies/{id}', [RecipeController::class, 'getRecipe']);
    Route::post('recipies', [RecipeController::class, 'createRecipe']);
    Route::put('recipies/{id}', [RecipeController::class, 'updateRecipe']);
    Route::delete('recipies/{id}', [RecipeController::class, 'deleteRecipe']);

    /* LISTS */
    Route::get('lists', [LogController::class, 'getAllLists']);
    Route::get('lists/{id}', [LogController::class, 'getList']);
    Route::post('lists', [LogController::class, 'createList']);
    Route::put('lists/{id}', [LogController::class, 'updateList']);
    Route::delete('lists/{id}', [LogController::class, 'deleteList']);

    /* PIVOT RECIPE_LIST */
    Route::post('recipe-lists', [LogRecipeController::class, 'createRecipeList']);
    Route::delete('recipe-lists/{id}', [LogRecipeController::class, 'deleteRecipeList']);

});