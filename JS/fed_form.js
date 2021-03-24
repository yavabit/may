$(document).ready(function () {
    $(".fed-form").submit(function (e) { // Устанавливаем событие отправки для формы с id=form
        e.preventDefault();
        $(".modal-fed").css("display", "block");
        $(".dark-bg").css("display", "block");
        var form_data = $(this).serialize(); // Собираем все данные из формы
        $.ajax({
            type: "POST", // Метод отправки
            url: "../requests/fed_form.php", // Путь до php файла отправителя
            data: form_data,
            success: function () {
                $(this).find("input").val("");
                $(".fed-form").trigger("reset");
            }
        });
        $("#close_fed").on('click', function() {        
            $(".modal-fed").css("display", "none");
            $(".dark-bg").css("display", "none");        
        });
    });    

});
