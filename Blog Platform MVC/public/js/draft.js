const form = document.getElementById('draft-form');
const titleInput = document.getElementById('title');
const contentInput = document.getElementById('content');
const status = document.getElementById('status');

// Load saved draft
fetch('../controllers/DraftController.php')
    .then(res => res.json())
    .then(data => {
        if (data) {
            titleInput.value = data.title || '';
            contentInput.value = data.content || '';
        }
    });

let timeout;

form.addEventListener('input', () => {
    clearTimeout(timeout);
    timeout = setTimeout(() => {
        const formData = new FormData(form);
        fetch('../controllers/DraftController.php', {
            method: 'POST',
            body: formData
        }).then(() => {
            status.textContent = "Draft saved at " + new Date().toLocaleTimeString();
        });
    }, 2000); // Save after 2 seconds of inactivity
});
