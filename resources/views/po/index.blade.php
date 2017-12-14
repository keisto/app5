@extends('layouts.app')

@section('title')
  Purchase Orders
@endsection

@section('breadcrumb')
  {{ \Carbon\Carbon::now()->format('l - F d') }}
@endsection

@section('content')
  <tabs>
    <tab name="Awaiting Approval" :selected="true">
      @include('po.partials.awaiting')
    </tab>
    <tab name="Billable" href="#billable">
      @include('po.partials.billable')
    </tab>
    <tab name="Non-Billable" href="#non-billable">
      @include('po.partials.nonbillable')
    </tab>
    <tab name="Create" href="{{ url("po/create") }}">
      <section class="section">
        <div class="container">
          <p class="has-text-offwhite has-text-centered">Redirecting...</p>
        </div>
      </section>
    </tab>
  </tabs>
@endsection
