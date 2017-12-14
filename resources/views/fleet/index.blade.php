@extends('layouts.app')
@section('header')
    <script src='https://api.mapbox.com/mapbox-gl-js/v0.42.1/mapbox-gl.js'></script>
    <link href='https://api.mapbox.com/mapbox-gl-js/v0.42.1/mapbox-gl.css' rel='stylesheet' />
    <style>
        .mapboxgl-marker {
            height: 16px;
            width: 16px;
            background-color: #ff8280;
            border: 3px solid white;
            border-radius: 50%;
        }
    </style>
@endsection
@section('content')
    <section class="section">
        <div class="container box is-paddingless" style="margin: 0.75rem; overflow: hidden; border-radius: 3px">
            <div id='map' style='width: 100%; height: 300px;'></div>
        </div>
    </section>
          {{--@foreach ($assets as $asset)--}}
                {{--{{ $asset->label }}--}}
                {{--{{ $asset->latitude }}--}}
                {{--{{ $asset->longitude }}--}}
          {{--@endforeach--}}
@endsection
@section('footer')
    <script src="https://maps.googleapis.com/maps/api/js?key={{env('GOOGLE_MAP_API') }}&callback=initMap"
            async defer></script>
    <script   src="https://code.jquery.com/jquery-3.2.1.min.js"   integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="   crossorigin="anonymous"></script>
    <script>
        mapboxgl.accessToken = 'pk.eyJ1Ijoia2Vpc3RvIiwiYSI6ImNpa2l3c2twZTA1NmV1ZG02dDU2dDh0Y3AifQ.IsAoh6-Oygo60Myhyu-eXg';
        var map = new mapboxgl.Map({
            container: 'map',
            center: [-122.420679, 37.772537],
            zoom: 13,
            style: 'mapbox://styles/keisto/cj4oi01dc04362snzbc7v3p8u'
        });
        map.addControl(new mapboxgl.NavigationControl());


        var assets = "{{ $assets }}";
        var roustaboutTrucks = assets.replace(/&quot;/g,'"');
        console.log(roustaboutTrucks);
        for (var i = 0; i < roustaboutTrucks.length; i++) {
            console.log(roustaboutTrucks[i]);
        }
        //     var popup = new mapboxgl.Popup()
        //         .setHTML('<h3>roustaboutTrucks[i].label</h3><p>Roustabout Truck</p>');
        //
        //     var el = document.createElement('div');
        //     console.log(parseFloat(roustaboutTrucks[i].latitude));
        //     var marker = new mapboxgl.Marker(el)
        //         .setLngLat([parseFloat(roustaboutTrucks[i].latitude), parseFloat(roustaboutTrucks[i].longitude)])
        //         .setPopup(popup)
        //         .ad
        // }

        $(document).ready(function() {
            $('div .mapboxgl-ctrl-bottom-left .mapboxgl-ctrl').remove();
            $('div .mapboxgl-ctrl-bottom-right .mapboxgl-ctrl').remove();
        });
    </script>

@endsection
