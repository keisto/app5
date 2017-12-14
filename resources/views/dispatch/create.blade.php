@extends('layouts.app')

@section('title')
  Dispatch
@endsection

@section('breadcrumb')
  {{ \Carbon\Carbon::now()->format('l - F d') }}
@endsection

@section('tabs')
  {{-- <div class="hero-foot">
      <nav class="tabs is-boxed">
        <div class="container">
          <ul>
            <li class="is-active"><a href="/po">Overview</a></li>
            <li><a href="/po/billable">Billable</a></li>
            <li><a href="/po/nonbillable">Non-Billable</a></li>
            <li><a href="/po/create">Create</a></li>
          </ul>
        </div>
      </nav>
    </div> --}}
@endsection

@section('content')
  <section class="section">
    <div class="container is-fluid">
        @include('dispatch.partials.create')
    </div>
  </section>

@endsection


@section('footer')

    {{-- // sortable
    stop: function(event, ui) {
      alert("New position: " + ui.item.index());
  } --}}
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
    <script src="{{ asset('js/dispatch/main.js') }}"></script>
    <script src="{{ asset('js/dispatch/employee.js') }}"></script>
    <script src="{{ asset('js/dispatch/equipment.js') }}"></script>
    <script src="{{ asset('js/dispatch/truck.js') }}"></script>
    <script src="{{ asset('js/dispatch/trailer.js') }}"></script>
    <script src="{{ asset('js/dispatch/tool.js') }}"></script>
    <script src="{{ asset('js/dispatch/other.js') }}"></script>
    <script src="{{ asset('js/dispatch/safety.js') }}"></script>
    <script src="{{ asset('js/dispatch/purchase_order.js') }}"></script>
@endsection
