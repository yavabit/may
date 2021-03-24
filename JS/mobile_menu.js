$('.mobile-menu-button').on('click', function() {
    $('.mob-menu').css('display','block');
    $('.dark-bg').css('display','block');
    $('.close-but').css('display','block');
});

$('.close-but').on('click', function() {
    $('.mob-menu').css('display','none');
    $('.dark-bg').css('display','none');
    $('.close-but').css('display','none');
});

$('.dark-bg').on('click', function() {
    $('.mob-menu').css('display','none');
    $('.dark-bg').css('display','none');
    $('.close-but').css('display','none');
});




$('.category-menu-button').on('click', function() {
    $('.mob-categories').css('display','block');
    $('.dark-bg').css('display','block');
    $('.mob-categories .close-but').css('display','block');
});

$('.mob-categories .close-but').on('click', function() {
    $('.mob-categories').css('display','none');
    $('.dark-bg').css('display','none');
    $('.mob-categories .close-but').css('display','none');
});

$('.dark-bg').on('click', function() {
    $('.mob-categories').css('display','none');
    $('.dark-bg').css('display','none');
    $('.mob-categories .close-but').css('display','none');
});