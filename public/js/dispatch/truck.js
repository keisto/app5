$('#addTruck').click(function() {
    addSelection('Employee Type','Truck Label');
    $('#item-'+counter).append($("<option disabled selected>").attr('value', 0).text('Truck Type'));
            for (var i = 0; i < assets.length; i++) {
                if (assets[i]['category_id'] == 2)
                    $('#item-'+counter).append($("<option>")
                        .attr('value', assets[i]['id']).text(assets[i]['name']));
            }
            $('select').not('.selectized').selectize();
            $('#cat-'+counter).attr("value", 2);
            $('#sub-'+counter).attr('disabled', 'true');

    $('#item-'+counter).on('change', function (e) {
        value = parseInt(this.value);
        id = $(this).attr('id').split('-')[1];
        if (value>=1) $('#sub-'+id).removeAttr('disabled');
        $('#sub-'+id).empty();
            for (var i = 0; i < trucks.length; i++) {
                if (trucks[i]['asset_id'] == value)
                    $('#sub-'+id).append($("<option>")
                        .attr('value', trucks[i]['id']).text(trucks[i]['label']));
        }
        $('#sub-'+id).updateSelectize();
    });
});
