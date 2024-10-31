import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();



// Wait for 3 seconds and then hide the success message
setTimeout(function() {
    const message = document.getElementById('success-message');
    if (message) {
        message.style.display = 'none'; // Hides the message
    }
}, 3000); // 3000 milliseconds = 3 seconds
