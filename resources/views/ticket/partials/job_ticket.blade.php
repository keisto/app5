<section class="section">
    <div class="container">
        <h1 class="box-title">
            <span class="icon is-medium"><i class="far fa-ticket-alt fa-lg"></i></span>
            <span>Job Ticket</span>
        </h1>
        {{ Form::open(['url' => '/ticket', 'autocomplete' => 'off']) }}
        <div class="columns is-mobile">
          <div class="column is-one-third">
              {{ Form::hidden('type', 1) }}
              {{ Form::label('client_id', 'Client', ['class' => 'label']) }}
              {{ Form::select('client_id', $clients, $dispatch ? $dispatch->client_id : '', ['id' => 'client_id', 'placeholder' => 'Client']) }}
          </div>
          <div class="column is-one-third">
              {{ Form::label('contact_id', 'Contact', ['class' => 'label']) }}
              {{ Form::select('contact_id', $contacts, $dispatch ? $dispatch->contact_id : '', ['placeholder' => 'Client Contact']) }}
          </div>
          <div class="column is-one-third">
              {{ Form::label('user_id', 'Supervisor', ['class' => 'label']) }}
              {{ Form::select('user_id', $supervisors, $dispatch ? $dispatch->user_id : '', ['placeholder' => 'Supervisor']) }}
          </div>
        </div>
        <div class="columns is-mobile">
            <div class="column is-one-third">
                {{ Form::label('dispatch_id', 'Job Number', ['class' => 'label']) }}
                {{ Form::text('dispatch_id', $dispatch ? $dispatch->id : '', ['placeholder' => 'Job Number', 'class' => 'input']) }}
            </div>
            <div class="column is-one-third">
              {{ Form::label('work_order', 'Work Order', ['class' => 'label']) }}
              {{ Form::text('work_order', $dispatch ? $dispatch->work_order : '', ['placeholder' => 'Work Order', 'class' => 'input']) }}
            </div>
            <div class="column is-one-third">
              {{ Form::label('location', 'Location', ['class' => 'label']) }}
              {{ Form::text('location', $dispatch ? $dispatch->location : '', ['placeholder' => 'Location', 'class' => 'input']) }}
            </div>
        </div>
        <div class="columns is-mobile">
            <div class="column is-one-third">
                {{ Form::label('date', 'Date of Work', ['class' => 'label']) }}
                {{ Form::text('date', $dispatch ? \Carbon\Carbon::parse($dispatch->start)->format('l m/d/Y') : \Carbon\Carbon::now()->format('l m/d/Y') ,
                     ['placeholder' => 'Start Date/Time', 'class' => 'input date', 'type' => 'date']) }}
            </div>
            <div class="column is-one-third">
                @php
                    $round_numerator = 60 * 30; // 60 seconds per minute * 15 minutes equals 900 seconds
                    $time = \Carbon\Carbon::now()->format('U');

                    $stop = date("H:i",(ceil($time / $round_numerator) * $round_numerator ));
                    if ($dispatch) {
                        $start = \Carbon\Carbon::parse($dispatch->start)->format('H:i');
                    } else {
                        $start = "";
                    }
                @endphp
              {{ Form::label('start', 'Start Time', ['class' => 'label']) }}
              {{ Form::text('start', $dispatch ? $start : '', ['placeholder' => 'Start Date/Time', 'class' => 'input starttime', 'id' => 'start']) }}
            </div>
            <div class="column is-one-third">
              {{ Form::label('stop', 'End Time', ['class' => 'label']) }}
              {{ Form::text('stop', $dispatch ? $stop : $stop, ['placeholder' => 'End Date/Time', 'class' => 'input stoptime', 'id' => 'stop']) }}
            </div>
        </div>
        <div class="columns is-centered is-mobile">
            <div class="column">
                {{ Form::label('description', 'Job Description', ['class' => 'label']) }}
                {{ Form::textarea('description', '', ['class' => 'textarea input', 'placeholder' => 'Job Description', 'rows' => '3']) }}
            </div>
        </div>

        @include('dispatch.partials.charges')

        <div id="items" style="margin-bottom:24px">
            {{-- Populate Selection as Needed --}}
            @isset($items)
                @include('ticket.partials.items')
            @endisset
        </div>
        <div class="columns is-clearfix">
            <div class="column">
                <button type="button" class="button is-light is-pulled-left">
                    <span class="icon"><i class="fas fa-times"></i></span>
                    <span>Cancel</span>
                </button>
                <button type="submit" class="button is-primary is-pulled-right">
                    <span class="icon"><i class="fas fa-save"></i></span>
                    <span>Save</span>
                </button>
            </div>
        </div>
        {{ Form::close() }}
    </div>
</section>
