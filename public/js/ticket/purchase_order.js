// Employee == 1
// Truck == 2
// Trailer == 3
// Equipment == 4
// Tool == 5
// Safety == 6
// Purchase Order == 7
// Other == 8

$('#addPurchaseOrder').click(function() {
    // addSelection();
    counter++;
    $('#items').append(`
        <div class="columns is-mobile" id="row-${counter}">
            <div class="column is-3">
                <input id="pos-${counter}" name="position_id[]" value="${counter}" hidden>
                <input id="cat-${counter}" name="category_id[]" value="7" hidden>
                <div class="select">
                    <select style="width:100%" id="item-${counter}" name="ref_id[]">
                    </select>
                </div>
            </div>
            <div class="column is-7">
                <input id="sub-${counter}" class="input is-static" value="" name="asset_id[]" readonly/>
            </div>
                <input id="quantity-${counter}" class="input" name="quantity[]" value="1" hidden/>

            <div class="column is-2 has-text-centered is-grouped">
                <span class="button is-light"><i class="fas fa-sort"></i></span>
                <button onclick=removeRow(${counter}) class='button is-danger'><i class="fas fa-times"></i></button>
            </div>
        </div>
    `);

    $('#item-'+counter).append($("<option disabled selected>").attr('value', 0).text('Po Number'));
            for (var i = 0; i < purchaseOrder.length; i++) {
                // if (assets[i]['category_id'] == 8)
                    $('#item-'+counter).append($("<option>")
                        .attr('value', purchaseOrder[i]['id']).text(purchaseOrder[i]['id']));
            }
            $('#sub-'+counter).attr('disabled', 'true');
            // console.log(purchaseOrder);
            $('#quantity-'+counter).attr('disabled', 'true');

    $('#item-'+counter).on('change', function (e) {
        value = parseInt(this.value);
        // console.log($(this).attr('id').split('-')[1])
        id = $(this).attr('id').split('-')[1];
        if (value>=1) $('#sub-'+id).removeAttr('disabled');
        po = $(this).find('option:selected').val();
        for (var i = 0; i < purchaseOrder.length; i++) {
            if (purchaseOrder[i]['id'] == po) {
                $('#sub-'+id).val(purchaseOrder[i]['vendor'] + ' - ' + purchaseOrder[i]['description']);
            }
        }

        $('#quantity-'+id).removeAttr('disabled');
        for (var i = 0; i < rates.length; i++) {
            if (rates[i].category_id == 7 && rates[i].asset_id == value && rates[i].client_id == $('#client_id option:selected').val()) {
                switch (rates[i].type) {
                    case 1:
                        $('#quantity-'+id).attr('placeholder', 'Hours').attr('type', 'number').attr('step', '.25');
                        $('#ratetype-'+id).val('Hours');
                        break;
                    case 2:
                        $('#quantity-'+id).attr('placeholder', 'Daily').attr('type', 'number').val(1);
                        $('#ratetype-'+id).val('Day');
                        break;
                    case 3:
                        $('#quantity-'+id).attr('placeholder', 'Gallons').attr('type', 'number').attr('step', '.25');
                        $('#ratetype-'+id).val('Gallons');
                        break;
                    case 4:
                        $('#quantity-'+id).attr('placeholder', 'Quantity').attr('type', 'number').attr('step', '.25');
                        $('#ratetype-'+id).val('Quantity');
                        break;
                    case 5:
                        $('#quantity-'+id).attr('placeholder', 'PO').attr('disable', 'true');
                        break;
                }

            }
        }
    });
});
