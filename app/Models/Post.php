<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    //Relación de uno a mcuhos inversa
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function categoria(){
        return $this->belongsTo(Categoria::class);
    }
    //Relación de muchos a muchos
    public function tags(){
        return $this->belongsToMany(Tag::class);
    }
    //Relación uno a uno polimorfica
    public function image(){
        return $this->morphOne(Image::class,'imageable');
    }
}
