<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dispatch;
use App\Item;

class DispatchController extends Controller
{
    protected $dates = array('start', 'stop');

    public function index() {
        $day = \Carbon\Carbon::now()->format('Y-m-d');
        $dispatches = Dispatch::dispatch()->with('items')->day($day)->group()->get();
        return view('dispatch.index', compact('dispatches', 'day'));
    }
    public function create() {
        $supervisors = \App\User::supervisor()->pluck('name', 'id')->toArray();
        $clients = \App\Client::active()->pluck('client', 'id');
        $tasks = \App\Task::active()->pluck('name', 'id');
        $contacts = \App\Contact::active()->pluck('name', 'id');
        $rates = \App\Rate::with('client', 'asset')->orderBy('asset_id', 'desc')->get();
        $employees = \App\User::employee()->active()->get();
        $categories = \App\Category::active()->get();
        $trucks = \App\Truck::active()->get();
        $trailers = \App\Trailer::active()->get();
        $equipment = \App\Equipment::active()->get();
        $assets = \App\Asset::active()->get();
        $other = \App\Asset::active()->other()->get();
        $safety = \App\Asset::active()->safety()->get();
        $tools = \App\Asset::active()->tool()->get();
        $purchaseOrder = \App\BillablePurchaseOrder::open()->get();
        return view('dispatch.create', compact('supervisors', 'clients',
            'contacts', 'tasks', 'categories', 'trucks', 'trailers', 'equipment', 'assets',
            'employees', 'rates', 'purchaseOrder', 'other', 'tools', 'safety'));
    }

  public function show(Dispatch $dispatch) {
    return view('dispatch.show', compact('$dispatch'));
  }

    public function store() {
        $default = \Carbon\Carbon::parse(request('start'))->format('l m/d/Y H:i');
        $datetime = \Carbon\Carbon::parse($default)->format('Y-m-d H:i:s');
        $newJob = Dispatch::create([
            "client_id" => request('client_id'),
            "contact_id" => request('contact_id'),
            "user_id" => request('user_id'),
            "task_id" => request('task_id'),
            "work_order" => request('work_order'),
            "location" => request('location'),
            "start" => $datetime
        ]);

        $position = request('position_id');
        $category = request('category_id');
        $asset = request('asset_id');
        $ref = request('ref_id');
        for ($i=0; $i < count($asset); $i++) {
            if($category[$i]!=7) {
                $item = Item::create([
                    "position" => $position[$i],
                    "category_id" => $category[$i],
                    "asset_id" => $asset[$i],
                    "ref_id" => $ref[$i]
                ]);
                $newJob->items()->attach($item);
            } else {
                $billablePo = \App\BillablePurchaseOrder::findOrFail($ref[$i]);
                if($billablePo) {
                    $item = Item::create([
                        "position" => $position[$i],
                        "category_id" => $category[$i],
                        "asset_id" => 0,
                        "ref_id" => $ref[$i]
                    ]);
                    $newJob->items()->attach($item);
                    $newJob->pos()->attach($billablePo);
                }
            }
        }
        $date = \Carbon\Carbon::parse($default)->format('Y-m-d');
        return redirect('dispatch.date.'.$date);
    }

    public function date($date) {
        $dispatches = Dispatch::dispatch()->day($date)->group()->get();
        $day = $date;
        return view('dispatch.index', compact('dispatches', 'day'));
    }
}
