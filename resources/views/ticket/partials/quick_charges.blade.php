@php
    $counter = 0;
@endphp
<div class="columns notification is-paddingless is-marginless" style="top: -10px" id="row-{{$counter}}">
    <div class="column">
        <p><span class="has-text-offwhite">Description:</span> {{ $dispatch->description }}</p>
    </div>
</div>
@foreach($items as $item)
    @php
        $counter++;
    @endphp
    <div class="columns notification is-paddingless is-marginless" style="top: -10px" id="row-{{$counter}}">
        <div class="column is-1 has-text-offwhite has-text-right">
            <p>{{ $counter }}</p>
        </div>
        <div class="column is-one-third">
            <input id="pos-{{$counter}}" name="position_id[]" value="{{$counter}}" hidden>
            <input id="cat-{{$counter}}" name="category_id[]" value="{{ $item->category_id }}" hidden>
            @if ($item->category_id != 7)
                <p>{{ $item->asset->name }}</p>
                @else
                <p>{{ $item->po->id }}</p>
            @endif
        </div>
        <div class="column is-one-third">
        @switch($item->category_id)
            @case(1)
                <p>{{ $item->user->name }}</p>
            @break
            @case(2)
                <p>{{ $item->truck->label }}</p>
            @break
            @case(3)
                <p>{{ $item->trailer->label }}</p>
            @break
            @case(4)
                <p>{{ $item->equipment->label }}</p>
            @break
            @case(5)
                <p>{{ $item->asset->name }}</p>
            @break
            @case(6)
                <p>{{ $item->asset->name }}</p>
            @break
            @case(7)
            @php
                $description = "";
                $thisPO = \App\BillablePurchaseOrder::find($item->ref_id);
                if ($thisPO) {
                   $description = $thisPO->vendor . ' - ' . $thisPO->description;
                }
            @endphp
                <p>{{ $description }}</p>
            @break
            @case(8)
                <p>{{ $item->asset->name }}</p>
            @break
        @endswitch
        </div>
        <div class="column is-1 has-text-right">
            <p>{{ $item->quantity }}</p>
        </div>
        <div class="column is-1 has-text-offwhite">
            @switch($item->rate($dispatch->client_id))
                @case(1)
                    <p>Hours</p>
                @break
                @case(2)
                    <p>Days</p>
                @break
                @case(3)
                    <p>Gallons</p>
                @break
                @case(4)
                    <p>Quantity</p>
                @break
                @case(5)
                    <p>PO</p>
                @break
            @endswitch
        </div>
    </div>
@endforeach
