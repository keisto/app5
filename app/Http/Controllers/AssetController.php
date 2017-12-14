<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;
use App\Rate;
use App\Asset;

class AssetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $rates = Rate::with('client', 'asset')->orderBy('asset_id', 'desc')->get();
        $clients = Client::with('rate')->get();
        $assets = Asset::active()->get();
        $inactive = Asset::inactive()->get();
        $employees = Asset::active()->employee()->get();
        $trucks = Asset::active()->truck()->get();
        $trailers = Asset::active()->trailer()->get();
        $equipment = Asset::active()->equipment()->get();
        $tools = Asset::active()->tool()->get();
        $safety = Asset::active()->safety()->get();
        $other = Asset::active()->other()->get();
        return view('asset.index', compact('rates', 'assets', 'clients', 'employees', 'trucks',
            'trailers', 'equipment', 'tools', 'other', 'safety', 'inactive'));
    }
    public function create() {
        $clients = Client::active()->get();
        $categories = \App\Category::active()->pluck('name', 'id');
        return view('asset.create', compact('clients', 'categories'));
    }

    public function show(Asset $asset) {
        return view('asset.show',  compact('asset'));
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
        return redirect('asset.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
