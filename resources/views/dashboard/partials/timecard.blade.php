@isset($timecards)
    @php
        $thisWeekHours = 0.00;
        $lastWeekHours = 0.00;
        $loopCount = 0;
    @endphp
        <div class="columns has-text-centered">
            <div class="column column-label is-2"><p class="label">Date</p></div>
            <div class="column column-label is-3"><p class="label">Time frame</p></div>
            <div class="column column-label is-1"><p class="label">Hours</p></div>
            <div class="column column-label is-2"><p class="label">Position</p></div>
            <div class="column column-label is-2"><p class="label">Job Number</p></div>
            <div class="column column-label is-2"><p class="label">Ticket</p></div>
        </div>
        @foreach($thisweek as $day)
            @php
                $loopCount = 0;
            @endphp
            @foreach($timecards as $timecard)
                @if(\Carbon\Carbon::parse($timecard->start)->format('m-d-Y') == \Carbon\Carbon::parse($day)->format('m-d-Y'))
                    @if($loopCount == 0)
                        <div class="columns box is-box-small has-text-centered">
                            <div class="column is-2">
                                <p class="has-text-weight-bold">{{ \Carbon\Carbon::parse($day)->format('l m/d') }}</p>
                            </div>
                    @else
                        <div class="columns is-box-small has-text-centered">
                            <div class="column is-2"></div>
                    @endif
                    <div class="column is-3">
                        @if($timecard->ticket->type == 2)
                            {{-- Drive ticket --}}
                            <p>{{ \Carbon\Carbon::parse($timecard->ticket->start)->format('Hi') }} - {{ \Carbon\Carbon::parse($timecard->ticket->arrive)->format('Hi') }} |
                                {{ \Carbon\Carbon::parse($timecard->ticket->depart)->format('Hi') }} - {{ \Carbon\Carbon::parse($timecard->ticket->stop)->format('Hi') }}</p>
                        @else
                            <p>{{ \Carbon\Carbon::parse($timecard->ticket->start)->format('Hi') }} - {{ \Carbon\Carbon::parse($timecard->ticket->stop)->format('Hi') }}</p>
                        @endif
                    </div>
                    <div class="column is-1">
                        <p>{{ floatval($timecard->hours) }}</p>
                    </div>
                    <div class="column is-2">
                        <p class="label">{{ $timecard->asset->name }}</p>
                    </div>
                    <div class="column is-2">
                        @if($timecard->ticket->type != 3)
                            <p>{{ $timecard->ticket->dispatch_id }}</p>
                        @else
                            <p>Shop</p>
                        @endif
                    </div>
                    <div class="column is-2">
                        @if($timecard->ticket->type == 1)
                            <p>{{ $timecard->ticket->id }}</p>
                        @elseif($timecard->ticket->type == 2)
                            <p><i class="fas fa-truck"></i> {{ $timecard->ticket->id }}</p>
                        @elseif($timecard->ticket->type == 3)
                            <p><i class="fas fa-building"></i> {{ $timecard->ticket->id }}</p>
                        @endif
                    </div>
                    @php
                        $loopCount++;
                        $thisWeekHours+=$timecard->hours;
                    @endphp
                    </div>
                @else
                @endif
            @endforeach
                @if($loopCount == 0)
                    <div class="columns box is-box-small has-text-centered">
                        <div class="column is-2">
                            <p class="has-text-weight-bold">{{ \Carbon\Carbon::parse($day)->format('l m/d') }}</p>
                        </div>
                        <div class="column is-3"></div>
                        <div class="column is-1">
                            <p class="has-text-offwhite">0</p>
                        </div>
                        <div class="column is-2"></div>
                        <div class="column is-2"></div>
                        <div class="column is-2"></div>
                    </div>
                @endif
        @endforeach

        <div class="columns">
            <div class="column">
                <h1 class="box-title is-pulled-left">
                    <span>Total hours <u>This</u> week: <strong>{{ floatval($thisWeekHours) }}</strong></span>
                </h1>
            </div>
            <div class="column is-clearfix">
                <div class="field is-grouped is-pulled-right">
                    <p class="control">
                        <a class="button is-light" href="{{ url("dispatch/show/") }}">
                            <span class="icon"><i class="fas fa-info"></i></span>
                            <span>View More</span>
                        </a>
                    </p>
                    <p class="control">
                        <a class="button is-primary">
                            <span class="icon" href="{{ url("ticket/create/") }}"><i class="fas fa-thumbs-up"></i></span>
                            <span>Approve Timecard</span>
                        </a>
                    </p>
                </div>
            </div>
        </div>
    {{--<div class="container is-fluid">--}}
        {{--<h1 class="box-title"><span class="icon is-medium"><i class="far fa-alarm fa-lg"></i></span><span>Timecard</span></h1>--}}
        {{--<div class="columns has-text-centered">--}}
            {{--<div class="column column-label is-2"><p class="label">Date</p></div>--}}
            {{--<div class="column column-label is-3"><p class="label">Time frame</p></div>--}}
            {{--<div class="column column-label is-1"><p class="label">Hours</p></div>--}}
            {{--<div class="column column-label is-2"><p class="label">Position</p></div>--}}
            {{--<div class="column column-label is-2"><p class="label">Job Number</p></div>--}}
            {{--<div class="column column-label is-2"><p class="label">Ticket</p></div>--}}
        {{--</div>--}}
            {{--@foreach($lastweek as $day)--}}
            {{--<div class="columns box is-box-small has-text-centered">--}}
                {{--@foreach ($timecards as $timecard)--}}

                    {{--@if(\Carbon\Carbon::parse($timecard->start)->format('m-d-Y') == \Carbon\Carbon::parse($day)->format('m-d-Y') )--}}
                        {{--<div class="column is-2">--}}
                            {{--@if($loopCount == 0)--}}
                            {{--<p class="has-text-weight-bold">{{ \Carbon\Carbon::parse($day)->format('l m/d') }}</p>--}}
                            {{--@endif--}}
                        {{--</div>--}}
                        {{--<div class="column is-3">--}}
                            {{--@if($timecard->ticket->type == 2)--}}
                                 {{--Drive ticket--}}
                                {{--<p>{{ \Carbon\Carbon::parse($timecard->ticket->start)->format('Hi') }} - {{ \Carbon\Carbon::parse($timecard->ticket->arrive)->format('Hi') }} |--}}
                                    {{--{{ \Carbon\Carbon::parse($timecard->ticket->depart)->format('Hi') }} - {{ \Carbon\Carbon::parse($timecard->ticket->stop)->format('Hi') }}</p>--}}
                            {{--@else--}}
                                {{--<p>{{ \Carbon\Carbon::parse($timecard->ticket->start)->format('Hi') }} - {{ \Carbon\Carbon::parse($timecard->ticket->stop)->format('Hi') }}</p>--}}
                            {{--@endif--}}
                        {{--</div>--}}
                        {{--<div class="column is-1">--}}
                            {{--<p>{{ floatval($timecard->hours) }}</p>--}}
                        {{--</div>--}}
                        {{--<div class="column is-2">--}}
                            {{--<p class="label">{{ $timecard->asset->name }}</p>--}}
                        {{--</div>--}}
                        {{--<div class="column is-2">--}}
                            {{--@if($timecard->ticket->type != 3)--}}
                                {{--<p>{{ $timecard->ticket->dispatch_id }}</p>--}}
                            {{--@else--}}
                                {{--<p>Shop</p>--}}
                            {{--@endif--}}
                        {{--</div>--}}
                        {{--<div class="column is-2">--}}
                            {{--@if($timecard->ticket->type == 1)--}}
                                {{--<p>{{ $timecard->ticket->id }}</p>--}}
                            {{--@elseif($timecard->ticket->type == 2)--}}
                                {{--<p><i class="fas fa-truck"></i> {{ $timecard->ticket->id }}</p>--}}
                            {{--@elseif($timecard->ticket->type == 3)--}}
                                {{--<p><i class="fas fa-building"></i> {{ $timecard->ticket->id }}</p>--}}
                            {{--@endif--}}
                        {{--</div>--}}
                        {{--@php--}}
                            {{--$loopCount++;--}}
                            {{--$lastWeekHours+=$timecard->hours;--}}
                        {{--@endphp--}}
                    {{--@else--}}
                         {{--<!-- Employee Didn't work -->--}}
                        {{--<div class="column is-2"><p class="has-text-weight-bold">{{ \Carbon\Carbon::parse($day)->format('l m/d') }}</p></div>--}}
                        {{--<div class="column is-3"></div>--}}
                        {{--<div class="column is-1"><p class="has-text-offwhite">0</p></div>--}}
                        {{--<div class="column is-2"></div>--}}
                        {{--<div class="column is-2"></div>--}}
                        {{--<div class="column is-2"></div>--}}
                        {{--@break--}}
                    {{--@endif--}}

                {{--@endforeach--}}
                    {{--</div>--}}
            {{--@endforeach--}}

        {{--<div class="columns">--}}
            {{--<div class="column">--}}
                {{--<h1 class="box-title is-pulled-left">--}}
                    {{--<span>Total hours <u>LAST</u> week: <strong>{{ floatval($lastWeekHours) }}</strong></span>--}}
                {{--</h1>--}}
            {{--</div>--}}
            {{--<div class="column">--}}
                {{--<a class="button is-primary is-pulled-right">Approve Timecard</a>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
@endisset
