@extends('layouts.app')

@section('title')
    Assets
@endsection

@section('breadcrumb')
    {{ \Carbon\Carbon::now()->format('l - F d') }}
@endsection

@section('content')
    <tabs>
        <tab name="All Assets" selected="true">
            <section class="section">
                <div class="container">
                    <h1 class="box-title">
                        <span class="icon is-medium"><i class="far fa-database fa-lg"></i></span>
                        <span>All Assets</span>
                    </h1>
                    @include('asset.partials.list', ['data' => $assets])
                </div>
            </section>
        </tab>
        <tab name="Employee">
            <section class="section">
                <div class="container">
                    <h1 class="box-title">
                        <span class="icon is-medium"><i class="far fa-users fa-lg"></i></span>
                        <span>Employees</span>
                    </h1>
                    @include('asset.partials.list', ['data' => $employees])
                </div>
            </section>
        </tab>
        <tab name="Truck">
            <section class="section">
                <div class="container">
                    <h1 class="box-title">
                        <span class="icon is-medium"><i class="far fa-truck fa-lg"></i></span>
                        <span>Trucks</span>
                    </h1>
                    @include('asset.partials.list', ['data' => $trucks])
                </div>
            </section>
        </tab>
        <tab name="Trailer">
            <section class="section">
                <div class="container">
                    <h1 class="box-title">
                        <span class="icon is-medium"><i class="far fa-link fa-lg"></i></span>
                        <span>Trailers</span>
                    </h1>
                    @include('asset.partials.list', ['data' => $trailers])
                </div>
            </section>
        </tab>
        <tab name="Equipment">
            <section class="section">
                <div class="container">
                    <h1 class="box-title">
                        <span class="icon is-medium"><i class="far fa-bug fa-lg"></i></span>
                        <span>Equipment</span>
                    </h1>
                    @include('asset.partials.list', ['data' => $equipment])
                </div>
            </section>
        </tab>
        <tab name="Tool">
            <section class="section">
                <div class="container">
                    <h1 class="box-title">
                        <span class="icon is-medium"><i class="far fa-wrench fa-lg"></i></span>
                        <span>Tools</span>
                    </h1>
                    @include('asset.partials.list', ['data' => $tools])
                </div>
            </section>
        </tab>
        <tab name="Safety">
            <section class="section">
                <div class="container">
                    <h1 class="box-title">
                        <span class="icon is-medium"><i class="far fa-medkit fa-lg"></i></span>
                        <span>Safety</span>
                    </h1>
                    @include('asset.partials.list', ['data' => $safety])
                </div>
            </section>
        </tab>
        <tab name="Other">
            <section class="section">
                <div class="container">
                    <h1 class="box-title">
                        <span class="icon is-medium"><i class="far fa-cubes fa-lg"></i></span>
                        <span>Other</span>
                    </h1>
                    @include('asset.partials.list', ['data' => $other])
                </div>
            </section>
        </tab>
        <tab name="Inactive">
            <section class="section">
                <div class="container">
                    <h1 class="box-title">
                        <span class="icon is-medium"><i class="far fa-ban fa-lg"></i></span>
                        <span>Inactive</span>
                    </h1>
                    @include('asset.partials.list', ['data' => $inactive])
                </div>
            </section>
        </tab>
        <tab name="Create" href="{{ url("asset/create") }}">
            <section class="section">
                <div class="container">
                    <p class="has-text-offwhite has-text-centered">Redirecting...</p>
                </div>
            </section>
        </tab>
    </tabs>
@endsection