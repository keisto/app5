<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Titan &#8594; @yield('title')</title>

    <!-- Styles -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,600i" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link href='{{ asset('css/fontawesome-all.min.css') }}' rel='stylesheet' />
    <link href='{{ asset('css/fontawesome.min.css') }}' rel='stylesheet' />
    <link rel="stylesheet" href="{{ asset('css/selectize.css') }}" />

    <link href='{{ asset('css/app.css') }}' rel='stylesheet' />
    <!-- Scripts -->
    <script src="https://unpkg.com/flatpickr"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.19.2/moment.min.js"></script>


    @yield('header')
</head>
<body>
{{--@include('layouts.top-nav')--}}

@include('layouts.side-nav')
    <div id="app">

      {{--@include('layouts.drawer')--}}
      <section class="section no-pad-top-bottom">
          <div class="container is-fluid">
              <div class="columns">
                  <div class="column is-half">
                      <h1 id="page-title" class="title">
                          @yield('title')
                      </h1>
                      <h2 class="subtitle has-text-offwhite">
                          @yield('breadcrumb')
                      </h2>
                  </div>
                  <div class="column is-half has-text-right">
                      <h1 id="page-title" class="title">
                          @yield('title')
                      </h1>
                      <h2 class="subtitle has-text-offwhite">
                          @yield('breadcrumb')
                      </h2>
                  </div>
              </div>
          </div>
      </section>
      @include('layouts.notifications')
      @yield('tabs')
      @yield('content')
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/vue.js') }}"></script>
    <script src="{{ asset('js/selectize.js') }}"></script>
    <script src="{{ asset('js/script.js') }}"></script>
    <script>
      $(".datetime").flatpickr({
        // "plugins": [new rangePlugin({ input: "#secondRangeInput"})],
        enableTime: true,
        minDate: new Date().fp_incr(-3),
        maxDate: new Date().fp_incr(14),
        dateFormat: "l m/d/Y h:i K",
        // defaultDate: "today",
        weekNumbers: true,
        time_24hr: true,
        defaultHour: 6,
        defaultMinute: 0,
        minuteIncrement: 15,
      });

      $(".time").flatpickr({
        enableTime: true,
        noCalendar: true,
        time_24hr: false,
        dateFormat: "h:i K",
        minuteIncrement: 15,
        // onClose: function () {
        //     // $('input[name=start]').change(function () {
        //     //         console.log($(this).val());
        //     //         $date = convertTime12to24($(this).val());
        //     //         $(this).val($date)
        //     //     });
        // }
      });

      $(".date").flatpickr({
        enableTime: false,
        dateFormat: "m/d/Y",
        minDate: new Date().fp_incr(-3),
        maxDate: new Date().fp_incr(2),
        defaultDate: "today",
      });
    //   function convertTime12to24(time12h) {
    //   const [time, modifier] = time12h.split(' ');
    //
    //   let [hours, minutes] = time.split(':');
    //
    //   if (hours === '12') {
    //     hours = '00';
    //   }
    //
    //   if (modifier === 'PM') {
    //     hours = parseInt(hours, 10) + 12;
    //   }
    //
    //   return hours + ':' + minutes;
    // }

          // $('input[name=start]').blur(function () {
          //         console.log($(this).val());
          //         $date = convertTime12to24($(this).val());
          //         $(this).val($date)
          //     });
    </script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    @yield('footer')

</body>
</html>
