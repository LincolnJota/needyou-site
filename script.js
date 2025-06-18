document.addEventListener('DOMContentLoaded', function () {
    if (window.AOS) {
        AOS.init({
            duration: 900,
            once: true,
        });
    }

    // Menu responsivo
    const menuBtn = document.getElementById('menuBtn');
    const nav = document.querySelector('nav');
    if (menuBtn && nav) {
        menuBtn.addEventListener('click', () => {
            nav.classList.toggle('open');
        });
        // Fecha menu quando clica fora
        document.addEventListener('click', (e) => {
            if (!menuBtn.contains(e.target) && !nav.contains(e.target)) {
                nav.classList.remove('open');
            }
        });
    }
});