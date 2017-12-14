<?php

namespace App;


class Rate extends Model
{
  public function scopeActive($query){
    return $query->where('active', '=', 1);
  }

  public function scopeRate($query, $client_id) {
    return $query->where('rate_type', '=', $client_id);
  }

  public function client() {
    return $this->belongsTo('App\Client');
  }

  public function asset() {
    return $this->belongsTo('App\Asset');
  }

    public function category() {
        return $this->belongsTo('App\Category');
    }
}
