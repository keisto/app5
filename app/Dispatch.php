<?php

namespace App;

use Carbon\Carbon;

class Dispatch extends Model
{
    public function scopeDispatch($query){
        return $query->where('status', '!=', 3); // 3 == deleted
    }

    public function scopeDay($query, $date) {
        return $query->whereDate('start', '=', Carbon::parse($date)->format('Y-m-d'));
    }

    public function scopeGroup($query) {
        return $query->orderByDesc('client_id');
    }

    public function client() {
        return $this->belongsTo('App\Client');
    }
    public function task() {
        return $this->belongsTo('App\Task');
    }

    public function supervisor() {
        return $this->belongsTo('App\User', 'user_id');
    }

  public function item() {
    return $this->hasMany('App\Item')->orderBy('position');
  }

  public function items() {
    return $this->belongsToMany('App\Item')->orderBy('position');
  }

    public function tickets() {
        return $this->belongsToMany('App\Ticket')->orderByDesc('dispatch_id');
    }

  public function pos() {
    return $this->belongsToMany('App\BillablePurchaseOrder', 'dispatch_po');
  }
}
