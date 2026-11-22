import './bootstrap';
const toggle = document.getElementById('menu-toggle');
const menu = document.getElementById('menu');

toggle?.addEventListener('click', () => {
    const isOpen = menu.classList.toggle('hidden') === false;
    toggle.setAttribute('aria-expanded', String(isOpen));
});

document.querySelectorAll('[data-slider]').forEach((root) => {
    const track = root.querySelector('[data-slider-track]');

    const go = (arah) => {
        const max = track.scrollWidth - track.clientWidth;
        const tujuan = track.scrollLeft + arah * track.clientWidth;

        track.scrollTo({
            left: tujuan < 0 ? max : tujuan > max + 1 ? 0 : tujuan,   // berputar di ujung
            behavior: 'smooth',
        });
    };

    root.querySelector('[data-slider-prev]')?.addEventListener('click', () => go(-1));
    root.querySelector('[data-slider-next]')?.addEventListener('click', () => go(1));
});