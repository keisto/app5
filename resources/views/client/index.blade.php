@extends('layouts.app')

@section('title')
  Clients
@endsection

@section('breadcrumb')
  {{ \Carbon\Carbon::now()->format('l - F d') }}
@endsection

@section('content')
  <tabs>
    <tab name="Clients" :selected="true">
      <section class="section">
        <div class="container">
          <div class="columns is-hidden-touch has-text-centered">
            <div class="column column-label"><p class="label">Client</p></div>
            <div class="column column-label"><p class="label">Phone</p></div>
            <div class="column column-label"><p class="label">Updated</p></div>
            <div class="column column-label is-1"><p class="label">Actions</p></div>
          </div>
          @foreach ($clients as $client)
            <div class="columns box">
              <div class="column">
                <p>{{ $client->client }}</p>
              </div>
              <div class="column">
                <p>{{ $client->phone }}</p>
              </div>
              <div class="column has-text-offwhite">
                <p>{{ \Carbon\Carbon::parse($client->updated_at)->diffForHumans() }}</p>
              </div>
              <div class="column is-narrow">
                <div class="field is-grouped is-pulled-right">
                  <p class="control">
                    <a href="{{ url("client/$client->id/edit") }}" type="button" class="has-text-link">
                      <span class="icon"><i class="fal fa-pencil fa-fw"></i></span>
                    </a>
                  </p>
                  <p class="control">
                    <a href="{{ url("client/$client->id") }}" type="button" class="has-text-danger">
                      <span class="icon"><i class="fal fa-times fa-fw"></i></span>
                    </a>
                  </p>
                </div>
              </div>
            </div>
          @endforeach
        </div>
      </section>
    </tab>
    <tab name="Create" href="{{ url("client/create") }}">
      <section class="section">
        <div class="container">
          <p class="has-text-offwhite has-text-centered">Redirecting...</p>
        </div>
      </section>
    </tab>
  </tabs>
@endsection
