// Select DOM elements
const toggleSidebarBtn = document.querySelector('.toggle-sidebar');
const closeSidebarBtn = document.querySelector('.close-sidebar');
const sidebar = document.querySelector('.sidebar');
const overlay = document.querySelector('.overlay');

// Toggle sidebar when button is clicked
toggleSidebarBtn.addEventListener('click', () => {
  sidebar.classList.toggle('active');
  overlay.classList.toggle('active');
});

// Close sidebar when button is clicked
closeSidebarBtn.addEventListener('click', () => {
  sidebar.classList.remove('active');
  overlay.classList.remove('active');
});

// Close sidebar when overlay is clicked
overlay.addEventListener('click', () => {
  sidebar.classList.remove('active');
  overlay.classList.remove('active');
});

// Expand/collapse submenus
const submenus = document.querySelectorAll('.has-submenu');
submenus.forEach((submenu) => {
  submenu.addEventListener('click', () => {
    submenu.classList.toggle('open');
    const dropdown = submenu.querySelector('.submenu-dropdown');
    dropdown.classList.toggle('active');
  });
});

// Show active submenu
const currentURL = window.location.href;
const links = document.querySelectorAll('.sidebar-link');
links.forEach((link) => {
  if (link.href === currentURL) {
    link.classList.add('active');
    const submenu = link.closest('.has-submenu');
    submenu.classList.add('open');
    const dropdown = submenu.querySelector('.submenu-dropdown');
    dropdown.classList.add('active');
  }
});
