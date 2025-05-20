const data = JSON.parse(localStorage.getItem('posts') || '[]');

function generateResults(posts) {
    const resultsList = document.getElementById('results-list');
    resultsList.innerHTML = '';

    if (posts.length === 0) {
        resultsList.innerHTML = '<li class="result-item">No posts found.</li>';
        return;
    }

    posts.forEach(post => {
        const item = document.createElement('li');
        item.className = 'result-item';
        item.innerHTML = `
      <h3>${post.title}</h3>
      <p>${post.body}</p>
      <small><strong>Author:</strong> ${post.author} | <strong>Category:</strong> ${post.category || 'Uncategorized'}</small>
    `;
        resultsList.appendChild(item);
    });
}

function filterResults() {
    const keyword = document.getElementById('search-bar').value.toLowerCase();
    const category = document.getElementById('category-filter').value;

    const filtered = data.filter(post => {
        const matchesKeyword =
            post.title.toLowerCase().includes(keyword) ||
            post.body.toLowerCase().includes(keyword);

        const matchesCategory = category ? post.category === category : true;

        return matchesKeyword && matchesCategory;
    });

    generateResults(filtered);
}

function applyFilters() {
    filterResults();
}

generateResults(data);
