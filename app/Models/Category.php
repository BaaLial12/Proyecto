<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['nombre'];



    //Relacion con Plataforma

    //1 categoria puede estar en mas de 1 plataforma

    public function plataforms(){
        return $this->hasMany(Plataform::class);
    }


}
