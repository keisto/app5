@foreach ($dispatch->items as $item)
    <div class="columns notification is-paddingless is-marginless" style="top: -10px">
        @if ($item->reference->name)
            <div class="column">
                <input class="category_id" value="{{ $item->category_id }}" hidden>
                <input id="dispatched_item" class="input is-small" value="{{ $item->reference->name }}"/>
            </div>
            <div class="column">
                <input class="input is-small" value="{{ $item->asset->name }}"/>
            </div>
        @elseif ($item->reference->label)
            <div class="column">
                <input class="category_id" value="{{ $item->category_id }}" hidden>
                <input id="dispatched_item" class="input is-small" value="{{ $item->reference->label }}"/>
            </div>
            <div class="column">
                <input class="input is-small" value="{{ $item->asset->name }}"/>
            </div>
        @elseif ($item->category_id == 7)
            <div class="column">
                <input class="category_id" value="{{ $item->category_id }}" hidden>
                <input id="dispatched_item" class="input is-small" value="{{ $item->reference->id }}"/>
            </div>
            <div class="column">
                <input class="input is-small" value="{{ $item->reference->vendor }} - {{ $item->reference->description }}"/>
            </div>
        @endif
    </div>
@endforeach
