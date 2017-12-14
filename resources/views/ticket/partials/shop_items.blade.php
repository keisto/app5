@php
    $counter = 0;
@endphp

@foreach($items as $item)
    @php
        $counter++;
    @endphp
    @if($item->category_id == 1)
    <div class="columns box" id="row-{{$counter}}">
        <div class="column is-3">
            <input id="pos-{{$counter}}" name="position_id[]" value="{{$counter}}" hidden>
            <input id="cat-{{$counter}}" name="category_id[]" value="{{ $item->category_id }}" hidden>
            {{ Form::select('asset_id[]', $selectEmployeeAsset, $item->asset_id, ['id' => 'item-'.$counter, 'placeholder' => 'input']) }}
        </div>
        <div class="column is-3">
            {{ Form::select('ref_id[]', $selectEmployee, $item->ref_id, ['id' => 'sub-'.$counter, 'placeholder' => 'input']) }}
        </div>
        @switch($item->rate($dispatch->client_id))
            @case(1)
            <div class="column is-2">
                <input id="quantity-{{$counter}}" class="input" name="quantity[]" value="" type="number" step=".25" placeholder="Hours"/>
            </div>
            <div class="column is-2">
                <input id="ratetype-{{$counter}}" class="input is-static" name="ratetype[]" value="Hours" readonly="true"/>
            </div>
            @break
            @case(2)
            <div class="column is-2">
                <input id="quantity-{{$counter}}" class="input" name="quantity[]" value="1" placeholder="Daily" type="number"/>
            </div>
            <div class="column is-2">
                <input id="ratetype-{{$counter}}" class="input is-static" name="ratetype[]" value="Daily" readonly="true" />
            </div>
            @break
            @case(3)
            <div class="column is-2">
                <input id="quantity-{{$counter}}" class="input" name="quantity[]" value="" placeholder="Gallons" step=".25" type="number"/>
            </div>
            <div class="column is-2">
                <input id="ratetype-{{$counter}}" class="input is-static" name="ratetype[]" value="Gallons" readonly="true"/>
            </div>
            @break
            @case(4)
            <div class="column is-2">
                <input id="quantity-{{$counter}}" class="input" name="quantity[]" value="" placeholder="Quantity" step=".25" type="number"/>
            </div>
            <div class="column is-2">
                <input id="ratetype-{{$counter}}" class="input is-static" name="ratetype[]" value="Quantity" readonly="true"/>
            </div>
            @break
            @case(5)
            <div class="column is-2 is-hidden">
                <input id="quantity-{{$counter}}" class="input" name="quantity[]" value="1" hidden/>
            </div>
            <div class="column is-2  is-hidden">
                <input id="ratetype-{{$counter}}" class="input is-static" name="ratetype[]" value="PO" readonly="true" hidden/>
            </div>
            @break
        @endswitch
        <div class="column is-2 has-text-centered is-grouped">
            <span class="button is-light"><i class="fas fa-sort"></i></span>
            <button type="button" onclick="removeRow({{$counter}})" class="button is-danger"><i class="fas fa-times"></i></button>
        </div>
    </div>
    @endif
@endforeach
