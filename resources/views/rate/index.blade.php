@extends('layouts.app')

@section('title')
  Rates
@endsection

@section('breadcrumb')
  {{ \Carbon\Carbon::now()->format('l - F d') }}
@endsection

@section('content')
  <tabs>
    <tab name="{{ $clients->first()->short }}" selected="true">
      @include('rate.partials.list', ['data' => $clients->first()->rate])
    </tab>
    @foreach($clients as $client)
      @if($client->id != 1)
        <tab name="{{ $client->short }}">
          @include('rate.partials.list', ['data' => $client->rate])
        </tab>
      @endif
    @endforeach
    <tab name="Create" href="{{ url("asset/create") }}">
      <section class="section">
        <div class="container">
          <p class="has-text-offwhite has-text-centered">Redirecting...</p>
        </div>
      </section>
    </tab>
  </tabs>
@endsection