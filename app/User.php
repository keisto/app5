<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Crew;
use App\Ticket;
use Laravel\Scout\Searchable;

class User extends Authenticatable
{
    use Notifiable;
    use Searchable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
     protected $fillable = [
         'name', 'email', 'password', 'birthday', 'hired_on', 'phone', 'email',
         'license', 'has_license', 'has_cdl', 'cdl_expire', 'access', 'crew_id'
     ];
     /*
      * The attributes that should be hidden for arrays.
      *
      * @var array
      */
     protected $hidden = [
         'password', 'remember_token',
     ];

     public function crew() {
         return $this->belongsTo(Crew::class);
     }

     public function tickets() {
       return $this->hasMany(Ticket::class);
     }

     public function timeoff() {
       return $this->hasMany('App\TimeOffRequest');
     }

    public function pos() {
        return $this->hasMany('App\BillablePurchaseOrder');
    }

     public function dispatched() {
         $date = \Carbon\Carbon::now()->subDays(2);
       return $this->hasMany('App\Item', 'ref_id')
                    ->where('category_id', "=", 1)
                    ->where('updated_at', '>', $date);

     }

    public function timecards() {
        $date = \Carbon\Carbon::now()->subDays(7);
        return $this->hasMany('App\Timecard')
            ->where('start', '>', $date);

    }

    public function timecardForDay($day) {
        $date = \Carbon\Carbon::parse($day)->addDay(3)->format('Y-m-d');
        return $this->hasMany('App\Timecard')
            ->whereDate('start', $date);

    }

     public function scopeActive($query){
       return $query->where('active', '=', 1);
     }

    public function scopeInactive($query){
        return $query->where('active', '=', 0);
    }

     public function scopeEmployee($query){
       return $query->where('access', '<=', 3);
     }

     public function scopeSupervisor($query){
       return $query->where('access', '=', 3);
     }

     public function scopeShop($query){
       return $query->where('access', '=', 2);
     }

     public function scopeDispatch($query){
       return $query->where('access', '=', 4);
     }

     public function scopeOffice($query){
       return $query->where('access', '=', 5);
     }

     public function scopeManagement($query){
       return $query->where('access', '=', 6);
     }

    public function getInitalsAttribute()
    {
      $iFirst = substr(explode(' ', $this->name)[0], 0, 1);
      $iLast = substr(explode(' ', $this->name)[1], 0, 1);
        return ($iFirst. $iLast);
    }
}
