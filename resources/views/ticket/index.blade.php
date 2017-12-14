@extends('layouts.app')

@section('title')
    Ticket
@endsection

@section('breadcrumb')
    {{ \Carbon\Carbon::now()->format('l - F d') }}
@endsection

@section('content')
    <tabs>
        <tab name="Incomplete" :selected="true">
            @include('ticket.partials.index.incomplete')
        </tab>
        <tab name="Awaiting Apporval">
            @include('ticket.partials.index.awaiting')
        </tab>
        <tab name="Export">

        </tab>
        <tab name="Print">

        </tab>
    </tabs>

@endsection

@section('footer')
    <script src="{{ asset('js/ticket/index.js') }}"></script>
@endsection