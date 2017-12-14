<?php

namespace App;

class Task extends Model
{
  public function scopeActive($query){
    return $query->where('active', '=', 1);
  }
}
