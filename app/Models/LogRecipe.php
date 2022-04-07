<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogRecipe extends Model
{
    use HasFactory;

    protected $table = 'log_recipe';
    protected $fillable = ['log_id', 'recipe_id'];
}
