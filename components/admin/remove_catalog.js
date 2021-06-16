function remove_cat(itemID) {
    if(confirm('Подтвердите удаление')){
        $.ajax({
            type: "POST", // Метод отправки
            url: "remove_catalog.php", // Путь до php файла отправителя
            data: { id: itemID, action: 'catalog'},
            success: function (data) {
                alert('Товар удален');
            }
        });
    }
}; 

function remove_sale(itemID) {
    if(confirm('Подтвердите удаление')){
        $.ajax({
            type: "POST", // Метод отправки
            url: "remove_catalog.php", // Путь до php файла отправителя
            data: { id: itemID, action: 'sales'},
            success: function (data) {
                alert('Скидка на товар удалена');
            }
        });
    }    
};
