<?php

namespace App;

class Timecard extends Model
{
    public function ticket() {
        return $this->belongsTo('App\Ticket');
    }
    public function asset() {
        return $this->belongsTo('App\Asset');
    }
}
