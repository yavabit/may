let find_behind = document.querySelector('.find');
let find_after = document.querySelector('.to-find');
let bg = document.querySelector('.light-bg');

find_behind.onclick = function() {
    event.preventDefault();
    find_behind.style.display = 'none';
    find_after.style.display = 'block';
    bg.style.display = 'block';
}

bg.onclick = function() {
    find_after.style.display = 'none';
    bg.style.display = 'none';
    find_behind.style.display = 'block';
}