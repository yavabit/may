let elements = document.querySelectorAll('.header-menu ul li a');
/* Активная страница */
for (let element of elements) {    
    let location = window.location.href;
    let link = element.href;
    if (location == link) {
        element.style.color = "rgba(255, 0, 179, 0.788)";        
    }
}
