function sort(action) {
    console.log($('#sort_by_type').val());
    console.log(action);
    $.ajax({
        type:'POST',
        async: false,
        url: "../category.php",
        dataType: 'text',
        data: {           
            sort_action: action,          
            //sort_price: $('#sort_by_price').val(),
            sort_type: $('#sort_by_type').val()
        },
        success: function(data) {                            
            
            alert(data);
        },
        error: function() {
            alert("Ошибка добавления товара, пожалуйста, обратитесь к поддержке сайта");
        } 
    })
}