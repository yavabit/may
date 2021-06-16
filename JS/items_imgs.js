if(window.screen.width >=575) {

    function imgScale() {        
        $(".item-img-scale").css("display", "block");
        $(".dark-bg").css("display", "block");               
    }
    
}

function changeImg(item) {
    let img = $("#img_"+item).attr('src');
    $("#mainImg").attr('src', img);
    $("#imgScale").attr('src', img);

    $(".other-imgs img").removeClass('focused');
    $("#img_"+item).toggleClass('focused');

    console.log(img);
}

$('.dark-bg').on('click', function() {
    $(".dark-bg").css("display", "none");
    $(".item-img-scale").css("display", "none");
});


  