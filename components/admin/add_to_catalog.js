$(document).ready(function () {
    $("#add_catalog").submit(function (e) { // Устанавливаем событие отправки для формы с id=form
        e.preventDefault();
        var form_data = $(this).serialize(); // Собираем все данные из формы
        $.ajax({
            type: "POST", // Метод отправки
            url: "add_to_catalog.php", // Путь до php файла отправителя
            data: form_data,
            success: function () {
                $(this).find("input").val("");
                $(".fed-form").trigger("reset");
                alert('Товар добавлен');
            }
        });  
        
    });    

});
