window.onload = () => {
    const toggle = document.querySelector('#toggle');
    const menu = document.querySelector('.nav-menu');
    
    toggle.addEventListener('click', () => {
        menu.classList.toggle('active');
        toggle.classList.toggle('active');
    });
}