<?php

namespace App;
use App\User;
use Laravel\Scout\Searchable;

class NonBillablePurchaseOrder extends Model
{
  use Searchable;
    protected $table = 'nonbillable_purchase_orders';

    public function scopeOpen($query)
    {
      return $query->where('status', '=', 2);
    }

    // public function scopeBillable($query)
    // {
    //   return $query->where('type', '=', 1);
    // }
    //
    // public function scopeNonbillable($query)
    // {
    //   return $query->where('type', '=', 0);
    // }

    public function scopeWaiting($query)
    {
      return $query->where('status', '=', 1);
    }

    public function scopeLatest($query)
    {
      return $query->orderByDesc('id');
    }


    public function user()
    {
       return $this->belongsTo(User::class);
    }

    public function createdBy()
    {
       return $this->belongsTo(User::class, 'created_by');
    }
}
