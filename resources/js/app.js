



// Custom script to toggle dark mode
import 'bootstrap';

// Custom script to toggle dark mode
document.addEventListener('DOMContentLoaded', function () {
    const body = document.body;
    const darkSwitch = document.getElementById('darkSwitch');
    const savedTheme = localStorage.getItem('theme') || 'light';
    
    body.setAttribute('data-bs-theme', savedTheme);
    if (savedTheme === 'dark') {
        darkSwitch.checked = true;
    }

    darkSwitch.addEventListener('change', function () {
        const newTheme = darkSwitch.checked ? 'dark' : 'light';
        body.setAttribute('data-bs-theme', newTheme);
        localStorage.setItem('theme', newTheme);
    });
});


