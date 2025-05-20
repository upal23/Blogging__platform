// Usage: error.html?type=404 or error.html?type=500
const params = new URLSearchParams(window.location.search);
const type = params.get('type') || '404';

document.getElementById('error-404').classList.add('hidden');
document.getElementById('error-500').classList.add('hidden');

if (type === '500') {
    document.getElementById('error-500').classList.remove('hidden');
} else {
    document.getElementById('error-404').classList.remove('hidden');
}

function goHome() {
    window.location.href = "index.html";
}

function goToContact() {
    window.location.href = "contact.html";
}
