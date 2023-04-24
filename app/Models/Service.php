<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = ['nombre' , 'url_service' , 'url_offer' , 'category_id' , 'created_at'];

    public $updated_at = false;



    //Relacion con category 1:1
    public function category(){
        return $this->belongsTo(Category::class);
    }

}
