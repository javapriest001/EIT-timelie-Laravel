let open = document.querySelector('.hamburger');
let close = document.querySelector('.close');
let navbar = document.querySelector('aside');
let body = document.querySelector('.general_body');

open.addEventListener('click', () => {
    navbar.style.display = 'block';
})
close.addEventListener('click', () => {
    navbar.style.display = 'none';
})
// body.addEventListener('click', () => {
//     navbar.style.display = 'none';
// })