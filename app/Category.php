<?php

namespace App;

class Category extends Model
{
  public function scopeActive($query){
    return $query->where('active', '=', 1);
  }
}
