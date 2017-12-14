@extends('layouts.app')

@section('title')
    Assets
@endsection

@section('breadcrumb')
    {{ \Carbon\Carbon::now()->format('l - F d') }}
@endsection

@section('content')
<section class="section">
    <div class="container is-paddingless">
        <div class="tile is-ancestor">
            <div class="tile is-vertical is-two-thirds is-parent">
                <div class="tile  is-child">
                    <article class="tile is-child box">
                        <p class="title">Wide tile</p>
                        <p class="subtitle">Aligned with the right tile</p>
                        <div class="content">
                            <!-- Content -->
                        </div>
                    </article>
                </div>
                <div class="tile  is-child">
                    <article class="tile is-child box">
                        <p class="title">Wide tile</p>
                        <p class="subtitle">Aligned with the right tile</p>
                        <div class="content">
                            <!-- Content -->
                        </div>
                    </article>
                </div>
            </div>
            <div class="tile">
                <div class="tile is-parent box is-paddingless" style="margin: 0.75rem; overflow: hidden; border-radius: 3px">
                    <iframe frameborder="0" style="border:0; margin-bottom:-6px" width="100%" height="420px"
                            src="https://www.google.com/maps/embed/v1/view?key={{env('GOOGLE_MAP_API')}}&center=42.12345,-102.34556&zoom=18&maptype=satellite"
                            allowfullscreen>
                    </iframe>
                </div>
            </div>
        </div>
    </div>
    </section>
    @endsection