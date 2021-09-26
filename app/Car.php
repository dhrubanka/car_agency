<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $guarded = [];

    public function orders(){
        return $this->hasMany(Order::class); //select * from subcategories where category_id= 2
    }
}
