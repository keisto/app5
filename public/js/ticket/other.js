// Employee == 1
// Truck == 2
// Trailer == 3
// Equipment == 4
// Tool == 5
// Safety == 6
// Purchase Order == 7
// Other == 8

$('#addOther').click(function() {
    addSelection();
    $('#item-'+counter).append($("<option disabled selected>").attr('value', 0).text('Other Type'));
            for (var i = 0; i < assets.length; i++) {
                if (assets[i]['category_id'] == 8)
                    $('#item-'+counter).append($("<option>")
                        .attr('value', assets[i]['id']).text(assets[i]['name']));
            }
            $('#cat-'+counter).attr("value", 8);
            $('#sub-'+counter).attr('disabled', 'true');
            $('#quantity-'+counter).attr('disabled', 'true');

    $('#item-'+counter).on('change', function (e) {
        value = parseInt(this.value);
        // console.log($(this).attr('id').split('-')[1])
        id = $(this).attr('id').split('-')[1];
        if (value>=1) $('#sub-'+id).removeAttr('disabled');
        $('#sub-'+id).empty();
        $('#sub-'+id).append($("<option disabled selected>").attr('value', 0).text('Other Label'));
            for (var i = 0; i < other.length; i++) {
                if (other[i]['asset_id'] == value)
                    $('#sub-'+id).append($("<option>")
                        .attr('value', other[i]['id']).text(other[i]['label']));
        }

        $('#quantity-'+id).removeAttr('disabled');
        for (var i = 0; i < rates.length; i++) {
            if (rates[i].category_id == 8 && rates[i].asset_id == value && rates[i].client_id == $('#client_id option:selected').val()) {
                switch (rates[i].type) {
                    case 1:
                        $('#quantity-' + id).attr('placeholder', 'Hours').attr('type', 'number').attr('step', '.25');
                        $('#ratetype-' + id).val('Hours');
                        break;
                    case 2:
                        $('#quantity-' + id).attr('placeholder', 'Daily').attr('type', 'number').val(1);
                        $('#ratetype-' + id).val('Day');
                        break;
                    case 3:
                        $('#quantity-' + id).attr('placeholder', 'Gallons').attr('type', 'number').attr('step', '.25');
                        $('#ratetype-' + id).val('Gallons');
                        break;
                    case 4:
                        $('#quantity-' + id).attr('placeholder', 'Quantity').attr('type', 'number').attr('step', '.25');
                        $('#ratetype-' + id).val('Quantity');
                        break;
                    case 5:
                        $('#quantity-' + id).attr('placeholder', 'PO').attr('disable', 'true');
                        break;
                }

            }
        }
    });
});
