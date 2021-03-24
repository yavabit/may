if(window.screen.width < 575) {
    let m = $('td.price').html();
    console.log(m);
    
    $('.mob_price').html('Цена: ');
    $('.mob_price_final').html('Итого: ');
    
}

function addToCart(itemID,quick) {

    $.ajax({
        type:'POST',
        async: false,
        url: "../requests/cartController.php",
        dataType: 'text',
        data: {
            id: itemID,
            action: "add"
        },
        success: function(data) {     
            let itemData = JSON.parse(data);
            if(itemData.success) {
                if(!quick) {
                    $(".modal-cart").css("display", "block");
                    $(".dark-bg").css("display", "block");
                }
                

                $("#cartCountItems").html(itemData.count);
                $("#cartCountItems").css("display","flex");

                $("#cartCountItemsmob").html(itemData.count);
                $("#cartCountItemsmob").css("display","flex");

                $("#modal-cart-title").html(itemData.title);      
                $("#modal-cart-count").html(itemData.count);  
                $("#modal-cart-sum").html(itemData.price_sum);       
               // $('#modal-to-cart').attr('href', 'cart.php?'+itemData.id);
            } else {
                alert("Товар уже был добавлен");
            }
               
            //alert(data);
        },
        error: function() {
            alert("Ошибка добавления товара, пожалуйста, обратитесь к поддержке сайта");
        } 
    })

    $("#modal_btn_cart").on('click', function() {        
        $(".modal-cart").css("display", "none");
        $(".dark-bg").css("display", "none");        
    });
}

function removeFromCart(itemID) {

    $("#delete").css("display", "block");
    $(".dark-bg").css("display", "block");

    $("#delete_from_cart").on('click', function() {
        $.ajax({
            type:'POST',
            async: false,
            url: "../requests/cartController.php",
            dataType: 'text',
            data: {
                id: itemID,
                action: "remove"
            },
            success: function(data) {     
                let itemData = JSON.parse(data);
                if(itemData.success) {
                    $("#cartCountItems").html(itemData.count);
                    $("#cartCountItems").css("display","flex");

                    $("#tr_"+itemID).css('display','none');
                    $("#final_span").val(parseInt($("#final_span").val())-itemData.priceItem);
                    
                } else {
                    alert("Ошибка удаления товара");
                }
                   
            },
            error: function() {
                alert("Ошибка удаления товара, пожалуйста, обратитесь к поддержке сайта");
            } 
        })

        $("#delete").css("display", "none");
        $(".dark-bg").css("display", "none");
    });
    
}

function removeAll(itemID, paid) {
    
    $("#delete").css("display", "block");
    $(".dark-bg").css("display", "block");

    $("#delete_from_cart").on('click', function() {
        $.ajax({
            type:'POST',
            async: false,
            url: "../requests/cartController.php",
            dataType: 'text',
            data: {
                id: itemID,
                action: "removeAll"
            },
            success: function(data) {     
                let itemData = JSON.parse(data);
                if(itemData.success) {
                    $("#cartCountItems").html(itemData.count);
                    $("#cartCountItems").css("display","flex");
                    
                    $(".cart-table").css('display','none'); 
                    $(".to-order-buts").css('display','none');
                    $(".final-price").css('display','none');
                    
                } else {
                    alert("Ошибка удаления");
                }
                   
            },
            error: function() {
                alert("Ошибка удаления, пожалуйста, обратитесь к поддержке сайта");
            } 
        })

        $("#delete").css("display", "none");
        $(".dark-bg").css("display", "none");
    });
    
}


function countItemsCart(itemID, sign) {
    
    if(sign == 'plus' && parseInt($('#count_item_'+itemID).val()) < 4) {
        let count = $('#count_item_'+itemID).val();
        $('#count_item_'+itemID).val(parseInt(count) + 1);

        let fin_count = parseInt($('#count_item_'+itemID).val());
        console.log(fin_count);
        
        let priceItem = $('#price_'+itemID).val();
        console.log((priceItem));

        $('#final_price_'+itemID).val(parseInt(parseInt(fin_count)*parseInt(priceItem)));
        let finalPrice = parseInt($('#final_price_'+itemID).val());
        console.log((finalPrice));

        

        let fp = document.querySelectorAll('.final_price');
        let final = document.querySelector('#final_span');
        final.value = 0;
        for(let i = 0; i<fp.length;i++) {
            final.value = parseInt(fp[i].value) + parseInt(final.value);
            console.log(final.value);
        }
        console.log(final.value);
    }
    
    if(sign == 'minus' && parseInt($('#count_item_'+itemID).val()) > 1) {
        let count = $('#count_item_'+itemID).val();
        $('#count_item_'+itemID).val(parseInt(count) - 1);

        let fin_count = parseInt($('#count_item_'+itemID).val());
        console.log(fin_count);
        
        let priceItem = $('#price_'+itemID).val();
        console.log((priceItem));

        $('#final_price_'+itemID).val(parseInt(parseInt(fin_count)*parseInt(priceItem)));
        let finalPrice = parseInt($('#final_price_'+itemID).val());
        console.log((finalPrice));

        

        let fp = document.querySelectorAll('.final_price');
        let final = document.querySelector('#final_span');
        final.value = 0;
        for(let i = 0; i<fp.length;i++) {
            final.value = parseInt(fp[i].value) + parseInt(final.value);
            console.log(final.value);
        }
        console.log(final.value);
    }
}