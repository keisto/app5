$(document).ready(function(){

    $('div[id^="show-"]').each(function() {
        $(this).slideUp('fast');
    });
    $('div[id^="hover-"]').each(function() {
        $(this).click(function() {
            // $('div[id^="show-"]').each(function() {
            //     $(this).slideToggle('fast');
            // });

            $(this).next('div[id^="show-"]').slideToggle('fast');

        });
    });

    $('input[id=dispatched_item]').each(function(e){
        $(this).on("keyup", function(){
            checkDuplicates();
        });
    });
    function checkDuplicates() {
        $('#ab-employee').html("");
        $('#ab-truck').html("");
        $('#ab-trailer').html("");
        $('#ab-equipment').html("");
        $('#alert-box').addClass('is-hidden').fadeOut();
        let dispatched_items_array = [];
        $('input[id=dispatched_item]').each(function(e){
            let employeeDuplicates = 0;
            let truckDuplicates = 0;
            let trailerDuplicates = 0;
            let equipmentDuplicates = 0;
            let value = $(this).val();
            let parent = $(this).parents().parent('.column-actions').prev('.dispatched_job');
            parent.removeClass('notification is-danger');
            $(this).removeClass('is-danger');

            if (dispatched_items_array.indexOf(value) == -1) {
                dispatched_items_array.push(value);
            } else {
                // is duplicate
                $('input').each(function () {
                    if ($(this).val() == value) {
                        $(this).parents().parent('.column-actions')
                            .prev('.dispatched_job').addClass('notification is-danger');
                        $(this).addClass('is-danger');

                        let cat_id = $(this).prev('.category_id').val();
                        if (cat_id == "1") {
                            employeeDuplicates++;
                            $('#ab-employee').html("Duplicate found: " + "Same employee used <strong>"
                                + employeeDuplicates + "</strong> instances <br/>");
                        }
                        if (cat_id == "2") {
                            truckDuplicates++;
                            $('#ab-truck').html("Duplicate found: " + "Same truck used <strong>"
                                + truckDuplicates + "</strong> instances <br/>");
                        }
                        if (cat_id == "3") {
                            trailerDuplicates++;
                            $('#ab-trailer').html("Duplicate found: " + "Same trailer used <strong>"
                                + trailerDuplicates + "</strong> instances <br/>");
                        }
                        if (cat_id == "4") {
                            equipmentDuplicates++;
                            $('#ab-equipment').html("Duplicate found: " + "Same equipment used <strong>"
                                + equipmentDuplicates + "</strong> instances <br/>");
                        }
                        $('#alert-box').removeClass('is-hidden').fadeIn();
                    }
                });
            }
        });
    }
    checkDuplicates();
});
