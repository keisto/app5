<?php

namespace App;

class Truck extends Model
{
    public function scopeActive($query){
      return $query->where('active', '=', 1);
    }

    // public function types() {
    //   return $this->hasMany('App\Assets');
    // }
}
