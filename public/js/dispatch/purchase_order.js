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
        <div class="columns is-desktop box" id="row-${counter}">
            <div class="column">
                <input id="pos-${counter}" name="position_id[]" value="${counter}" hidden>
                <input id="cat-${counter}" name="category_id[]" value="7" hidden>
                <select id="item-${counter}" name="ref_id[]"></select>
            </div>
            <div class="column">
                <input id="sub-${counter}" class="input" value="" name="asset_id[]" readonly/>
            </div>
            <div class="column is-narrow has-text-centered">
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
            $('select').not('.selectized').selectize();
            $('#sub-'+counter).attr('disabled', 'true');


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
    });
});
