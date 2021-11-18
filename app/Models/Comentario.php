<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    use HasFactory;

    public function autor()
    {
        return $this->belongsTo('App\Models\User', 'autor_id', 'id');
    }

    public function post()
    {
        return $this->belongsTo('App\Models\Post', 'autor_id', 'id');
    }
}
