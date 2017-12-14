<?php

namespace App;

class Trailer extends Model
{
    public function scopeActive($query){
      return $query->where('active', '=', 1);
    }


}
