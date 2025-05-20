document.addEventListener('DOMContentLoaded', () => {
    const currentUser = localStorage.getItem('loggedInUser');
    const users = JSON.parse(localStorage.getItem('users') || '{}');

    if (!currentUser || users[currentUser]?.role !== 'admin') {
        alert("Access denied. Admins only.");
        window.location.href = "login.html";
        return;
    }

    renderUserTable(users);
    renderPostList();
});

function renderUserTable(users) {
    const tbody = document.querySelector("#user-table tbody");
    tbody.innerHTML = '';

    Object.keys(users).forEach(username => {
        const role = users[username].role || 'user';
        const row = document.createElement('tr');

        row.innerHTML = `
        <td>${username}</td>
        <td>
          <select onchange="updateUserRole('${username}', this.value)">
            <option value="user" ${role === 'user' ? 'selected' : ''}>User</option>
            <option value="editor" ${role === 'editor' ? 'selected' : ''}>Editor</option>
            <option value="admin" ${role === 'admin' ? 'selected' : ''}>Admin</option>
          </select>
        </td>
        <td><button onclick="deleteUser('${username}')">Delete</button></td>
      `;
        tbody.appendChild(row);
    });
}

function updateUserRole(username, role) {
    const users = JSON.parse(localStorage.getItem('users') || '{}');
    if (users[username]) {
        users[username].role = role;
        localStorage.setItem('users', JSON.stringify(users));
        alert(`Role updated for ${username}`);
    }
}

function deleteUser(username) {
    const users = JSON.parse(localStorage.getItem('users') || '{}');
    if (confirm(`Are you sure you want to delete ${username}?`)) {
        delete users[username];
        localStorage.setItem('users', JSON.stringify(users));
        renderUserTable(users);
    }
}

function renderPostList() {
    const posts = JSON.parse(localStorage.getItem('posts') || '[]');
    const list = document.getElementById('post-list');
    list.innerHTML = posts.length === 0 ? '<li>No posts available</li>' : '';

    posts.forEach((post, index) => {
        const li = document.createElement('li');
        li.textContent = `${post.title} by ${post.author}`;
        list.appendChild(li);
    });
}
