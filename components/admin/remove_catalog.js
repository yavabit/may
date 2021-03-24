function remove_cat(itemID) {
    //var form_data = $(this).serialize(); // Собираем все данные из формы
    $.ajax({
        type: "POST", // Метод отправки
        url: "remove_catalog.php", // Путь до php файла отправителя
        data: { id: itemID },
        success: function (data) {
            alert('Товар удален');
        }
    });
};
