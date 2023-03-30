<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    protected $fillable = ['capacidad' , 'plataform_id' , 'user_id'];



    //Relacion 1 grupo pertenece a 1 usuario
    public function user(){
        return $this->belongsTo(User::class);
    }


    //Relacion con plataforma , 1 grupo tiene 1 plataforma
    public function plataform(){
        return $this->belongsTo(Plataform::class);
    }



}
