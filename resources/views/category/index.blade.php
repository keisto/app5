@extends('layouts.app')

@section('title')
  Categories
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
    <div class="container box">
      @foreach ($categories as $category)
      <div class="columns is-mobile is-gapless">
        <div class="column is-two-thirds">
          {{ $category->name }}
        </div>
        <div class="column is-one-third">
          {{ $category->active }}
        </div>
      </div>
      @endforeach
    </div>
  </section>

@endsection
