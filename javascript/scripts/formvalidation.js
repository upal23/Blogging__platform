const form = document.getElementById('validationForm');
const nameInput = document.getElementById('name');
const emailInput = document.getElementById('email');
const messageInput = document.getElementById('message');

const nameError = document.getElementById('name-error');
const emailError = document.getElementById('email-error');
const messageError = document.getElementById('message-error');
const successMessage = document.getElementById('success-message');

// Live validation
nameInput.addEventListener('input', validateName);
emailInput.addEventListener('input', validateEmail);
messageInput.addEventListener('input', validateMessage);

form.addEventListener('submit', function (e) {
    e.preventDefault();
    const valid = validateName() & validateEmail() & validateMessage();
    if (valid) {
        successMessage.classList.remove('hidden');
        form.reset();
    } else {
        successMessage.classList.add('hidden');
    }
});

function validateName() {
    const isValid = nameInput.value.trim().length >= 3;
    nameError.classList.toggle('hidden', isValid);
    return isValid;
}

function validateEmail() {
    const pattern = /^[a-zA-Z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$/;
    const isValid = pattern.test(emailInput.value.trim());
    emailError.classList.toggle('hidden', isValid);
    return isValid;
}

function validateMessage() {
    const isValid = messageInput.value.trim().length >= 10;
    messageError.classList.toggle('hidden', isValid);
    return isValid;
}
