// Employee == 1
// Truck == 2
// Trailer == 3
// Equipment == 4
// Tool == 5
// Safety == 6
// Purchase Order == 7
// Other == 8

$('#addTool').click(function() {
    addSelection('Tool','Tool');
    $('#item-'+counter).append($("<option disabled selected>").attr('value', 0).text('Tool'));
            for (var i = 0; i < assets.length; i++) {
                if (assets[i]['category_id'] == 3)
                    $('#item-'+counter).append($("<option>")
                        .attr('value', assets[i]['id']).text(assets[i]['name']));
            }
            $('select').not('.selectized').selectize();
            $('#cat-'+counter).attr("value", 5);
            $('#sub-'+counter).attr('disabled', 'true');

    $('#item-'+counter).on('change', function (e) {
        value = parseInt(this.value);
        // console.log($(this).attr('id').split('-')[1])
        id = $(this).attr('id').split('-')[1];
        if (value>=1) $('#sub-'+id).removeAttr('disabled');
        $('#sub-'+id).empty();
            for (var i = 0; i < trailers.length; i++) {
                if (trailers[i]['asset_id'] == value)
                    $('#sub-'+id).append($("<option>")
                        .attr('value', trailers[i]['id']).text(trailers[i]['label']));
        }
        $('#sub-'+id).updateSelectize();
    });
});
