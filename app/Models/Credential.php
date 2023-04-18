<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Credential extends Model
{


    protected $fillable = ['email' , 'password'];

    use HasFactory;



    //Relacion con Group 1:N
    //1 grupo de credenciales puede estar en muchos grupos
    public function groups(){
        return $this->hasMany(Group::class);
    }


}
