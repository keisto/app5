@extends('layouts.app')

@section('title')
    Time Off
@endsection

@section('breadcrumb')
  {{ \Carbon\Carbon::now()->format('l - F d') }}
@endsection

@section('tabs')
  <div class="hero-foot">
    {{-- <nav class="tabs is-boxed">
      <div class="container">
        <ul>
          <li><a href="/po">Overview</a></li>
          <li class="is-active"><a href="/po/billable">Billable</a></li>
          <li><a href="/po/nonbillable">Non-Billable</a></li>
          <li><a href="/po/create">Create</a></li>
        </ul>
      </div>
    </nav> --}}
  </div>
@endsection

@section('content')
  <section class="section">
    <div class="container box is-fluid">
        @include('timeoff.partials.form')
    </div>
  </section>
@endsection

@section('footer')
<script>
    var days = ["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"];

    $(".requestStart").flatpickr({
      minDate: "today",
      maxDate: new Date().fp_incr(400),
      dateFormat: "m/d/Y",
      defaultDate: "today",
      weekNumbers: true,
      onClose: function() {
        $('.requestEnd').val(this.input.value);
        plusDate = new Date($('.requestEnd').val()).fp_incr(1);
        $('.returnDate').val(days[plusDate.getDay()] + " - " + (plusDate.getMonth()+1) + "/" +plusDate.getDate()+ "/" + plusDate.getFullYear());
        },
    });

    $(".requestEnd").flatpickr({
      minDate: "today",
      dafaultDate: "today",
      maxDate: new Date().fp_incr(600),
      dateFormat: "m/d/Y",
      weekNumbers: true,
      onClose: function() {
        plusDate = new Date($('.requestEnd').val()).fp_incr(1);
        $('.returnDate').val(days[plusDate.getDay()] + " - " + (plusDate.getMonth()+1) + "/" +plusDate.getDate()+ "/" + plusDate.getFullYear());
    },
    });
</script>
@endsection
