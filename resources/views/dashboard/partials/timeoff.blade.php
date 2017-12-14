 @empty(!$timeoff)
  <div class="box is-fluid border-purple">
          <h1 class="subtitle has-text-purple">Time Off</h1>
          @foreach ($timeoff as $request)
              @if($request->status == 1)
                  @if(\Carbon\Carbon::parse($request->start)->isToday())
                      @php
                          $days = \Carbon\Carbon::parse($request->start)->diffInDays(\Carbon\Carbon::parse($request->stop));
                            if($days == 0) {
                                $days = 1;
                            }
                      @endphp
                  <div class="columns">
                      <div class="column">
                      <p>
                          You have some time off starting <strong>today</strong> lasting {{ $days }}
                          @if(\Carbon\Carbon::parse($request->start)->diffInDays(\Carbon\Carbon::parse($request->stop))>1)
                              days.
                          @else
                              day.
                          @endif

                      </p>
                      </div>
                      <div class="column is-narrow is-clearfix">
                          <div class="field is-grouped is-pulled-right">
                              <p class="control">
                                  <a class="button is-small is-light" href="{{ url("timeoff/cancel/$request->id") }}">
                                      <span class="icon"><i class="fas fa-times"></i></span>
                                      <span>Cancel</span>
                                  </a>
                              </p>
                              <p class="control">
                                  <a class="button is-small is-info">
                                      <span class="icon" href="{{ url("timeoff/show/$request->id") }}"><i class="fas fa-pencil"></i></span>
                                      <span>Edit</span>
                                  </a>
                              </p>
                          </div>
                      </div>
                  </div>
                  @else
                      <div class="columns">
                          <div class="column">
                          <p>
                              @php
                                  $days = \Carbon\Carbon::parse($request->start)->diffInDays(\Carbon\Carbon::parse($request->stop));
                                    if($days == 0) {
                                        $days = 1;
                                    }
                              @endphp
                              You have some time off starting in
                              {{ \Carbon\Carbon::parse($request->start)->diffForHumans(null, true) }}
                              on:
                              {{ \Carbon\Carbon::parse($request->start)->format('l F d,Y') }}
                              lasting {{ $days }}
                              @if(\Carbon\Carbon::parse($request->start)->diffInDays(\Carbon\Carbon::parse($request->stop))>1)
                                  days.
                              @else
                                  day.
                              @endif
                          </p>
                          </div>
                          <div class="column is-narrow is-clearfix">
                              <div class="field is-grouped is-pulled-right">
                                  <p class="control">
                                      <a class="button is-small is-light" href="{{ url("timeoff/cancel/$request->id") }}">
                                          <span class="icon"><i class="fas fa-times"></i></span>
                                          <span>Cancel</span>
                                      </a>
                                  </p>
                                  <p class="control">
                                      <a class="button is-small is-purple">
                                          <span class="icon" href="{{ url("timeoff/show/$request->id") }}"><i class="fas fa-pencil"></i></span>
                                          <span>Edit</span>
                                      </a>
                                  </p>
                              </div>
                          </div>
                      </div>
                  @endif
              @endif

          @endforeach
  </div>
@endempty
