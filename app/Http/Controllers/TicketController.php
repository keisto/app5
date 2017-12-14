<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dispatch;
use Carbon\Carbon;
use App\Charge;
use App\Ticket;

class TicketController extends Controller
{
    public function create($dispatch = null) {
        if($dispatch) {
            //Find and Display dispatch values
            $dispatch = Dispatch::findOrFail($dispatch);
            $items = $dispatch->items;

            $supervisors = \App\User::supervisor()->pluck('name', 'id');
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

            // Select Pickers for each category item
            $selectEmployee = \App\User::employee()->pluck('name', 'id');
            $selectTruck = \App\Truck::active()->pluck('label', 'id');
            $selectTrailer = \App\Trailer::active()->pluck('label', 'id');
            $selectEquipment = \App\Equipment::active()->pluck('label', 'id');
            $selectPO = \App\BillablePurchaseOrder::open()->get();

            // Select Pickers for each category group
            $selectEmployeeAsset = \App\Asset::active()->employee()->pluck('name', 'id');
            $selectEquipmentAsset = \App\Asset::active()->equipment()->pluck('name', 'id');
            $selectTruckAsset = \App\Asset::active()->truck()->pluck('name', 'id');
            $selectPOAsset = \App\BillablePurchaseOrder::open()->pluck('id', 'id');

            return view('ticket.create', compact('supervisors', 'clients', 'contacts',
                'tasks', 'categories', 'trucks', 'trailers', 'equipment', 'assets',
                'employees', 'rates', 'purchaseOrder', 'dispatch', 'items',
                'selectEmployee', 'selectTruck', 'selectTrailer', 'selectEquipment',
                'selectTool', 'selectSafety', 'selectOther', 'selectPO', 'selectEmployeeAsset',
                'selectTruckAsset', 'selectTrailerAsset', 'selectEquipmentAsset', 'safety',
                'selectToolAsset', 'selectSafetyAsset', 'selectOtherAsset', 'selectPOAsset', 'other', 'tools'));
        }

        $supervisors = \App\User::supervisor()->pluck('name', 'id');
        // Combine your default item
        $supervisors = ['-1' => 'Select a Supervisor'] + collect($supervisors)->toArray();

        $clients = \App\Client::active()->pluck('client', 'id');
        // Combine your default item
        $clients = ['-1' => 'Select a Client'] + collect($clients)->toArray();

        $tasks = \App\Task::active()->pluck('name', 'id');
        $tasks = ['-1' => 'Select a Task'] + collect($tasks)->toArray();

        $contacts = \App\Contact::active()->pluck('name', 'id');
        // Combine your default item
        $contacts = ['-1' => 'Select a Contact'] + collect($contacts)->toArray();

        $rates = \App\Rate::with('client', 'asset')->orderBy('asset_id', 'desc')->get();
        $employees = \App\User::employee()->active()->get();
        $categories = \App\Category::active()->get();
        $trucks = \App\Truck::active()->get();
        $trailers = \App\Trailer::active()->get();
        $other = \App\Asset::active()->other()->get();
        $safety = \App\Asset::active()->safety()->get();
        $tools = \App\Asset::active()->tool()->get();
        $equipment = \App\Equipment::active()->get();
        $assets = \App\Asset::active()->get();
        $purchaseOrder = \App\BillablePurchaseOrder::open()->get();

        return view('ticket.create', compact('supervisors', 'clients', 'contacts',
            'tasks', 'categories', 'trucks', 'trailers', 'equipment', 'assets',
            'employees', 'rates', 'purchaseOrder', 'dispatch', 'other', 'tools', 'safety'));

    }

    public function store()
    {
        $date       = Carbon::parse(request('start'))->format('Y-m-d');
        $starttime  = Carbon::parse(request('start'))->format($date .' '. 'H:i:s');
        $arrivetime = Carbon::parse(request('arrive'))->format($date .' '. 'H:i:s');
        $departtime = Carbon::parse(request('depart'))->format($date .' '. 'H:i:s');

        $stoptime   = Carbon::parse(request('stop'))->format($date .' '. 'H:i:s');

        if($stoptime == Carbon::now()->startOfDay()) {
            $addDay   = Carbon::parse($date)->addDays(1)->format('Y-m-d');
            $stoptime = Carbon::parse(request('stop'))->format($addDay .' '. 'H:i:s');
        }

        $ticket = Ticket::create([
            "dispatch_id" => request('dispatch_id'),
            "client_id" => request('client_id'),
            "contact_id" => request('contact_id'),
            "user_id" => request('user_id'),
            "work_order" => request('work_order'),
            "location" => request('location'),
            "description" => request('description'),
            "type" => request('type'),
            "start" => $starttime,
            "arrive" => $arrivetime,
            "depart" => $departtime,
            "stop" => $stoptime,
        ]);

        $position = request('position_id');
        $category = request('category_id');
        $asset = request('asset_id');
        $ref = request('ref_id');
        $quantity = request('quantity');
        for ($i=0; $i < count($ref); $i++) {
            $charge = "";
            switch ($category[$i]) {
                case (1):
                    //Employee
                    $user = \App\User::findOrFail($ref[$i]);
                    if ($user) {
                        $charge = Charge::create([
                            "position" => $position[$i],
                            "category_id" => $category[$i],
                            "asset_id" => $asset[$i],
                            "ref_id" => $ref[$i],
                            "quantity" => $quantity[$i]
                        ]);

                        // Create Timecard Entry
                        \App\Timecard::create([
                            "user_id" => $user->id,
                            "ticket_id" => $ticket->id,
                            "asset_id" => $asset[$i],
                            "hours" => $quantity[$i],
                            "start" => $ticket->start,
                            "stop" => $ticket->stop,
                        ]);
                    }
                    break;
                case (2):
                    //Truck
                    $charge = Charge::create([
                        "position" => $position[$i],
                        "category_id" => $category[$i],
                        "asset_id" => $asset[$i],
                        "ref_id" => $ref[$i],
                        "quantity" => $quantity[$i]
                    ]);
                    break;
                case (3):
                    //Trailer
                    $charge = Charge::create([
                        "position" => $position[$i],
                        "category_id" => $category[$i],
                        "asset_id" => $asset[$i],
                        "ref_id" => $ref[$i],
                        "quantity" => $quantity[$i]
                    ]);
                    break;
                case (4):
                    //Equipment
                    $charge = Charge::create([
                        "position" => $position[$i],
                        "category_id" => $category[$i],
                        "asset_id" => $asset[$i],
                        "ref_id" => $ref[$i],
                        "quantity" => $quantity[$i]
                    ]);
                    break;
                case (5):
                    //Tool
                    $charge = Charge::create([
                        "position" => $position[$i],
                        "category_id" => $category[$i],
                        "asset_id" => $asset[$i],
                        "ref_id" => $ref[$i],
                        "quantity" => $quantity[$i]
                    ]);
                    break;
                case (6):
                    //Safety
                    $charge = Charge::create([
                        "position" => $position[$i],
                        "category_id" => $category[$i],
                        "asset_id" => $asset[$i],
                        "ref_id" => $ref[$i],
                        "quantity" => $quantity[$i]
                    ]);
                    break;
                case (7):
                    //Purchase Order
                    $charge = Charge::create([
                        "position" => $position[$i],
                        "category_id" => $category[$i],
                        "asset_id" => 0,
                        "ref_id" => $ref[$i],
                        "quantity" => $quantity[$i]
                    ]);
                    break;
                case (8):
                    //Other
                    $charge = Charge::create([
                        "position" => $position[$i],
                        "category_id" => $category[$i],
                        "asset_id" => $asset[$i],
                        "ref_id" => $ref[$i],
                        "quantity" => $quantity[$i]
                    ]);
                    break;
            }
            $ticket->charges()->attach($charge);
        }

//        dd($ticket->charges);

        $dispatch = \App\Dispatch::find(request('dispatch_id'));
        if ($dispatch) {
            $dispatch->tickets()->attach($ticket);
        }



        //$default = Carbon::parse(request('start'))->format('l m/d/Y H:i');
        //$date = Carbon::parse($default)->format('Y-m-d');

        //return view('ticket.index');
    }

    public function index()
    {
        $tickets = \App\Ticket::all();
        $supervisors = \App\User::supervisor()->pluck('name', 'id');
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

        // Select Pickers for each category item
        $selectEmployee = \App\User::employee()->pluck('name', 'id');
        $selectTruck = \App\Truck::active()->pluck('label', 'id');
        $selectTrailer = \App\Trailer::active()->pluck('label', 'id');
        $selectEquipment = \App\Equipment::active()->pluck('label', 'id');
        $selectPO = \App\BillablePurchaseOrder::open()->get();

        // Select Pickers for each category group
        $selectEmployeeAsset = \App\Asset::active()->employee()->pluck('name', 'id');
        $selectEquipmentAsset = \App\Asset::active()->equipment()->pluck('name', 'id');
        $selectTruckAsset = \App\Asset::active()->truck()->pluck('name', 'id');
        $selectPOAsset = \App\BillablePurchaseOrder::open()->pluck('id', 'id');
        return view('ticket.index', compact('tickets','supervisors', 'clients', 'contacts',
                'tasks', 'categories', 'trucks', 'trailers', 'equipment', 'assets',
                'employees', 'rates', 'purchaseOrder', 'dispatch', 'items',
                'selectEmployee', 'selectTruck', 'selectTrailer', 'selectEquipment',
                'selectTool', 'selectSafety', 'selectOther', 'selectPO', 'selectEmployeeAsset',
                'selectTruckAsset', 'selectTrailerAsset', 'selectEquipmentAsset', 'safety',
                'selectToolAsset', 'selectSafetyAsset', 'selectOtherAsset', 'selectPOAsset', 'other', 'tools'));
    }

    public function approval()
    {
        \App\Tickets::approval()->get();
        return view('ticket.index', compact('tickets'));

    }
}
