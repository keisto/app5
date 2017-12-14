@extends('layouts.app')

@section('title')
  Dashboard
@endsection

@section('breadcrumb')
  {{ \Carbon\Carbon::now()->format('l - F d') }}
@endsection

@section('content')


@endsection
