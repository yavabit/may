$('#add_sale').on('change', function () {
    if ($('#add_sale').is(':checked')) {
        $('.new-price').css('display','flex');
        $('#old_price').css('display','block');
        
    } else {
        $('.new-price').css('display','none');
        
    }
});

$('#new_price').on('input', function () {
    let new_price = parseInt($('#new_price').val());
    let old_price = parseInt($('#old_price').val());

    let percent = 100 - new_price * 100 / old_price;

    $('#sale_percent').val(Math.round(percent)); 

    if(new_price >= old_price) {
        $('.is_wrong').css('display','block');
        $('#sub_but').prop('disabled',true);
    } else {
        $('.is_wrong').css('display','none');
        $('#sub_but').prop('disabled',false);
    }

});

$('#sale_percent').on('input', function () {
    let percent = parseInt($('#sale_percent').val());
    let old_price = parseInt($('#old_price').val());

    let new_price = (100 - percent) * old_price / 100;

    $('#new_price').val(new_price);

});
    

//------------------------------------------------------------------

$('#change_sale').on('change', function () {
    if ($('#change_sale').is(':checked')) {
        $('.new-price').css('display','flex');
        $('#old_price').css('display','block');
        
    } else {
        $('.new-price').css('display','none');
        
    }
});