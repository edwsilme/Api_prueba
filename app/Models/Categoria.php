<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;

    //Relación Categoría - Post
    public function posts(){
        return $this->hasMany(Post::class, 'id'); // Una categoria puede tener varios posts
    }
}
