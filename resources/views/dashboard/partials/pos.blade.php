@empty(!$pos)
    <div class="box is-fluid border-danger">
        <h1 class="subtitle has-text-danger">Purchase Orders</h1>
        @foreach ($pos as $po)
            {{-- status 1 unused \\ 2 == used--}}
            @if($po->status == 0)
                <div class="columns">
                    <div class="column">
                        <p>You have a po <strong>waiting for approval</strong> for a <u>{{ $po->description }}</u> at <u>{{ $po->vendor }}</u></p>
                    </div>
                    <div class="column is-narrow is-clearfix">
                        <div class="field is-grouped is-pulled-right">
                            <p class="control">
                                <a class="button is-small is-light" href="{{ url("") }}">
                                    <span class="icon"><i class="fas fa-times"></i></span>
                                    <span>Void</span>
                                </a>
                            </p>
                        </div>
                    </div>
                </div>
            @elseif($po->status == 1)
                <div class="columns">
                    <div class="column">
                        <p>You have a <strong>unused</strong> po for a <u>{{ $po->description }}</u> at <u>{{ $po->vendor }}</u>. PO #: <strong>{{ $po->id }}</strong></p>
                    </div>
                    <div class="column is-narrow is-clearfix">
                        <div class="field is-grouped is-pulled-right">
                            <p class="control">
                                <a class="button is-small is-light" href="{{ url("") }}">
                                    <span class="icon"><i class="fas fa-times"></i></span>
                                    <span>Void</span>
                                </a>
                            </p>
                            {{--<p class="control">--}}
                                {{--<a class="button is-danger">--}}
                                    {{--<span class="icon" href="{{ url("timeoff/show/$request->id") }}"><i class="fas fa-pencil"></i></span>--}}
                                    {{--<span>Close</span>--}}
                                {{--</a>--}}
                            {{--</p>--}}
                        </div>
                    </div>
                </div>
            @elseif($po->status == 2)
                <div class="columns">
                    <div class="column">
                        <p>You have a po for a <u>{{ $po->description }}</u> at <u>{{ $po->vendor }}</u>. PO #: <strong>{{ $po->id }}</strong></p>
                    </div>
                    <div class="column is-narrow is-clearfix">
                        <div class="field is-grouped is-pulled-right">
                            <p class="control">
                                <a class="button is-small is-danger">
                                    <span class="icon" href="{{ url("") }}"><i class="fas fa-sign-out"></i></span>
                                    <span>Close</span>
                                </a>
                            </p>
                        </div>
                    </div>
                </div>
            @endif


        @endforeach
    </div>
@endempty
