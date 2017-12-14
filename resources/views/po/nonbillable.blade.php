@extends('layouts.app')

@section('title')
  Purchase Orders
@endsection

@section('breadcrumb')
  {{ \Carbon\Carbon::now()->format('l - F d') }}
@endsection

@section('tabs')
  <div class="hero-foot">
      <nav class="tabs is-boxed">
        <div class="container">
          <ul>
            <li><a href="/po">Overview</a></li>
            <li><a href="/po/billable">Billable</a></li>
            <li class="is-active"><a href="/po/nonbillable">Non-Billable</a></li>
            <li><a href="/po/create">Create</a></li>
          </ul>
        </div>
      </nav>
    </div>
@endsection

@section('content')
  <tabs>
    <tab name="Awaiting Approval" selected="true">
      @foreach ($waitingPos as $po)
      <columns id='hover-{{ $po->id }}'>
        <div title="Ref # / Status" class="is-2">
          <div class="tags has-addons">
            <span class="tag is-light has-text-weight-bold">{{ $po->id }}</span>
            @if ($po->status == 0)
              <span class="tag is-dark has-text-weight-bold">Voided</span>
            @elseif ($po->status == 1)
              <span class="tag is-info has-text-weight-bold">Awaiting</span>
            @elseif ($po->status == 2)
              <span class="tag is-warning has-text-weight-bold">Open</span>
            @elseif ($po->status == 3)
              <span class="tag is-success has-text-weight-bold">Closed</span>
            @endif
          </div>
        </div>
        <div title="Vendor" class="is-2">
          <input class="input is-static" type="text" readonly value="{{ $po->vendor }}">
        </div>
        <div title="Description" class="is-5">
          <input class="input is-static" type="text" readonly value="{{ $po->description }}">
        </div>
        <div title="Client" class="is-2">
          <input class="input is-static" type="text" readonly value="{{ $po->client }}">
        </div>
        <div title="For" class="is-1 is-hidden-mobile">
          <span class="is-info tooltip is-hoverable" data-tooltip="{{ $po->createdBy->name }}">
            <input class="input is-static has-text-centered" type="text" readonly value="{{ $po->createdBy->initals }}">
          </span>
        </div>
        <div title="For" class="is-1 is-mobile-only is-hidden-tablet">
          <input class="input is-static" type="text" readonly value="{{ $po->createdBy->name }}">
        </div>
      </columns>
      <div id='show-{{ $po->id }}' style="display:none">
        <columns>
          <div class="notification">
            @include('po.extra.actions_nonbillable')
          </div>
        </columns>
      </div>

      @endforeach
    </tab>
    <tab name="All Non-Billable">
      @foreach ($allPos as $po)
        <columns id='hover-{{ $po->id }}'>
          <div title="Ref # / Status" class="is-2">
            <div class="tags has-addons">
              <span class="tag is-light has-text-weight-bold">{{ $po->id }}</span>
              @if ($po->status == 0)
                <span class="tag is-dark has-text-weight-bold">Voided</span>
              @elseif ($po->status == 1)
                <span class="tag is-info has-text-weight-bold">Awaiting</span>
              @elseif ($po->status == 2)
                <span class="tag is-warning has-text-weight-bold">Open</span>
              @elseif ($po->status == 3)
                <span class="tag is-success has-text-weight-bold">Closed</span>
              @endif
            </div>
          </div>
          <div title="Vendor" class="is-2">
            <input class="input is-static" type="text" readonly value="{{ $po->vendor }}">
          </div>
          <div title="Description" class="is-5">
            <input class="input is-static" type="text" readonly value="{{ $po->description }}">
          </div>
          <div title="Client" class="is-2">
            <input class="input is-static" type="text" readonly value="{{ $po->client }}">
          </div>
          <div title="For" class="is-1 is-hidden-mobile">
            <span class="is-info tooltip is-hoverable" data-tooltip="{{ $po->createdBy->name }}">
              <input class="input is-static has-text-centered" type="text" readonly value="{{ $po->createdBy->initals }}">
            </span>
          </div>
          <div title="For" class="is-1 is-mobile-only is-hidden-tablet">
            <input class="input is-static" type="text" readonly value="{{ $po->createdBy->name }}">
          </div>
        </columns>
        <div id='show-{{ $po->id }}' style="display:none">
          <columns>
            <div class="notification">
              @include('po.extra.actions_nonbillable')
            </div>
          </columns>
        </div>

      @endforeach
    </tab>
    <tab name="Open">
      @foreach ($openPos as $po)
        <columns id='hover-{{ $po->id }}'>
          <div title="Ref # / Status" class="is-2">
            <div class="tags has-addons">
              <span class="tag is-light has-text-weight-bold">{{ $po->id }}</span>
              @if ($po->status == 0)
                <span class="tag is-dark has-text-weight-bold">Voided</span>
              @elseif ($po->status == 1)
                <span class="tag is-info has-text-weight-bold">Awaiting</span>
              @elseif ($po->status == 2)
                <span class="tag is-warning has-text-weight-bold">Open</span>
              @elseif ($po->status == 3)
                <span class="tag is-success has-text-weight-bold">Closed</span>
              @endif
            </div>
          </div>
          <div title="Vendor" class="is-2">
            <input class="input is-static" type="text" readonly value="{{ $po->vendor }}">
          </div>
          <div title="Description" class="is-5">
            <input class="input is-static" type="text" readonly value="{{ $po->description }}">
          </div>
          <div title="Client" class="is-2">
            <input class="input is-static" type="text" readonly value="{{ $po->client }}">
          </div>
          <div title="For" class="is-1 is-hidden-mobile">
            <span class="is-info tooltip is-hoverable" data-tooltip="{{ $po->createdBy->name }}">
              <input class="input is-static has-text-centered" type="text" readonly value="{{ $po->createdBy->initals }}">
            </span>
          </div>
          <div title="For" class="is-1 is-mobile-only is-hidden-tablet">
            <input class="input is-static" type="text" readonly value="{{ $po->createdBy->name }}">
          </div>
        </columns>
        <div id='show-{{ $po->id }}' style="display:none">
          <columns>
            <div class="notification">
              @include('po.extra.actions_nonbillable')
            </div>
          </columns>
        </div>

      @endforeach
    </tab>
  </tabs>
@endsection
