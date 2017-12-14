// Employee == 1
// Truck == 2
// Trailer == 3
// Equipment == 4
// Tool == 5
// Safety == 6
// Purchase Order == 7
// Other == 8

$('#addEquipment').click(function() {
    addSelection('Equipment Type','Equipment Label');
    $('#item-'+counter).append($("<option disabled selected>").attr('value', 0).text('Equipment Type'));
            for (var i = 0; i < assets.length; i++) {
                if (assets[i]['category_id'] == 4)
                    $('#item-'+counter).append($("<option>")
                        .attr('value', assets[i]['id']).text(assets[i]['name']));
            }
            $('select').not('.selectized').selectize();
            $('#cat-'+counter).attr("value", 4);
            $('#sub-'+counter).attr('disabled', 'true');

    $('#item-'+counter).on('change', function (e) {
        value = parseInt(this.value);
        id = $(this).attr('id').split('-')[1];
        if (value>=1) $('#sub-'+id).removeAttr('disabled');
        $('#sub-'+id).empty();
            for (var i = 0; i < equipment.length; i++) {
                if (equipment[i]['asset_id'] == value)
                    $('#sub-'+id).append($("<option>")
                        .attr('value', equipment[i]['id']).text(equipment[i]['label']));
        }
        $('#sub-'+id).updateSelectize();
    });
});
