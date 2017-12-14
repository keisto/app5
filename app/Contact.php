<?php

namespace App;

class Contact extends Model
{
  public function scopeActive($query){
    return $query->where('active', '=', 1);
  }
}
