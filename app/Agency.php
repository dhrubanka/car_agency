<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agency extends Model
{
    protected $guarded = [];

    public function user()
    {
      return $this->morphOne('App\User', 'profile');
    }
}
