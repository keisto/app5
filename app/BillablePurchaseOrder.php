<?php

namespace App;
use App\User;
use Laravel\Scout\Searchable;

class BillablePurchaseOrder extends Model
{
  use Searchable;
    protected $table = 'billable_purchase_orders';

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

   public function client()
   {
      return $this->belongsTo(Client::class, 'bill_to');
   }

    public function createdBy()
    {
       return $this->belongsTo(User::class, 'created_by');
    }

    public function dispatched()
    {
       return $this->belongsToMany(Dispatch::class, 'dispatch_po');
    }
}
