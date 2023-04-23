<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;


    protected $fillable = ['group_id' , 'user_id' , 'message' , 'created_at'];

    public $updated_at = false;


    //Relaciones con USER Y GROUP

    //1 mensaje esta asociado a una persona que lo envio
    public function user(){
        return $this->belongsTo(User::class);
    }

    //1 mensaje esta asociado a 1 grupo especifico
    public function group(){
        return $this->belongsTo(Group::class);
    }

}
