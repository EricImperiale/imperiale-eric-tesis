function toggleDropdown(id) {
    const dropdown = document.getElementById(id);
    dropdown.classList.toggle('hidden');
}

function toggleSidebar() {
    const sidebar = document.getElementById('sidebar');
    const menuToggle = document.getElementById('menuToggle');
    sidebar.classList.toggle('-translate-x-full');
    menuToggle.classList.toggle('is-active');
}

function toggleUserMenu() {
    const userMenu = document.querySelector('.user-menu');
    userMenu.classList.toggle('show');
}

window.addEventListener('click', function(event) {
    const userMenu = document.querySelector('.user-menu');
    const userMenuButton = document.querySelector('[onclick="toggleUserMenu()"]');
    if (!userMenu.contains(event.target) && !userMenuButton.contains(event.target)) {
        userMenu.classList.remove('show');
    }
});

const alertSuccess = document.querySelector('#alert-success');

setInterval(() => {
    alertSuccess.classList.add('hidden');
}, 3000);
