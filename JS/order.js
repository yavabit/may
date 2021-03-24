let flag;
$('#delivery').on('click', function() {
    $('fieldset.delivery').css('display','block');
    $('fieldset.pickup').css('display','none');
    $('fieldset.payment').css('display','none');
    $('fieldset.payment_delivery').css('display','block');
    $('#submit_but').prop('disabled',false);
    $('.order-info .delivery-info').css('display','block');
    $('.delivery_on').css('display','block'); 

    $('#build').attr('required');
    $('#street').attr('required');
    $('#date_delivery').attr('required');

    $('#date').removeAttr('required');
    
    let action = 'add';
    delivery(action);
    
    flag = 1;
});

$('#pickup').on('click', function() {
    $('fieldset.delivery').css('display','none');
    $('fieldset.pickup').css('display','block');
    $('fieldset.payment').css('display','flex');
    $('fieldset.payment_delivery').css('display','none');
    $('#submit_but').prop('disabled',false);
    $('.order-info .delivery-info').css('display','none');
    $('.delivery_on').css('display','none');

    $('#build').removeAttr('required');
    $('#street').removeAttr('required');
    $('#date_delivery').removeAttr('required');
    $('#date').attr('required');

    if (flag == 1) {
        let action = 'delete';
        delivery(action);
        flag = 0;
    }
    
    
    
});

function delivery(action) {
    
    $.ajax({
        type:'POST',
        async: false,
        url: "../requests/cartController.php",
        dataType: 'text',
        data: {            
            action: "delivery",
            type: action
        },
        success: function(data) {     
            let itemData = JSON.parse(data);                             
            $('#final_summer').html(itemData.resultsum);    
                                 
        },
        error: function() {
            alert("Ошибка");
        } 
    })
}