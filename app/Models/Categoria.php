<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;
    //Relación de uno a mcuhos
    public function posts(){
        return $this->hasMany(Post::class);
    }
}
