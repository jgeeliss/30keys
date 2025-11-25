import './bootstrap';

// Highlight the link based on the current page nav link
document.addEventListener('DOMContentLoaded', () => {
    const allHeaderNavLinks = document.querySelectorAll('header nav a');
    const currentPath = window.location.pathname;

    // Match current URL path to nav links
    allHeaderNavLinks.forEach(link => {
        const linkPath = new URL(link.href).pathname;
        if (linkPath === currentPath) {
            link.classList.add('last-clicked');
        }
    });
});
