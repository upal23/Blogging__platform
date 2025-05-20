// Generate a simple math CAPTCHA
function generateCaptcha() {
    const num1 = Math.floor(Math.random() * 10) + 1;
    const num2 = Math.floor(Math.random() * 10) + 1;
    const operators = ['+', '-', '*'];
    const operator = operators[Math.floor(Math.random() * operators.length)];

    const question = `${num1} ${operator} ${num2}`;
    let answer;
    switch (operator) {
        case '+': answer = num1 + num2; break;
        case '-': answer = num1 - num2; break;
        case '*': answer = num1 * num2; break;
    }

    return { question, answer };
}

const captchaData = generateCaptcha();
document.getElementById('captcha-question').innerText = captchaData.question;

document.getElementById('contactForm').addEventListener('submit', function (e) {
    e.preventDefault();

    const userAnswer = document.getElementById('captcha').value.trim();
    if (parseInt(userAnswer) !== captchaData.answer) {
        alert('CAPTCHA verification failed. Please try again.');
        return;
    }

    const name = document.getElementById('name').value;
    const email = document.getElementById('email').value;
    const message = document.getElementById('message').value;

    console.log("Simulated send to admin inbox:", { name, email, message });

    document.getElementById('form-container').classList.add('hidden');
    document.getElementById('confirmation-container').classList.remove('hidden');

    alert('A confirmation email has been sent to your inbox (mock).');
});
