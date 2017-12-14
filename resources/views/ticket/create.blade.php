@extends('layouts.app')

@section('title')
  Ticket
@endsection

@section('breadcrumb')
  {{ \Carbon\Carbon::now()->format('l - F d') }}
@endsection

@section('content')
    <tabs>
        <tab name="Job Ticket" :selected="true">
            @include('ticket.partials.job_ticket')
        </tab>
        <tab name="Drive Ticket">
            @include('ticket.partials.drive_ticket')
        </tab>
        <tab name="Shop Ticket">
            @include('ticket.partials.shop_ticket')
        </tab>
    </tabs>
@endsection

@section('footer')
    <script>
        $('.starttime').timepicker({
//            'step': 15,
            'timeFormat' : "H:i"
        });
        $('.stoptime').timepicker({
//            'step': 15,
            'timeFormat' : "H:i"
        });

        $('#start').on('change', function () {
            $momentStart = moment($('.date').val() + ' ' + $('#start').val());
            $momentStop = moment($('.date').val() + ' ' + $('#stop').val());
            $momentDiff = moment.duration($momentStop.diff($momentStart)).asHours();
            console.log($momentDiff);
        });
//        $momentStart = moment($('.date').val() + ' ' + $('#start').val());
//        $momentStop = moment($('.date').val() + ' ' + $('#stop').val());
////        moment.duration('1:30').asHours(); will return 1.5
//        console.log($momentStop.diff($momentStart, "hours"));
    </script>

    <script>
        var trucks = {!! $trucks !!};
        var trailers = {!! $trailers !!};
        var equipment = {!! $equipment !!};
        var assets = {!! $assets !!};
        var employees = {!! $employees !!}
        var rates = {!! $rates !!};
        var tools = {!! $tools !!};
        var safety = {!! $safety !!};
        var other = {!! $other !!};
        var purchaseOrder = {!! $purchaseOrder !!};
    </script>

    <script src="{{ asset('js/ticket/main.js') }}"></script>
    <script src="{{ asset('js/ticket/employee.js') }}"></script>
    <script src="{{ asset('js/ticket/equipment.js') }}"></script>
    <script src="{{ asset('js/ticket/truck.js') }}"></script>
    <script src="{{ asset('js/ticket/trailer.js') }}"></script>
    <script src="{{ asset('js/ticket/other.js') }}"></script>
    <script src="{{ asset('js/ticket/safety.js') }}"></script>
    <script src="{{ asset('js/ticket/purchase_order.js') }}"></script>
@endsection
