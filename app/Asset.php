<?php

namespace App;

class Asset extends Model
{
    public function scopeActive($query){
      return $query->where('active', '=', 1);
    }

    public function scopeInactive($query){
        return $query->where('active', '=', 0);
    }

    public function scopeEmployee($query){
      return $query->where('category_id', '=', 1);
    }

    public function scopeTruck($query){
      return $query->where('category_id', '=', 2);
    }

    public function scopeTrailer($query){
      return $query->where('category_id', '=', 3);
    }

    public function scopeEquipment($query){
      return $query->where('category_id', '=', 4);
    }

    public function scopeTool($query){
      return $query->where('category_id', '=', 5);
    }

    public function scopeSafety($query){
      return $query->where('category_id', '=', 6);
    }

    public function scopePurchaseorder($query){
      return $query->where('category_id', '=', 7);
    }

    public function scopeOther($query){
      return $query->where('category_id', '=', 8);
    }

    public function category() {
        return $this->belongsTo('App\Category', 'category_id');
    }

    public function rates() {
        return $this->belongsToMany('App\Rate');
    }

    public function truck() {
      return $this->belongsTo('App\Truck');
    }

    public function trailer() {
      return $this->belongsTo('App\Trailer', 'asset_id');
    }
}
