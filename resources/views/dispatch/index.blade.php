@extends('layouts.app')

@section('title')
  Dispatch - {{ \Carbon\Carbon::parse($day)->format('m/d/y') }}
@endsection

@section('breadcrumb')
  {{ \Carbon\Carbon::parse($day)->format('l - F d') }}
@endsection

{{--@section('tabs')--}}
     {{----}}
{{--@endsection--}}

@section('content')
  @php
    $today = \Carbon\Carbon::now()->format('Y-m-d');
    $prevDay = \Carbon\Carbon::parse($day)->addDays(-1)->format('Y-m-d');
    $nextDay = \Carbon\Carbon::parse($day)->addDays(1)->format('Y-m-d');
    $prevWeek = \Carbon\Carbon::parse($day)->addWeeks(-1)->format('Y-m-d');
    $nextWeek = \Carbon\Carbon::parse($day)->addWeeks(1)->format('Y-m-d');
    $prevMonth = \Carbon\Carbon::parse($day)->addMonths(-1)->format('Y-m-d');
    $nextMonth = \Carbon\Carbon::parse($day)->addMonths(1)->format('Y-m-d');
  @endphp
  <tabs>
      <tab name="View Map">
          @include('dispatch.partials.map')
      </tab>
      <tab name="Day View" :selected="true">
        @include('dispatch.partials.today')
      </tab>
      <tab name="Export">

      </tab>
      <tab name="Print">

      </tab>
  </tabs>

@endsection

@section('footer')
    <script> function dropdownDispatch(e) {
            e.parentElement.className+=" is-active";
        }</script>
  <script src="{{ asset('js/dispatch/index.js') }}"></script>
@endsection
