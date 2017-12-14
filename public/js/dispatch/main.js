
var counter = $('#items').children().length;
$('#items').sortable({
    stop: function(e) {
        var children = $(this).children();
        var rowNumber = 1;
        console.log(children);
        for (var i = 0; i < children.length; i++) {
            var element = children[i];
            var id = element.getAttribute('id').split('-')[1];
            // console.log("old"+$('#pos-'+id).val());
            $('#pos-'+id).attr("value",rowNumber);
            // console.log("new"+$('#pos-'+id).val());
            rowNumber++;
        }
    }
});
$('#items').disableSelection();
function addSelection(asset, placeholder) {
    counter++;
    $('#items').append(`
        <div class="columns is-desktop box" id="row-${counter}">
            <div class="column">    
                <input id="pos-${counter}" name="position_id[]" value="${counter}" hidden>
                <input id="cat-${counter}" name="category_id[]" value="" hidden>
                <select id="item-${counter}" name="asset_id[]" placeholder="${asset}"></select>
            </div>
            <div class="column">
                <select id="sub-${counter}" name="ref_id[]" placeholder="${placeholder}"></select>
            </div> 
            <div class="column is-narrow has-text-centered">
                <span class="button is-light"><i class="fas fa-sort"></i></span>
                <button type="button" onclick="removeRow(${counter})" class="button is-danger"><i class="fas fa-times"></i></button>
            </div>
        </div>
    `);
}

function removeRow($id) {
    $('#row-'+$id).animateCss('rotateOutDownLeft', function () {
        $('#row-' + $id).css({'opacity': 0});
        $('#row-' + $id).animate({'height': 0, 'padding': 0}, 'fast');
        setTimeout(function() {
            $('#row-' + $id).remove()
            }, 1500);
    });
}
