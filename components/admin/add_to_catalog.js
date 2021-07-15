let i = 1;

function additional_photos() {
    if (i <= 3) {
        $('#add_photo_' + i).removeAttr('onclick');
        i++;
        $('#add_photo_1').parent().append($('<input>', {
            type: 'file',
            name: 'add_photo_' + i,
            accept: 'image/*',
            onclick: "additional_photos()",
            id: 'add_photo_' + i
        }));
    }
}

$('#with_sale_yes').on('change', function () {
    if ($('#with_sale_yes').is(':checked')) {
        $('.box_with_sale').css('display','block');
    } else {
        $('.box_with_sale').css('display','none');
        $('.box_without_sale').css('display','none');

    }
})

$('#with_sale_no').on('change', function () {

    if ($('#with_sale_no').is(':checked')) {
        $('.box_without_sale').css('display','block');

    } else {
        $('.box_without_sale').css('display','none');
        $('.box_with_sale').css('display','none');

    }
})