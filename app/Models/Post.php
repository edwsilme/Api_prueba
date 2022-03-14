<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $table = "post";

    //Relación Post - Categoría
    public function categorias(){
        return $this->belongsTo(Categoria::class, 'id_categoria'); // Un post pertenece a una categoría
    }

    //Relación Post - Comentario
    public function comentarios(){
        return $this->hasMany(Comentario::class, 'id'); // Un post puede tener varios comentarios
    }
}
