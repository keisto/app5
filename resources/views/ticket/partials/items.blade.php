@php
    $counter = 0;
@endphp

@foreach($items as $item)
    @php
        $counter++;
    @endphp
    <div class="columns box" id="row-{{$counter}}">
        <div class="column is-3">
                <input id="pos-{{$counter}}" name="position_id[]" value="{{$counter}}" hidden>
                <input id="cat-{{$counter}}" name="category_id[]" value="{{ $item->category_id }}" hidden>
                @switch($item->category_id)
                    @case(1)
                        {{ Form::select('asset_id[]', $selectEmployeeAsset, $item->asset_id, ['id' => 'item-'.$counter, 'placeholder' => 'input']) }}
                    @break
                    @case(2)
                        {{ Form::select('asset_id[]', $selectTruckAsset, $item->asset_id, ['id' => 'item-'.$counter, 'placeholder' => 'input']) }}
                    @break
                    @case(3)
                        {{ Form::select('asset_id[]', $selectTrailerAsset, $item->asset_idm, ['id' => 'item-'.$counter, 'placeholder' => 'input']) }}
                    @break
                    @case(4)
                        {{ Form::select('asset_id[]', $selectEquipmentAsset, $item->asset_id, ['id' => 'item-'.$counter, 'placeholder' => 'input']) }}
                    @break
                    @case(5)
                        {{ Form::select('asset_id[]', $selectToolAsset, $item->asset_id, ['id' => 'item-'.$counter, 'placeholder' => 'input']) }}
                    @break
                    @case(6)
                        {{ Form::select('asset_id[]', $selectSafetyAsset, $item->asset_id, ['id' => 'item-'.$counter, 'placeholder' => 'input']) }}
                    @break
                    @case(7)
                        {{ Form::select('ref_id[]', $selectPOAsset, $item->ref_id, ['id' => 'sub-'.$counter, 'placeholder' => 'input', 'readonly' => 'true']) }}
                    @break
                    @case(8)
                        {{ Form::select('asset_id[]', $selectOtherAsset, $item->asset_id, ['id' => 'item-'.$counter, 'placeholder' => 'input']) }}
                    @break
                @endswitch
        </div>
                @switch($item->category_id)
                    @case(1)
                        <div class="column is-3">
                            {{ Form::select('ref_id[]', $selectEmployee, $item->ref_id, ['id' => 'sub-'.$counter, 'placeholder' => 'input']) }}
                        </div>
                    @break
                    @case(2)
                        <div class="column is-3">
                            {{ Form::select('ref_id[]', $selectTruck, $item->ref_id, ['id' => 'sub-'.$counter, 'placeholder' => 'input']) }}
                        </div>
                    @break
                    @case(3)
                        <div class="column is-3">
                            {{ Form::select('ref_id[]', $selectTrailer, $item->ref_id, ['id' => 'sub-'.$counter, 'placeholder' => 'input']) }}
                        </div>
                    @break
                    @case(4)
                    <div class="column is-3">
                        {{ Form::select('ref_id[]', $selectEquipment, $item->ref_id, ['id' => 'sub-'.$counter, 'placeholder' => 'input']) }}
                    </div>
                    @break
                    @case(5)
                    <div class="column is-3">
                        {{ Form::select('ref_id[]', $selectTool, $item->ref_id, ['id' => 'sub-'.$counter, 'placeholder' => 'input']) }}
                    </div>
                    @break
                    @case(6)
                    <div class="column is-3">
                        {{ Form::select('ref_id[]', $selectSafety, $item->ref_id, ['id' => 'sub-'.$counter, 'placeholder' => 'input']) }}
                    </div>
                    @break
                    @case(7)
                        @php
                            $description = "";
                            $thisPO = \App\BillablePurchaseOrder::find($item->ref_id);
                            if ($thisPO) {
                               $description = $thisPO->vendor . ' - ' . $thisPO->description;
                            }
                        @endphp
                    <div class="column is-7">
                        {{ Form::hidden('asset_id[]', 0, ['id' => 'item-'.$counter, 'class' => 'input']) }}
                        {{ Form::text('po', $description, ['id' => 'item-'.$counter, 'class' => 'input readonly is-static', 'readonly' => 'true']) }}
                    </div>
                    @break
                    @case(8)
                    <div class="column is-3">
                        {{ Form::select('ref_id[]', $selectOther, $item->ref_id, ['id' => 'sub-'.$counter, 'placeholder' => 'input']) }}
                    </div>
                    @break
                @endswitch

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
@endforeach
