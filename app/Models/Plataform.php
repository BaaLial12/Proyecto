<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plataform extends Model
{
    use HasFactory;


    protected $fillable = ['nombre' , 'logo' , 'capacidad' , 'suscripcion' , 'descripcion' , 'category_id'];



    //Relacion con categories
    // 1 plataforma tiene 1 categoria

    public function category(){
        return $this->belongsTo(Category::class);
    }


    //Relacion con grupos
    // 1 plataforma puede estar en muchos grupos

    public function groups(){
        return $this->hasMany(Group::class);
    }

}
