<select id="category">
  <option value="" disabled selected>Asset Category</option>
  @foreach ($categories as $category)
  <option value="{{ $category->id }}">{{ $category->name }}</option>
  @endforeach
</select>
</div>
<div class="col m4 s12">
<select id='subCategory' disabled="true">
  <option value="" disabled selected>Choose Category</option>
</select>
</div>
<div class="col m4 s12">
<select id="userDefined" disabled="true">
  <option value="" disabled selected>Choose Categoy</option>
</select>

@section('footer')
    <script>
        var trucks = {!! $trucks !!};
        var trailers = {!! $trailers !!};
        var equipment = {!! $equipment !!};
        var assets = {!! $assets !!};
        var employees = {!! $employees !!}
        var rates = {!! $rates !!};

        var cat = $('#category');
        var sub = $('#subCategory');
        var def = $('#userDefined');
        var catVal = 0;
        var subVal = 0;

        cat.on('change', function () {
            catVal = parseInt(this.value);
            sub.empty(); // clear subCategory select
            if (catVal>=1) sub.removeAttr('disabled');
            def.attr('disabled', 'true');
            def.empty();
            def.append($("<option disabled selected>").attr('value', 0).text('Choose Opition'));
            switch (parseInt(this.value)) {
                case 1: // Employees (users)
                    sub.append($("<option disabled selected>").attr('value', 0).text('Employee Position'));
                    for (var i = 0; i < assets.length; i++) {
                        if (assets[i]['category_id'] == 1)
                        sub.append($("<option>").attr('value', assets[i]['id']).text(assets[i]['name']));
                    }
                    break;
                case 2: // Truck
                    sub.append($("<option disabled selected>").attr('value', 0).text('Truck Type'));
                    for (var i = 0; i < assets.length; i++) {
                        if (assets[i]['category_id'] == 2)
                        sub.append($("<option>").attr('value', assets[i]['id']).text(assets[i]['name']));
                    }
                    break;
                case 3: // Trailer
                        sub.append($("<option disabled selected>").attr('value', 0).text('Trailer Type'));
                        for (var i = 0; i < assets.length; i++) {
                            if (assets[i]['category_id'] == 3)
                            sub.append($("<option>").attr('value', assets[i]['id']).text(assets[i]['name']));
                        }
                        break;
                case 4: // Equipment (equipment)
                    sub.append($("<option disabled selected>").attr('value', 0).text('Equipment Type'));
                    for (var i = 0; i < assets.length; i++) {
                        if (assets[i]['category_id'] == 4)
                        sub.append($("<option>").attr('value', assets[i]['id']).text(assets[i]['name']));
                    }
                    break;
                case 5: // Tool
                    sub.append($("<option disabled selected>").attr('value', 0).text('Tool Name'));
                    for (var i = 0; i < assets.length; i++) {
                        if (assets[i]['category_id'] == 5)
                        sub.append($("<option>").attr('value', assets[i]['id']).text(assets[i]['name']));
                    }
                    break;
                case 6: // Safety
                    sub.append($("<option disabled selected>").attr('value', 0).text('Safety Equipment'));
                    for (var i = 0; i < assets.length; i++) {
                        if (assets[i]['category_id'] == 6)
                        sub.append($("<option>").attr('value', assets[i]['id']).text(assets[i]['name']));
                    }
                    break;
                case 7: // Purchase Order
                    sub.append($("<option disabled selected>").attr('value', 0).text('Choose Option'));
                    for (var i = 0; i < assets.length; i++) {
                        if (assets[i]['category_id'] == 7)
                        sub.append($("<option>").attr('value', assets[i]['id']).text(assets[i]['name']));
                        $('select').material_select();
                    }
                    break;
                case 8: // Other
                    sub.append($("<option disabled selected>").attr('value', 0).text('Choose Option'));
                    for (var i = 0; i < assets.length; i++) {
                        if (assets[i]['category_id'] == 8)
                        sub.append($("<option>").attr('value', assets[i]['id']).text(assets[i]['name']));
                    }
                    break;
                default:
            }
        });

        sub.on('change', function () {
            def.empty(); // clear userDefined select
            subVal = parseInt(this.value);
            if (parseInt(this.value)>=1) def.removeAttr('disabled');
            switch (catVal) {
                case 1: // Employees (users)
                    def.append($("<option disabled selected>").attr('value', 0).text('Employee Name'));
                    for (var i = 0; i < employees.length; i++) {
                        def.append($("<option>").attr('value', employees[i]['id']).text(employees[i]['name']));
                    }
                    break;
                case 2: // Truck
                    def.append($("<option disabled selected>").attr('value', 0).text('Truck Label'));
                    for (var i = 0; i < trucks.length; i++) {
                        if (trucks[i]['asset_id'] == subVal)
                        def.append($("<option>").attr('value', trucks[i]['id']).text(trucks[i]['label']));
                    }
                    break;
                case 3: // Trailer
                        def.append($("<option disabled selected>").attr('value', 0).text('Trailer Label'));
                        for (var i = 0; i < trailers.length; i++) {
                            if (trailers[i]['asset_id'] == subVal)
                            def.append($("<option>").attr('value', trailers[i]['id']).text(trailers[i]['label']));
                        }
                        break;
                case 4: // Equipment
                    def.append($("<option disabled selected>").attr('value', 0).text('Equipment Label'));
                    for (var i = 0; i < equipment.length; i++) {
                        if (equipment[i]['asset_id'] == subVal)
                        def.append($("<option>").attr('value', equipment[i]['id']).text(equipment[i]['label']));
                    }
                    break;
                case 5: // Tool
                    def.append($("<option disabled selected>").attr('value', 0).text('Tool Name'));
                    for (var i = 0; i < assets.length; i++) {
                        if (assets[i]['category_id'] == 5)
                        def.append($("<option>").attr('value', assets[i]['id']).text(assets[i]['name']));
                    }
                    break;
                case 6: // Safety
                    def.append($("<option disabled selected>").attr('value', 0).text('Safety Equipment'));
                    for (var i = 0; i < assets.length; i++) {
                        if (assets[i]['category_id'] == 6)
                        def.append($("<option>").attr('value', assets[i]['id']).text(assets[i]['name']));
                    }
                    break;
                case 7: // Purchase Order
                    def.append($("<option disabled selected>").attr('value', 0).text('Choose Option'));
                    for (var i = 0; i < assets.length; i++) {
                        if (assets[i]['category_id'] == 7)
                        def.append($("<option>").attr('value', assets[i]['id']).text(assets[i]['name']));
                        $('select').material_select();
                    }
                    break;
                case 8: // Other
                    def.append($("<option disabled selected>").attr('value', 0).text('Choose Option'));
                    for (var i = 0; i < assets.length; i++) {
                        if (assets[i]['category_id'] == 8)
                        def.append($("<option>").attr('value', assets[i]['id']).text(assets[i]['name']));
                    }
                    break;
                default:
            }
        });

        // var addRow = "<tr class='table-row' id=" + count + "> \
        // 					<td><input type='text' value=\"" + assetName.value + "\" name='row_asset_id[]' class='hiddenElement' readonly=''></input><input type='text' name='row_name[]' class='form-item' value=\"" + setAsset.trim() + "\" readonly=''><input type='text' name='row_wage[]' class='hiddenElement' value=\""+ setType.trim() + "\" readonly=''></td> \
        // 					<td><input type='text' name='row_title[]' class='form-item' readonly='' value=\""+ setType.trim() + "\"><input type='text' name='row_category[]' class='hiddenElement' readonly='' value="+ setCate.trim() + "></td> \
        // 					<td>"+ rateInput +"</td> \
        // 					<td><a onclick='deleteasset("+ count + ")'><span class='glyphicon glyphicon-trash delete-link' aria-hidden='true'></span></a></td> \
        // 				</tr>";

        function addCharge() {
            var items = $('#items');
            var counter = charges.children().length + 1;
            // console.log("Sub Category: " + sub.find('option:selected').text());
            // console.log("Category: " + cat.find('option:selected').text());
            var categoryId = cat.find('option:selected').val();
            var assetId = sub.find('option:selected').val();
            var assetValue= sub.find('option:selected').text();
            var defId= def.find('option:selected').val();
            var defValue= def.find('option:selected').text();

            items.append(`
                <div class="row" id='row-${counter}'>
                    <div class="input-field col s7">
                        <input type="text" value='${defValue}' readonly>
                        <label class="active">${assetValue}</label>
                        <input type="text" name='asset_id[]' value='${assetId}' hidden>
                        <input type="text" name='unique_id[]' value='${defId}' hidden>
                    </div>
                    <div class="input-field col s4">
                        <input type="text" name='asset_count[]'>
                        <label for="asset_count[]">Hours</label>
                    </div>
                    <div class="input-field col s1 right-align">
                        <a onclick=removeRow(${counter}) class='btn-flat red-text'><i class="far fa-times fa-lg"></i></a>
                    </div>
                </div>
                `);

            items.removeAttr('hidden');
            $('#addChargeModal').modal('close');
            for (var i = 0; i < rates.length; i++) {
                var asset_id = $('#subCategory').find('option:selected').val();
                var client_id = $('#client').find('option:selected').val();
                if(rates[i]['asset_id'] == asset_id && rates[i]['client_id'] == client_id) {
                    console.log(rates[i]['rate']);
                }
            }
            // console.log(rates[10]['client']['client']);
        }

        function removeRow($id) {
            $('#row-'+$id).remove();
        }

    </script>
@endsection
