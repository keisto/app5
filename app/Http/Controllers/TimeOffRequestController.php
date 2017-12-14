<?php

namespace App\Http\Controllers;

use App\TimeOffRequest;
use Illuminate\Http\Request;
use Auth;

class TimeOffRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('timeoff.create');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('timeoff.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        TimeOffRequest::create([
            'reason' => request('reason'),
            'start' => \Carbon\Carbon::parse(request('start')),
            'stop' => \Carbon\Carbon::parse(request('stop')),
            'user_id' =>  Auth::user()->id,
        ]);

        session()->flash('message', 'Your time off request was sent for approval.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TimeOffRequest  $timeOffRequest
     * @return \Illuminate\Http\Response
     */
    public function show(TimeOffRequest $timeOffRequest)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TimeOffRequest  $timeOffRequest
     * @return \Illuminate\Http\Response
     */
    public function edit(TimeOffRequest $timeOffRequest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TimeOffReque1st  $timeOffRequest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TimeOffRequest $timeOffRequest)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TimeOffRequest  $timeOffRequest
     * @return \Illuminate\Http\Response
     */
    public function destroy(TimeOffRequest $timeOffRequest)
    {
        //
    }
}

