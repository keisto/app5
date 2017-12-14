@empty(!$dispatched)
    <div class="box notification is-white border-info is-fluid">
        <h1 class="subtitle has-text-info">Dispatch</h1>
        @foreach ($dispatched as $dispatch)
            @if(\Carbon\Carbon::parse($dispatch->start)->format('m-d-Y') == (\Carbon\Carbon::now()->subday()->format('m-d-Y')))
                <div class="columns">
                    <div class="column">
                <p>
                  <strong>Yesterday:</strong>You were dispatched for <strong>{{ $dispatch->client->client }}</strong>
                  at <strong>{{ \Carbon\Carbon::parse($dispatch->start)->format('h:i A') }}</strong>. Job task: {{ $dispatch->task->name }}
                </p>
                    </div>
                    <div class="column is-narrow is-clearfix">
                        <div class="field is-grouped is-pulled-right">
                          <p class="control">
                              <a class="button is-small is-light" href="{{ url("dispatch/show/$dispatch->id") }}">
                                  <span class="icon"><i class="fas fa-info"></i></span>
                                  <span>View Details</span>
                              </a>
                          </p>
                          <p class="control">
                              <a class="button is-small is-info">
                                  <span class="icon" href="{{ url("ticket/create/$dispatch->id") }}"><i class="fas fa-ticket-alt"></i></span>
                                  <span>Create Ticket</span>
                              </a>
                          </p>
                        </div>
                    </div>
                </div>
            @elseif(\Carbon\Carbon::parse($dispatch->start)->isToday())
                <div class="columns">
                    <div class="column">
                <p>
                  <strong>Today:</strong>You are dispatched for <strong>{{ $dispatch->client->client }}</strong>
                  at <strong>{{ \Carbon\Carbon::parse($dispatch->start)->format('h:i A') }}</strong>. Job task: {{ $dispatch->task->name }}
                </p>
                    </div>
                    <div class="column is-narrow is-clearfix">
                <div class="field is-grouped is-pulled-right">
                    <p class="control">
                        <a class="button is-small is-light" href="{{ url("dispatch/show/$dispatch->id") }}">
                          <span class="icon"><i class="fas fa-info"></i></span>
                        <span>View Details</span>
                        </a>
                    </p>
                    <p class="control">
                        <a class="button is-small is-info">
                            <span class="icon" href="{{ url("ticket/create/$dispatch->id") }}"><i class="fas fa-ticket-alt"></i></span>
                            <span>Create Ticket</span>
                        </a>
                    </p>
                </div>
                    </div>
                </div>
            @elseif(\Carbon\Carbon::parse($dispatch->start)->format('m-d-Y') == (\Carbon\Carbon::now()->addday()->format('m-d-Y')))
                <div class="columns">
                    <div class="column">
                        <p>
                        <strong>Tomorrow:</strong>You are dispatched for <strong>{{ $dispatch->client->client }}</strong>
                        on <strong>{{ \Carbon\Carbon::parse($dispatch->start)->format('l m/d/y') }}</strong>
                        at <strong>{{ \Carbon\Carbon::parse($dispatch->start)->format('h:i A') }}</strong>.
                        Job task: {{ $dispatch->task->name }}
                        </p>
                    </div>
                    <div class="column is-narrow is-clearfix">
                        <div class="field is-grouped is-pulled-right">
                            <p class="control">
                                <a class="button is-small is-light" href="{{ url("dispatch/show/$dispatch->id") }}">
                                    <span class="icon"><i class="fas fa-info"></i></span>
                                    <span>View Details</span>
                                </a>
                            </p>
                        </div>
                    </div>
                </div>
            @elseif(\Carbon\Carbon::parse($dispatch->start)->gt(\Carbon\Carbon::now()))
                <div class="columns">
                    <div class="column">
                        <p>
                        <strong>Upcoming:</strong>You are dispatched for
                        <strong>{{ $dispatch->client->client }}</strong>
                        on <strong>{{ \Carbon\Carbon::parse($dispatch->start)->format('l m/d/y') }}</strong>
                        at <strong>{{ \Carbon\Carbon::parse($dispatch->start)->format('h:i A') }}</strong>.
                        Job task: {{ $dispatch->task->name }}
                        </p>
                    </div>
                    <div class="column is-narrow is-clearfix">
                        <div class="field is-grouped is-pulled-right">
                            <p class="control">
                                <a class="button is-small is-light is-dark">
                                    <span class="icon"><i class="fas fa-info"></i></span>
                                    <span>View Details</span>
                                </a>
                            </p>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
    </div>
@endempty
