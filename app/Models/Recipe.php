<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    use HasFactory;

    protected $table = 'recipes';
    protected $fillable = ['recipe_api_id', 'label', 'photo_url', 'log_id'];

    public function logs()
    {
        return $this->belongsToMany(Log::class);
    }
}
