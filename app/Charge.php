<?php

namespace App;

class Charge extends Model
{
    public function rate($client_id) {
        if($this->asset_id == 0) {
            // Not an asset === must be a PO
            return 5;
        } else {
            $rate = \App\Rate::where('client_id', '=', $client_id)->where('asset_id', '=', $this->asset_id)->limit(1)->get();
            return $rate->first()->type;
        }
    }
    public function asset() {
        return $this->belongsTo('\App\Asset');
    }

    public function user() {
        return $this->belongsTo('\App\User', 'ref_id');
    }

    public function truck() {
        return $this->belongsTo('\App\Truck', 'ref_id');
    }

    public function trailer() {
        return $this->belongsTo('\App\Trailer', 'ref_id');
    }

    public function equipment() {
        return $this->belongsTo('\App\Equipment', 'ref_id');
    }

    public function po() {
        return $this->belongsTo('\App\BillablePurchaseOrder', 'ref_id');
    }
}
