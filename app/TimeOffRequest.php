<?php

namespace App;

class TimeOffRequest extends Model
{
    public function scopeUpcoming($query){
        dd('success');
        // return $query->where('active', '=', 1);
    }
}
