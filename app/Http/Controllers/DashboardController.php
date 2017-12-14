<?php

namespace App\Http\Controllers;

use App\Dashboard;
use Illuminate\Http\Request;
use Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = \App\User::find(Auth::user()->id);
        $dispatchHistoryArray = $user->dispatched;

        $dispatched = array();
        foreach ($dispatchHistoryArray as $items) {
            $date = \Carbon\Carbon::now()->hour(0)->minute(0)->second(0)->subday();
            $itemDispatchedArray = $items->dispatch;
            foreach ($itemDispatchedArray as $item) {
                if(\Carbon\Carbon::parse($item->start)->gte($date)) {
                    array_push($dispatched, $item);
                }
            }
        }

        $timeoff = array();
        $timeoffrequests = Auth::user()->timeoff;
        foreach ($timeoffrequests as $request) {
            $date = \Carbon\Carbon::now()->hour(0)->minute(0)->second(0);
            if(\Carbon\Carbon::parse($request->start)->gte($date)) {
                array_push($timeoff, $request);
            }
        }

        $pos = Auth::user()->pos;
        $timecards = Auth::user()->timecards;
        $thisweek = array();
        $lastweek = array();
        for($i=0; $i<7; $i++) {
            array_push($thisweek, \Carbon\Carbon::now()->parse('last sunday')->addDay($i)->format('D m/d/Y'));
        }
        for($i=0; $i<7; $i++) {
            array_push($lastweek, \Carbon\Carbon::now()->parse('last sunday')->subDays(7)->addDay($i)->format('D m/d/Y'));
        }
        return view('dashboard', compact('timeoff', 'dispatched', 'pos', 'timecards', 'thisweek', 'lastweek'));
    }
}
