const menuToggle = document.getElementById('menu-toggle');
const ktNav = document.getElementById('kt-nav');

menuToggle.addEventListener('click', () => {
    ktNav.style.transform = ktNav.style.transform === 'translateX(0%)' ? 'translateX(100%)' : 'translateX(0%)';
});
