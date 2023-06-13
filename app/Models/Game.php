<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function collections()
    {
        return $this->belongsToMany(Image::class);
    }

    public function platforms()
    {
        return $this->belongsToMany(Platform::class);
    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }

    public static function search($request)
    {
        $games = Game::with(['categories','platforms']);
        
        if ($request->has('startYear') || $request->has('endYear')) {
            $min = $request->startYear ?? 0;
            $max = $request->endYear ?? 3000;
            $games->whereBetween('year', [$min, $max]);
        }

        if ($request->has('minScore') || $request->has('maxScore')) {
            $min = $request->minScore ?? 0;
            $max = $request->maxScore ?? 100;
            $games->whereBetween('score', [$min, $max]);
        }

        return $games;
    }
    
}
