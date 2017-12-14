<section class="section">
    <div id="alert-box" class="container box notification is-white border-danger is-fluid is-hidden">
        <div id="ab-employee"></div>
        <div id="ab-truck"></div>
        <div id="ab-trailer"></div>
        <div id="ab-equipment"></div>
    </div>
    <div class="container is-fluid">
        @foreach ($tickets as $data)
            <div id='hover-{{ $data->id }}' class="columns box dispatched_job" style="margin-top:-0.5rem">
                <div class="column is-narrow tooltip is-tooltip-top" data-tooltip="Ticket # / Status">
                    @include('ticket.partials.ticket_status')
                </div>
                <div class="column is-1 tooltip is-tooltip-top" data-tooltip="Start Time">
                    <p><strong>{{ \Carbon\Carbon::parse($data->start)->format('H:iA') }}</strong></p>
                </div>
                <div class="column tooltip is-tooltip-top" data-tooltip="Client: {{ $data->client->client }}">
                    <p>{{ $data->client->short }}</p>
                </div>
                <div class="column is-3 tooltip is-tooltip-top" data-tooltip="Job Task">
                    <p>{{ $data->location }}</p>
                </div>
                <div class="column tooltip is-tooltip-top" data-tooltip="Supervisor">
                    <p>{{ $data->supervisor->name }}</p>
                </div>
                <div class="column is-narrow">
                    <div class="field is-grouped is-pulled-right">
                        <p class="control">
                            <a href="{{ url("dispatch/edit/$data->id") }}" type="button" class="has-text-link">
                                <span class="icon"><i class="fal fa-pencil fa-fw"></i></span>
                            </a>
                        </p>
                        <p class="control">
                            <a href="{{ url("ticket/create/$data->id") }}" type="button" class="has-text-link">
                                <span class="icon"><i class="fal fa-plus-square fa-fw"></i></span>
                            </a>
                        </p>
                        <p class="control">
                        {{--<a href="#" type="button" class="has-text-link">--}}
                        {{--<span class="icon"><i class="fal fa-ellipsis-v"></i></span>--}}
                        {{--</a>--}}
                        <div class="dropdown is-hoverable is-right">
                            <div class="dropdown-trigger">
                                <a class="is-text has-text-link" aria-haspopup="true" aria-controls="dropdown-menu4">
                                    <span class="icon"><i class="fal fa-ellipsis-v fa-fw"></i></span>
                                </a>
                            </div>
                            <div class="dropdown-menu" id="dropdown-menu4" role="menu">
                                <div class="dropdown-content has-text-centered">
                                    <a href="#" class="dropdown-item has-text-link">
                                        <span class="icon"><i class="fal fa-clone"></i></span> Copy
                                    </a>
                                    <a href="#" class="dropdown-item has-text-danger">
                                        <span class="icon"><i class="fal fa-times"></i></span> Delete
                                    </a>
                                </div>
                            </div>
                        </div>
                        </p>
                    </div>
                </div>
            </div>
            {{--Show Dispatch Items --}}
            <div id='show-{{ $data->id }}' class="column-actions">
                @include('ticket.partials.quick_charges', ['items' => $data->charges, 'dispatch' => $data])
            </div>
        @endforeach
    </div>
</section>