<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BillablePurchaseOrder;
use App\NonBillablePurchaseOrder;
use Auth;

class PurchaseOrderController extends Controller
{
    protected $dates = array('begin_date', 'end_date');

    public function index()
    {
        $bill = BillablePurchaseOrder::waiting()->get();
        $non = NonBillablePurchaseOrder::waiting()->get();
        $waitingPos = $bill->merge($non)->sortByDesc('created_at');
        $billablePos = BillablePurchaseOrder::latest()->get();
        $openPos = BillablePurchaseOrder::open()->latest()->get();
        $nonbillablePos = NonBillablePurchaseOrder::latest()->get();
        return view('po.index', compact('waitingPos', 'allPos', 'openPos', 'billablePos', 'nonbillablePos'));
    }

//    public function billable()
//    {
////      $waitingPos = BillablePurchaseOrder::waiting()->latest()->get();
//        $bill = BillablePurchaseOrder::waiting()->get();
//        $non = NonBillablePurchaseOrder::waiting()->get();
////
//        $waitingPos = $bill->merge($non)->sortByDesc('created_at');
//      $billablePos = BillablePurchaseOrder::latest()->get();
//      $openPos = BillablePurchaseOrder::open()->latest()->get();
//      $nonbillablePos = NonBillablePurchaseOrder::latest()->get();
//      return view('po.billable', compact('waitingPos', 'allPos', 'openPos', 'billablePos', 'nonbillablePos'));
//    }
//    public function nonbillable()
//    {
//      $waitingPos = NonBillablePurchaseOrder::waiting()->latest()->get();
//      $allPos = NonBillablePurchaseOrder::latest()->get();
//      $openPos = NonBillablePurchaseOrder::open()->latest()->get();
//      return view('po.nonbillable', compact('waitingPos', 'allPos', 'openPos'));
//    }
    public function show($id)
    {
        $po = BillablePurchaseOrder::find($id);
        dd($po->dispatched);
    }
    public function create()
    {
      $clients = \App\Client::active()->pluck('client', 'id');
      $employees = \App\User::active()->pluck('name', 'id');
      $trucks = \App\Truck::active()->pluck('label', 'id');
      $trailers = \App\Trailer::active()->pluck('label', 'id');
      $equipment = \App\Equipment::active()->pluck('label', 'id');
      $other = ['0' => 'Other'];
      $assets = $employees->merge($employees)->merge($trucks)->merge($trailers)->merge($equipment)->merge($other);
      // Combine your default item

//        collect($assets)->toArray();

      return view('po.create', compact('assets', 'clients', 'employees'));
    }
    public function store()
    {
      // dd(request());
      if(request('type')==1) {
        // 1 == billable
        $po = BillablePurchaseOrder::create([
        'vendor' => request('vendor'),
        'description' => request('description'),
        'user_id' => request('user_id'),
        'created_by' => Auth::user()->id,
        'bill_to' => request('bill_to'),
        'begin_date' => request('begin_date'),
        'end_date' => request('end_date'),
        ]);
      } else {
        // 0 == nonbillable
        $po = NonBillablePurchaseOrder::create([
        'vendor' => request('vendor'),
        'description' => request('description'),
        'user_id' => request('user_id'),
        'created_by' => Auth::user()->id,
        'asset_id' => request('asset_id'),
        'cost' => request('cost'),
        'other' => request('other'),
        ]);
      }
      session()->flash('message', $po->id . ' was created.');

      return redirect('/po');
    }
    public function update()
    {
      # code...
    }

    public function destroy($id)
    {
      if(request('type')==1) {
        $po = BillablePurchaseOrder::find($id);
        if($po->status == 0) {
    			$po->delete();
          session()->flash('message', $po->id . ' was pernamently DELETED.');
    		} elseif ($po->status != 0) {
          $po->status = 0;
    			$po->save();
          session()->flash('message', $po->id . ' was marked VOIDED.');
        }
        return redirect()->back();
      } else {
        $po = NonBillablePurchaseOrder::find($id);
        if($po->status == 0) {
    			$po->delete();
          session()->flash('message', $po->id . ' was pernamently DELETED.');
    		} elseif ($po->status != 0) {
          $po->status = 0;
    			$po->save();
          session()->flash('message', $po->id . ' was marked VOIDED.');
        }


        return redirect()->back();
      }
    }
}
