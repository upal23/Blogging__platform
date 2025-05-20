let subscribers = JSON.parse(localStorage.getItem('newsletterSubscribers') || '[]');
document.getElementById("count").textContent = subscribers.length;

function validateEmail(email) {
    return /^[^@\\s]+@[^@\\s]+\\.[^@\\s]+$/.test(email);
}

function subscribe() {
    const emailInput = document.getElementById("email");
    const email = emailInput.value.trim();
    const consent = document.getElementById("gdpr").checked;
    const message = document.getElementById("message");

    if (!validateEmail(email)) {
        showMessage("Please enter a valid email address.", "error");
        return;
    }

    if (!consent) {
        showMessage("You must agree to the GDPR policy.", "error");
        return;
    }

    if (subscribers.includes(email)) {
        showMessage("This email is already subscribed.", "error");
        return;
    }

    subscribers.push(email);
    localStorage.setItem('newsletterSubscribers', JSON.stringify(subscribers));
    document.getElementById("count").textContent = subscribers.length;
    emailInput.value = "";
    document.getElementById("gdpr").checked = false;
    showMessage("A confirmation email has been sent. Please confirm your subscription.", "success");
}

function showMessage(text, type) {
    const msg = document.getElementById("message");
    msg.textContent = text;
    msg.className = `message ${type}`;
}

function exportEmails() {
    const exported = document.getElementById("exported");
    exported.style.display = "block";
    exported.textContent = subscribers.length ? subscribers.join("\\n") : "No subscribers yet.";
}
