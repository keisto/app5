<section class="section">
    <div id="alert-box" class="container box notification is-white border-danger is-fluid is-hidden">
        <div id="ab-employee"></div>
        <div id="ab-truck"></div>
        <div id="ab-trailer"></div>
        <div id="ab-equipment"></div>
    </div>
    @include('dispatch.partials.nav')
    <div class="container is-fluid">
        @foreach ($dispatches as $dispatch)
            <div id='hover-{{ $dispatch->id }}' class="columns box dispatched_job" style="margin-top:-0.5rem">
                <div class="column is-narrow tooltip is-tooltip-top" data-tooltip="Job # / Status">
                    <div class="tags has-addons">
                        <span class="tag is-link has-text-weight-bold">{{ $dispatch->id }}</span>
                        @if ($dispatch->status == 0)
                            <span class="tag is-danger has-text-weight-bold">Incomplete</span>
                        @elseif ($dispatch->status == 1)
                            <span class="tag is-info has-text-weight-bold">Awaiting</span>
                        @elseif ($dispatch->status == 2)
                            <span class="tag is-success has-text-weight-bold">Completed</span>
                        @elseif ($dispatch->status == 3)
                            <span class="tag is-dark has-text-weight-bold">Deleted</span>
                        @endif
                    </div>
                </div>
                <div class="column is-1 tooltip is-tooltip-top" data-tooltip="Start Time">
                    <p><strong>{{ \Carbon\Carbon::parse($dispatch->start)->format('H:iA') }}</strong></p>
                </div>
                {{--<div class="column is-1 tooltip is-tooltip-top" data-tooltip="Start">--}}
                {{--<p>{{ $dispatch->client->short }}</p>--}}
                {{--</div>--}}
                <div class="column tooltip is-tooltip-top" data-tooltip="Client: {{ $dispatch->client->client }}">
                    <p>{{ $dispatch->client->short }}</p>
                </div>
                <div class="column is-3 tooltip is-tooltip-top" data-tooltip="Job Task">
                    <p>{{ $dispatch->task->name }}</p>
                </div>
                <div class="column tooltip is-tooltip-top" data-tooltip="Supervisor">
                    <p>{{ $dispatch->supervisor->name }}</p>
                </div>
                <div class="column is-narrow">
                    <div class="field is-grouped is-pulled-right">
                        <p class="control">
                            <a href="{{ url("dispatch/edit/$dispatch->id") }}" type="button" class="has-text-link">
                                <span class="icon"><i class="fal fa-pencil fa-fw"></i></span>
                            </a>
                        </p>
                        <p class="control">
                            <a href="{{ url("ticket/create/$dispatch->id") }}" type="button" class="has-text-link">
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
                                        <span class="icon"><i class="fal fa-arrows-h"></i></span> Move
                                    </a>
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
            <div id='show-{{ $dispatch->id }}' class="column-actions">
                @include('dispatch.partials.items')
            </div>
        @endforeach
    </div>
    <div>
        @include('dispatch.partials.nav')
    </div>
</section>