<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Networkfleet\SessionController as NetworkFleet;
use App\Http\Controllers\Networkfleet\AssetsController as FleetAssets;

class TrackerController extends Controller
{
    public function index()
    {
      if(session()->has('networkfleet')) {
//          return view('fleet.index');
        $assets = json_encode(FleetAssets::getAssets());
//        dd($assets);
        return view('fleet.index', compact('assets'));
      } else {
        if (Networkfleet::session()) {
          $assets = FleetAssets::getAssets();
          return view('fleet.index', compact('assets'));
        } else {
          return dd('Something went wrong. Contact your administrator.');
        }
      }
    }


}
