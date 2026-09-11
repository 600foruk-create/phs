// Common SPA Logic

/**
 * Switches the active view in the Single Page Application
 * @param {string} viewId - The ID of the view to show (e.g., 'view-admin-dashboard')
 */
function switchView(viewId) {
    // Hide all views
    const views = document.querySelectorAll('.view');
    views.forEach(view => {
        view.classList.remove('active');
    });

    // Show the requested view
    const targetView = document.getElementById(viewId);
    if (targetView) {
        targetView.classList.add('active');
    }
}

// Initial setup on load
document.addEventListener('DOMContentLoaded', () => {
    // Set current date in admin dashboard
    const dateDisplay = document.getElementById('current-date');
    if (dateDisplay) {
        const options = { day: 'numeric', month: 'short', year: 'numeric' };
        dateDisplay.textContent = 'Today: ' + new Date().toLocaleDateString('en-GB', options);
    }

    // Sidebar Toggle Logic
    const sidebarToggleBtn = document.getElementById('sidebar-toggle');
    const sidebar = document.querySelector('.sidebar');
    
    if (sidebarToggleBtn && sidebar) {
        sidebarToggleBtn.addEventListener('click', () => {
            sidebar.classList.toggle('collapsed');
        });
    }
});
