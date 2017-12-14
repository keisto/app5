@extends('layouts.app')

@section('title')
  Employees
@endsection

@section('breadcrumb')
  {{ \Carbon\Carbon::now()->format('l - F d') }}
@endsection

@section('content')
  <tabs>
    <tab name="Employees" selected="true">
      @include('user.partials.employees')
    </tab>
    <tab name="Inactive">
      @include('user.partials.inactive', ['users' => $inactive])
    </tab>
    <tab name="Create" href="{{ url("user/create") }}">
      <section class="section">
        <div class="container">
          <p class="has-text-offwhite has-text-centered">Redirecting...</p>
        </div>
      </section>
    </tab>
  </tabs>
@endsection
