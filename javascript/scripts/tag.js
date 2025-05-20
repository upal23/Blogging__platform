let tags = JSON.parse(localStorage.getItem('tags') || '[]');
let allTags = JSON.parse(localStorage.getItem('allTags') || '{}');

function saveState() {
    localStorage.setItem('tags', JSON.stringify(tags));
    localStorage.setItem('allTags', JSON.stringify(allTags));
}

function addTags() {
    const input = document.getElementById('post-tags');
    const newTags = input.value.trim().split(/\s*,\s*/).map(tag => tag.toLowerCase().replace('#', '').trim());
    input.value = '';

    newTags.forEach(tag => {
        if (tag && !tags.includes(tag)) {
            tags.push(tag);
            trackTag(tag);
        }
    });

    saveState();
    updateTagCloud();
    updateTagManager();
}

function trackTag(tag) {
    if (!allTags[tag]) {
        allTags[tag] = { count: 1 };
    } else {
        allTags[tag].count += 1;
    }
}

function updateTagCloud() {
    const cloud = document.getElementById('tag-cloud');
    cloud.innerHTML = '';
    tags.forEach(tag => {
        const el = document.createElement('span');
        el.textContent = `#${tag}`;
        el.onclick = () => alert(`Mock: Showing posts for #${tag}`);
        cloud.appendChild(el);
    });
}

function updateTagManager() {
    const manager = document.getElementById('tag-manager');
    manager.innerHTML = '';
    tags.forEach(tag => {
        const el = document.createElement('div');
        el.className = 'tag-item';
        el.textContent = `#${tag}`;
        el.onclick = () => mergeTag(tag);
        manager.appendChild(el);
    });
}

function mergeTag(tag) {
    const mergeWith = prompt(`Merge #${tag} with:`);
    const lower = mergeWith?.toLowerCase();
    if (lower && allTags[lower]) {
        alert(`Merged #${tag} with #${lower}`);
        delete allTags[tag];
        tags = tags.filter(t => t !== tag);
        saveState();
        updateTagCloud();
        updateTagManager();
    } else {
        alert('Tag to merge not found.');
    }
}

// Load on startup
updateTagCloud();
updateTagManager();
