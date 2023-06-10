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
    
}
