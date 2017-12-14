@extends('layouts.app')

@section('title')
    Dashboard
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
        <div class="container is-fluid">
        <h1 class="box-title">
            <span class="icon is-medium"><i class="far fa-bell fa-lg"></i></span>
            <span>Notification(s)</span>
        </h1>
        {{--@include('dashboard.partials.notifications')--}}
        @include('dashboard.partials.pos')
        @include('dashboard.partials.dispatch')
        @include('dashboard.partials.timeoff')
        {{-- @include('dashboard.partials.maintenance') --}}
        {{-- @include('dashboard.partials.tool') --}}
        </div>
    </section>
    <section class="section">
        <div class="container is-fluid">
            <h1 class="box-title">
                <span class="icon is-medium"><i class="far fa-alarm-clock fa-lg"></i></span>
                <span>Timecard</span>
            </h1>
            @include('dashboard.partials.timecard')
        </div>
    </section>

{{--<section class="section">--}}
    {{--<div class="container">--}}
        {{--<div class="notification is-white is-paddingless">--}}
            {{--<div class="panel">--}}
                {{--<p class="panel-heading">Requests</p>--}}
                {{--<a class="panel-block">--}}
                    {{--<span class="icon"><i class="fas fa-wrench"></i></span>--}}
                    {{--<span class="badge is-badge-primary" data-badge="{{ count($timeoff) }}">--}}
                        {{--Maintenance--}}
                    {{--</span>--}}
                {{--</a>--}}
                {{--<a class="panel-block">--}}
                    {{--<span class="icon"><i class="fas fa-calendar-times"></i></span>--}}
                    {{--<span class="badge is-badge-primary" data-badge="{{ count($timeoff) }}">--}}
                        {{--Time Off--}}
                    {{--</span>--}}
                {{--</a>--}}
                {{--<a class="panel-block">--}}
                    {{--<span class="icon"><i class="fas fa-briefcase"></i></span>--}}
                    {{--<span class="badge is-badge-primary" data-badge="{{ count($timeoff) }}">--}}
                        {{--Tools--}}
                    {{--</span>--}}
                {{--</a>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</section>--}}
@endsection

@section('footer')
@endsection
