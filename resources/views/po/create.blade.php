@extends('layouts.app')

@section('title')
  Purchase Orders
@endsection

@section('breadcrumb')
  {{ \Carbon\Carbon::now()->format('l - F d') }}
@endsection

@section('content')
    <tabs>
      <tab name="Billable" :selected="true">
        @include('po.form.billable')
      </tab>
      <tab name="Non-Billable">
        @include('po.form.nonbillable')
      </tab>
    </tabs>
@endsection
