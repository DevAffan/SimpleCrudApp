import './bootstrap';

import Alpine from 'alpinejs';

import '@fortawesome/fontawesome-free/css/all.min.css';


window.Alpine = Alpine;

Alpine.start();



// Wait for 3 seconds and then hide the success message
setTimeout(function() {
    const message = document.getElementById('success-message');
    if (message) {
        message.style.display = 'none'; // Hides the message
    }
}, 3000); // 3000 milliseconds = 3 seconds


// document.addEventListener("DOMContentLoaded", function () {
//     const togglePasswordIcon = document.getElementById('toggle-password-visibility');
//     const passwordInput = document.getElementById('password');
//     const eyeIcon = document.getElementById('eye-icon');

//     togglePasswordIcon.addEventListener('click', function () {
//         if (passwordInput.type === 'password') {
//             passwordInput.type = 'text';
//             eyeIcon.classList.remove('fa-eye');
//             eyeIcon.classList.add('fa-eye-slash', 'text-blue-600');
//         } else {
//             passwordInput.type = 'password';
//             eyeIcon.classList.remove('fa-eye-slash', 'text-blue-600');
//             eyeIcon.classList.add('fa-eye');
//         }
//     });
// });

// document.addEventListener("DOMContentLoaded", function () {
//     const togglePassword = (inputId, iconId) => {
//         const passwordInput = document.getElementById(inputId);
//         const eyeIcon = document.getElementById(iconId);

//         if (passwordInput.type === 'password') {
//             passwordInput.type = 'text';
//             eyeIcon.classList.replace('fa-eye', 'fa-eye-slash');
//             eyeIcon.classList.add('text-blue-600');
//         } else {
//             passwordInput.type = 'password';
//             eyeIcon.classList.replace('fa-eye-slash', 'fa-eye');
//             eyeIcon.classList.remove('text-blue-600');
//         }
//     };

//     // Add event listeners to each toggle icon
//     document.getElementById('toggle-current-password').addEventListener('click', () => togglePassword('update_password_current_password', 'eye-icon-current'));
//     document.getElementById('toggle-new-password').addEventListener('click', () => togglePassword('update_password_password', 'eye-icon-new'));
//     document.getElementById('toggle-confirm-password').addEventListener('click', () => togglePassword('update_password_password_confirmation', 'eye-icon-confirm'));
// });



document.addEventListener("DOMContentLoaded", function () {
    // Function to toggle password visibility
    const togglePassword = (inputId, iconId) => {
        const passwordInput = document.getElementById(inputId);
        const eyeIcon = document.getElementById(iconId);

        if (passwordInput && eyeIcon) { // Check if both elements exist
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                eyeIcon.classList.replace('fa-eye', 'fa-eye-slash');
                eyeIcon.classList.add('text-blue-600');
            } else {
                passwordInput.type = 'password';
                eyeIcon.classList.replace('fa-eye-slash', 'fa-eye');
                eyeIcon.classList.remove('text-blue-600');
            }
        }
    };

    // Add event listeners to each toggle icon if the elements exist
    const currentPasswordToggle = document.getElementById('toggle-current-password');
    const newPasswordToggle = document.getElementById('toggle-new-password');
    const confirmPasswordToggle = document.getElementById('toggle-confirm-password');
    const passwordToggle = document.getElementById('toggle-password-visibility');

    if (currentPasswordToggle) {
        currentPasswordToggle.addEventListener('click', () => togglePassword('update_password_current_password', 'eye-icon-current'));
    }

    if (newPasswordToggle) {
        newPasswordToggle.addEventListener('click', () => togglePassword('update_password_password', 'eye-icon-new'));
    }

    if (confirmPasswordToggle) {
        confirmPasswordToggle.addEventListener('click', () => togglePassword('update_password_password_confirmation', 'eye-icon-confirm'));
    }

    if (passwordToggle) {
        passwordToggle.addEventListener('click', () => togglePassword('password', 'eye-icon'));
    }
});


