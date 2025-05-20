let drafts = JSON.parse(localStorage.getItem('draftHistory') || '[]');
let currentDraft = '';
let lastSavedTime = Date.now();

function autoSaveDraft() {
    const text = document.getElementById('draft-text').value;
    if (text !== currentDraft) {
        currentDraft = text;
        const now = Date.now();
        if (now - lastSavedTime >= 120000) {
            drafts.push({ content: text, time: new Date(now).toLocaleString() });
            localStorage.setItem('draftHistory', JSON.stringify(drafts));
            lastSavedTime = now;
            document.getElementById('status').textContent = `Saved at ${new Date(now).toLocaleString()}`;
            updateVersionHistory();
        }
    }
}

function restoreDraft() {
    if (drafts.length > 0) {
        const last = drafts[drafts.length - 1];
        document.getElementById('draft-text').value = last.content;
        currentDraft = last.content;
        document.getElementById('status').textContent = `Restored last draft from ${last.time}`;
    } else {
        document.getElementById('status').textContent = 'No drafts to restore.';
    }
}

function restoreDraftFromHistory(index) {
    const draft = drafts[index];
    document.getElementById('draft-text').value = draft.content;
    currentDraft = draft.content;
    document.getElementById('status').textContent = `Restored Version ${index + 1} from ${draft.time}`;
}

function updateVersionHistory() {
    const history = document.getElementById('version-history');
    history.innerHTML = '<h3>Version History</h3>';
    drafts.forEach((d, i) => {
        const div = document.createElement('div');
        div.className = 'version-item';
        div.textContent = `Version ${i + 1}: ${d.time}`;
        div.onclick = () => restoreDraftFromHistory(i);
        history.appendChild(div);
    });
}

// Load on page load
updateVersionHistory();
setInterval(autoSaveDraft, 120000);
