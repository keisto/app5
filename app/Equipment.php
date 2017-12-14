<?php

namespace App;


class Equipment extends Model
{
    public function scopeActive($query){
      return $query->where('active', '=', 1);
    }
}
