const posts = JSON.parse(localStorage.getItem('posts') || '[]');

function groupPostsByDate(posts) {
    const archive = {};

    posts.forEach(post => {
        const date = new Date(post.date || new Date());
        const year = date.getFullYear();
        const month = date.toLocaleString('default', { month: 'long' });

        if (!archive[year]) archive[year] = {};
        if (!archive[year][month]) archive[year][month] = [];

        archive[year][month].push(post);
    });

    return archive;
}

function renderArchive(archive) {
    const container = document.getElementById('archive-list');
    container.innerHTML = '';

    Object.keys(archive).sort((a, b) => b - a).forEach(year => {
        const yearDiv = document.createElement('div');
        yearDiv.className = 'archive-year';
        yearDiv.textContent = year;
        const monthsDiv = document.createElement('div');
        monthsDiv.style.display = 'none';

        yearDiv.onclick = () => {
            monthsDiv.style.display = monthsDiv.style.display === 'none' ? 'block' : 'none';
        };

        Object.keys(archive[year]).reverse().forEach(month => {
            const monthDiv = document.createElement('div');
            monthDiv.className = 'archive-month';
            monthDiv.textContent = month;
            const postList = document.createElement('ul');
            postList.className = 'archive-posts';
            postList.style.display = 'none';

            monthDiv.onclick = () => {
                postList.style.display = postList.style.display === 'none' ? 'block' : 'none';
            };

            archive[year][month].forEach(post => {
                const li = document.createElement('li');
                li.textContent = `${post.title} — by ${post.author}`;
                postList.appendChild(li);
            });

            monthsDiv.appendChild(monthDiv);
            monthsDiv.appendChild(postList);
        });

        container.appendChild(yearDiv);
        container.appendChild(monthsDiv);
    });
}

// Initialize
const archiveData = groupPostsByDate(posts);
renderArchive(archiveData);
