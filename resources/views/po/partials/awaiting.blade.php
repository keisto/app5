<section class="section">
    <div class="container">
        <h1 class="box-title">
            <span class="icon is-medium"><i class="far fa-thumbs-up fa-lg"></i></span>
            <span>Awaiting Approval</span>
        </h1>
        @foreach ($waitingPos as $po)
            <div class="columns box" id='hover-{{ $po->id }}' class="">
                {{--@endif--}}
                <div class="column is-2 tooltip is-tooltip-top" data-tooltip="Ref # / Status">
                    @include('po.partials.status')
                </div>
                <div class="column is-2 tooltip is-tooltip-top" data-tooltip="Vendor">
                    <p>{{ $po->vendor }}</p>
                </div>
                <div class="column tooltip is-tooltip-top" data-tooltip="Description">
                    <p>{{ $po->description }}</p>
                </div>
                @if($po->client)
                    <div class="column tooltip is-tooltip-top" data-tooltip="Client: {{ $po->client->client }}">
                        <p>{{ $po->client->short }}</p>
                    </div>
                @else
                    <div class="column tooltip is-tooltip-top" data-tooltip="Asset">
                        <p>{{ $po->asset_id}}</p>
                    </div>
                @endif
                <div class="column is-narrow is-hidden-desktop is-hidden-mobile">
                    <p>
                <span class="is-info tooltip is-hoverable" data-tooltip="{{ $po->createdBy->name }}">
                  {{ $po->createdBy->initals }}
                </span>
                    </p>
                </div>
                <div class="column is-narrow is-hidden-tablet-only">
                    <p>{{ $po->createdBy->name }}</p>
                </div>
                <div class="column">
                    @include('po.partials.dropdown')
                </div>
            </div>
        @endforeach
    </div>
</section>