<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    use HasFactory;

    //Relación Comentario - Post
    public function post(){
        return $this->belongsTo(Post::class, 'id_post'); // Un comentario pertenece a un post
    }
}
