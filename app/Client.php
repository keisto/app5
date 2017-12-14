<?php

namespace App;
use App\Contact;
class Client extends Model
{
  public function scopeActive($query){
    return $query->where('active', '=', 1);
  }

  public function scopeInactive($query){
    return $query->where('active', '=', 0);
  }

  public function rate() {
    return $this->hasMany('App\Rate');
  }

  public function contact() {
    return $this->hasMany('App\Contact');
  }

  public function po() {
    return $this->hasMany('App\BillablePurchaseOrder');
  }

  public function contacts() {
    return $this->belongsToMany(Contact::class);
  }
}
