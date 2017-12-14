<?php

namespace App;

class Item extends Model
{
    public function asset() {
        return $this->belongsTo('App\Asset', 'asset_id');
    }

    public function rate($client_id) {
        if($this->asset_id == 0) {
            // Not an asset === must be a PO
            return 5;
        } else {
            $rate = \App\Rate::where('client_id', '=', $client_id)->where('asset_id', '=', $this->asset_id)->limit(1)->get();
            return $rate->first()->type;
        }
    }

    public function dispatch() {
      return $this->belongsToMany('App\Dispatch', 'dispatch_item')->where('status', "=", "0");
    }


    // Employee == 1
    // Truck == 2
    // Trailer == 3
    // Equipment == 4
    // Tool == 5
    // Safety == 6
    // Purchase Order == 7
    // Other == 8

    public function reference() {
        switch ($this->category_id) {
            case 1:
                return $this->belongsTo('App\User', 'ref_id');
                break;
            case 2:
                return $this->belongsTo('App\Truck', 'ref_id');
                break;
            case 3:
                return $this->belongsTo('App\Trailer', 'ref_id');
                break;
            case 4:
                return $this->belongsTo('App\Equipment', 'ref_id');
                break;
            case 5:
                return $this->belongsTo('App\Tool', 'ref_id');
                break;
            case 6:
                return $this->belongsTo('App\Safety', 'ref_id');
                break;
            case 7:
                return $this->belongsTo('App\BillablePurchaseOrder', 'ref_id');
                break;
            case 8:
                return $this->belongsTo('App\Other', 'ref_id');
                break;
            default:
                return 'Not found.';
                break;
        }

    }
}
