let upBut = document.querySelector('.up-button');
let headerMenu = document.querySelector('.header-menu');
let header = document.querySelector('header');
let logo = document.querySelector('.logo-fx');

window.onscroll = function () {
    if (window.pageYOffset > 300) {
        upBut.style.cursor = "pointer";
        upBut.classList.add('shown');
        upBut.disabled = false;

        headerMenu.classList.add('fixed');
        header.style.paddingTop = "0";

        
    } else {
        upBut.style.cursor = "default";
        upBut.disabled = true;
        upBut.classList.remove('shown');

        headerMenu.classList.remove('fixed');
        header.style.paddingTop = "2rem";

        
    }    

    if(window.pageYOffset > 100) {
        find_after.style.display = 'none';
        bg.style.display = 'none';
        find_behind.style.display = 'block';
    }

}
upBut.onclick = function () {
    window.scrollTo(0, 0);
}