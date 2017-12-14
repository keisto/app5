// Employee == 1
// Truck == 2
// Trailer == 3
// Equipment == 4
// Tool == 5
// Safety == 6
// Purchase Order == 7
// Other == 8

$('#addEmployee').click(function() {
    addSelection('Employee Position','Employee Name');
    $('#item-'+counter).append($("<option disabled selected>").attr('value', 0).text('Employee Position'));
            for (var i = 0; i < assets.length; i++) {
                if (assets[i].category_id == 1) {
                    $('#item-'+counter).append($("<option>")
                        .attr('value', assets[i].id).text(assets[i].name));
                }
            }
            $('select').not('.selectized').selectize();
            $('#cat-'+counter).attr("value", 1);
            $('#sub-'+counter).attr('disabled', 'true');


    $('#item-'+counter).on('change', function (e) {
        let value = parseInt(this.value);
        id = $(this).attr('id').split('-')[1];
        if (value>=1) $('#sub-'+id).removeAttr('disabled');
        $('#sub-'+id).empty();
            for (let i = 0; i < employees.length; i++) {
                $('#sub-'+id).append($("<option>")
                        .attr('value', employees[i].id).text(employees[i].name));
            }
        $('#sub-'+id).updateSelectize();
    });
});
