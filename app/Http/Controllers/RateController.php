<?php

namespace App\Http\Controllers;

use App\Rate;
use App\Client;
use App\Asset;
use App\Auth;
use App\Category;

class RateController extends Controller
{
  // public function __construct()	{
  //   // User Must Be Logged in
  //   $this->middleware('auth');
  //
  // }

  public function index() {
    $rates = Rate::with('client', 'asset')->orderBy('asset_id', 'desc')->get();
    $clients = Client::active()->with('rate')->get();
    return view('rate.index', compact('rates', 'assets', 'clients'));
  }
  public function create() {
    $clients = Client::active()->get();
    $categories = \App\Category::active()->pluck('name', 'id');
    $categories = ['-1' => 'Select a Category'] + collect($categories)->toArray();
    return view('rate.create', compact('clients', 'categories'));
  }

  public function show() {
    return view('rate.show');
  }

  public function store() {

    Asset::create([
      'name' => request('name'),
      'category_id' => request('category_id')
    ]);

    $id = Asset::all()->last()->id;

    $labels = explode(', ', request('labels'));
    for ($i=0; $i < count($labels); $i++) {
        switch (request('category_id')) {
            case 2:
              // Truck Numbers
              \App\Truck::create([
                "asset_id" => $id,
                "label" => $labels[$i]
              ]);
              break;
            case 3:
              // Trailer Numbers
              \App\Trailer::create([
                "asset_id" => $id,
                "label" => $labels[$i]
              ]);
              break;
            case 4:
              // Equipment Numbers
              \App\Equipment::create([
                "asset_id" => $id,
                "label" => $labels[$i]
              ]);
              break;

            default:
              break;
        }
    }

        if (request('diff_rate')==1){
            // Use diff rate for each client
            $client = request('client_id');
            $rate = request('client_rate');
            $rateType = request('client_rate_type');
            for ($i=0; $i < count($client); $i++) {
              Rate::create([
                "rate" => $rate[$i],
                "type" => $rateType[$i],
                "category_id" => request('category_id'),
                "client_id" => $client[$i],
                "asset_id" => $id
              ]);
            }
        } else {
            // Use rate for all clients
            $client = Client::all();
            foreach($client as $clients) {
            Rate::create([
              "rate" => request('rate'),
              "type" => request('type'),
              "category_id" => request('category_id'),
              "client_id" => $clients->id,
              "asset_id" => $id
            ]);
        }
    }
    return redirect('rate.index');
  }
}
