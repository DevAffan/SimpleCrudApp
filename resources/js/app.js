import './bootstrap';

import Alpine from 'alpinejs';

import '@fortawesome/fontawesome-free/css/all.min.css';


window.Alpine = Alpine;

Alpine.start();



// hide the success message after 3 seconds
setTimeout(function() {
    const message = document.getElementById('success-message');
    const errormessage = document.getElementById('error-message');

    if (message) {
        message.style.display = 'none'; // Hides the message
    }

    if(errormessage){
        errormessage.style.display = 'none'; // Hides the errormessage
    }

}, 3000); // 3 seconds

// hide adn show password Functionality - eye icons
document.addEventListener("DOMContentLoaded", function () {
    // Function to toggle password visibility
    const togglePassword = (inputId, iconId) => {
        const passwordInput = document.getElementById(inputId);
        const eyeIcon = document.getElementById(iconId);

        if (passwordInput && eyeIcon) { // Checking if both elements exist
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
    const passwordToggleCon = document.getElementById('password-confirmation');

    // For Profile page - update password
    if (currentPasswordToggle) {
        currentPasswordToggle.addEventListener('click', () => togglePassword('update_password_current_password', 'eye-icon-current'));
    }

    if (newPasswordToggle) {
        newPasswordToggle.addEventListener('click', () => togglePassword('update_password_password', 'eye-icon-new'));
    }

    if (confirmPasswordToggle) {
        confirmPasswordToggle.addEventListener('click', () => togglePassword('update_password_password_confirmation', 'eye-icon-confirm'));
    }

    // For registeration and login page
    if (passwordToggle) {
        passwordToggle.addEventListener('click', () => togglePassword('password', 'eye-icon'));
    }
    if (passwordToggleCon) {
        passwordToggleCon.addEventListener('click', () => togglePassword('password_confirmation', 'eye-icon-confirm'));
    }


    // contact Input - Custom regex Validation
    const contactInput = document.getElementById('contact');
    const contactError = document.getElementById('contact-error');
    const submitButton = document.querySelector('.form-button'); // Selecting the buttons with the class "form-button"

    // Regex patterns
    const numberRegex = /^[0-9]+$/; // Only numbers
    const lengthRegex = /^.{1,15}$/; // Length between 1 and 15 characters
    contactInput.addEventListener('input', function () {
        if (!numberRegex.test(contactInput.value)) {
            contactError.textContent = 'Invalid Number. Only numbers are allowed.'; // error message for invalid characters
            contactError.classList.remove('hidden'); // Show error message
            submitButton.disabled = true; // Disable the button on error
        } else if (!lengthRegex.test(contactInput.value)) {
            contactError.textContent = 'Invalid Number. Maximum 15 digits are allowed.'; // error message for length
            contactError.classList.remove('hidden'); // Show error message
            submitButton.disabled = true; // Disable the button on error
        } else {
            contactError.textContent = ''; // Clear error message
            contactError.classList.add('hidden'); // Hide error message
            submitButton.disabled = false; // Disable the button on error
        }
    });

});

    // Function to show the loader
    function showLoader() {
        document.getElementById('loader').style.display = 'flex'; // Show the loader
    }

    // Function to attach the showLoader function to all forms
    function attachLoaderToForms() {
        // Get all forms on the page
        const forms = document.querySelectorAll('form');
        // Attach the showLoader function to the submit event of each form
        forms.forEach(form => {
            form.addEventListener('submit', function() {
                showLoader(); // Show loader on form submission
            });
        });
    }
    // Show loader when the page starts loading
    // window.addEventListener('beforeunload', function() {
    //     showLoader(); // Show loader on page unload (when navigating away)
    // });
    document.addEventListener('DOMContentLoaded', attachLoaderToForms);

