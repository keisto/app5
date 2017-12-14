@extends('layouts.app')

@section('title')
  Tasks
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
      {{ Form::open(['url' => '/task']) }}
      {{-- Form::model($user, ['route' => ['user.update', $user->id]]) --}}
      <div class="columns is-mobile">
        <div class="column is-one-third has-text-centered">
          <br/>
          {{ Form::checkbox('active', true, true, ['id' => 'active', 'class' => 'is-checkbox has-background-color is-primary']) }}
          {{ Form::label('active', 'Active') }}
        </div>
        <div class="column is-two-thirds">
            {{ Form::label('name', 'Job Task', ['class' => 'label']) }}
            {{ Form::text('name', '', ['placeholder' => 'Job Task', 'class' => 'input']) }}
        </div>
      </div>
      <nav class="level is-mobile">
        <div class="level-left">
          <div class="level-item">
             {{ Form::button('<span class="icon"><i class="fas fa-times"></i></span><span>Cancel</span>', ['class' => 'button is-light']) }}
          </div>
        </div>
        <div class="level-rigth">
          <div class="level-item">
            {{ Form::button('<span class="icon"><i class="fas fa-plus"></i></span><span>Post</span>', ['type' => 'submit', 'class' => 'button is-primary is-pulled-right']) }}
          </div>
        </div>
      </nav>
      {{ Form::close() }}
    </div>
  </section>

@endsection
