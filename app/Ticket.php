<?php

namespace App;

class Ticket extends Model
{
    public function charges()
    {
        return $this->belongsToMany('App\Charge')->orderBy('position');
    }

    public function client()
    {
        return $this->belongsTo('App\Client');
    }

    public function supervisor()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function items() {
        return $this->belongsToMany('App\Charge')->orderBy('position');
    }

    public function scopeWaiting($query)
    {
        return $query->where('status', '=', 1);
    }
}
