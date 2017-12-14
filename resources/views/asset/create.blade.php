@extends('layouts.app')

@section('title')
    New Asset
@endsection

@section('breadcrumb')
    {{ \Carbon\Carbon::now()->format('l - F d') }}
@endsection


@section('content')
    <section class="section">
        <div class="container">
            <h1 class="box-title">
                <span class="icon is-medium"><i class="far fa-puzzle-piece fa-lg"></i></span>
                <span>Asset and Rate Setup <span class="tag is-success has-text-weight-bold">New</span></span>
            </h1>
            {{ Form::open(['url' => '/asset']) }}
            <div class="columns is-mobile">
                <div class="column is-half">
                    {{ Form::label('name', 'Asset Name', ['class' => 'label']) }}
                    {{ Form::text('name', '', ['placeholder' => 'Asset Name', 'class' => 'input']) }}
                </div>
                <div class="column is-half">
                    {{ Form::label('category_id', 'Asset Category', ['class' => 'label']) }}
                    {{ Form::select('category_id', $categories, '', ['placeholder' => 'Asset Category']) }}
                </div>
            </div>
            <article class="box border-info">
                    <h1 class="subtitle">Are rates the same between clients?</h1>
                    <div class="columns">
                        <div class="column is-one-quarter has-text-centered">
                            {{ Form::checkbox('diff_rate', true, false, ['id' => 'diff_rate',
                                'class' => 'is-checkradio has-background-color is-info center']) }}
                            {{ Form::label('diff_rate', 'Rates Differ') }}
                        </div>
                        <div class="column is-three-quarters">
                            Leaving this "Unchecked" will create the same rate across all clients.
                            "Check" and you can enter <strong>each</strong> rate for
                            <strong>each</strong> client or you can also do this later.
                        </div>
                    </div>
            </article>

            <div class="columns" id="rates_default">
                <div class="column is-half">
                    {{ Form::label('type', 'Rate', ['class' => 'label']) }}
                    {{ Form::select('type', [
                      1 => 'Hourly',
                      2 => 'Daily',
                      3 => 'Gallons',
                      4 => 'Quantity',
                      5 => 'At Cost (Purchase Order)',
                  ], '', ['placeholder' => 'Rate Type']) }}
                </div>
                <div class="column is-half">
                    {{ Form::label('rate', 'Cost', ['class' => 'label']) }}
                    {{ Form::number('rate', '', ['placeholder' => 'Cost', 'class' => 'input', 'step'=> '0.01']) }}
                </div>
            </div>

            <div id="rates_differ" style="display: none; padding-bottom:24px">
                @foreach ($clients as $client)
                    <div class="columns">
                        <div class="column is-one-third">
                            {{ Form::hidden('client_id[]', $client->id) }}
                            {{ Form::label('client_name[]', 'Client', ['class' => 'label']) }}
                            {{ Form::text('client_name[]', $client->client, ['placeholder' => 'Client', 'class' => 'input is-static', 'readonly' => 'true']) }}
                        </div>

                        <div class="column is-one-third">
                            {{ Form::label('client_rate_type[]', 'Rate', ['class' => 'label']) }}
                            {{ Form::select('client_rate_type[]', [
                              1 => 'Hourly',
                              2 => 'Daily',
                              3 => 'Gallons',
                              4 => 'Quantity',
                              5 => 'At Cost (Purchase Order)',
                          ], '', ['placeholder' => 'Rate Type']) }}
                        </div>
                        <div class="column is-one-third">
                            {{ Form::label('client_rate[]', 'Cost', ['class' => 'label']) }}
                            {{ Form::number('client_rate[]', '', ['placeholder' => 'Cost', 'class' => 'input', 'step'=> '0.01']) }}
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="columns" id="add_labels" style="display: none">
                <div class="column is-fullwidth">
                    {{ Form::label('labels', 'Labels', ['id' => 'labels', 'class' => 'label']) }}
                    {{ Form::textarea('labels', '', ['placeholder' => 'Labels', 'class' => 'input']) }}
                </div>
            </div>
            <div class="columns is-clearfix">
                <div class="column">
                    <a href="{{ url('/asset') }}">
                    {{ Form::button('<span class="icon"><i class="fas fa-times"></i></span><span>Cancel</span>', ['class' => 'button is-light is-pulled-left', 'href']) }}
                    </a>
                    {{ Form::button('<span class="icon"><i class="fas fa-save"></i></span><span>Save</span>', ['type' => 'submit', 'class' => 'button is-primary is-pulled-right']) }}
                </div>
            </div>
            {{ Form::close() }}
        </div>
    </section>
@endsection



@section('footer')
    <script>
        $('#category_id').on('change', function () {
            if ($(this).val() == 2 || $(this).val() == 3 || $(this).val() == 4) {
                $('#add_labels').slideDown();

                var labelPlaceholder = "Enter " + $(this).find(":selected").text() + " Labels. Separate with Comma (Ex: 100RT, 101RT, 102RT)";
                $('#labels').html(labelPlaceholder);

            } else {
                $('#add_labels').slideUp();
            }
        });

        $('#diff_rate').click(function () {
            if ($('#diff_rate').is(':checked')) {
                $('#rates_default').slideUp();
                $('#rates_differ').slideDown();
            } else {
                $('#rates_default').slideDown();
                $('#rates_differ').slideUp();
            }
        });

        $('input[type=number]').keyup(function (event) {
// skip for arrow keys
            if (event.which >= 37 && event.which <= 40) {
                event.preventDefault();
            }

            // $(this).val(function (index, value) {
            //     return value
            //         .replace(/\D/g, '')
            //         .replace(/([0-9])([0-9]{2})$/, '$1.$2');
            // });
        });

        $('#labels-area').on('keyup', function () {
            var list = $('#labels-area').val();
            var array = list.split(', ');
            for (var i = 0; i < array.length; i++) {
                console.log(array[i]);
            }

        });
    </script>
@endsection
