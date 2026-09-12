// Common SPA Logic
let currentCategoryId = null;

function switchView(viewId, element) {
    // Hide all views
    const views = document.querySelectorAll('.view');
    views.forEach(view => {
        view.classList.remove('active');
        view.style.display = 'none'; // Ensure display is updated for flex views
    });

    // Update Sidebar Active state
    if (element) {
        document.querySelectorAll('.sidebar-nav .nav-item').forEach(el => el.classList.remove('active'));
        element.classList.add('active');
    }

    // Show the requested view
    const targetView = document.getElementById(viewId);
    if (targetView) {
        targetView.classList.add('active');
        targetView.style.display = 'flex';
        
        if (viewId === 'view-admin-menu') {
            loadMenuData();
        }
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

// Modal Logic
function openModal(modalId) {
    document.getElementById(modalId).classList.add('active');
}

function closeModal(modalId) {
    document.getElementById(modalId).classList.remove('active');
}

// ==========================================
// MENU MANAGEMENT LOGIC
// ==========================================
let allMenuItems = [];

function loadMenuData() {
    // Fetch Categories
    fetch('api/categories.php')
        .then(res => res.json())
        .then(data => {
            if (data.status === 'success') {
                renderCategories(data.data);
            } else {
                console.error("Categories fetch error:", data.message);
                // alert(data.message);
            }
        }).catch(err => console.error(err));

    // Fetch Items
    fetch('api/menu_items.php')
        .then(res => res.json())
        .then(data => {
            if (data.status === 'success') {
                allMenuItems = data.data;
                if (currentCategoryId) {
                    renderItems(currentCategoryId);
                }
            } else {
                console.error("Menu items fetch error:", data.message);
            }
        }).catch(err => console.error(err));
}

function renderCategories(categories) {
    const list = document.getElementById('category-list');
    list.innerHTML = '';
    categories.forEach(cat => {
        const li = document.createElement('li');
        li.textContent = cat.name;
        li.onclick = () => selectCategory(cat.id, cat.name, li);
        if (cat.id == currentCategoryId) li.classList.add('active');
        list.appendChild(li);
    });
}

function selectCategory(id, name, element) {
    currentCategoryId = id;
    document.querySelectorAll('.category-list li').forEach(li => li.classList.remove('active'));
    if(element) element.classList.add('active');
    
    document.getElementById('current-category-title').textContent = name;
    document.getElementById('btn-add-item').style.display = 'block';
    
    renderItems(id);
}

function renderItems(categoryId) {
    const grid = document.getElementById('menu-items-grid');
    grid.innerHTML = '';
    const filtered = allMenuItems.filter(item => item.category_id == categoryId);
    
    filtered.forEach(item => {
        let offerHtml = '';
        if (item.offer_price) {
            offerHtml = `<div class="menu-item-offer">Offer: Rs. ${item.offer_price}</div>`;
        }
        
        const imgSrc = item.image_url ? item.image_url : 'https://placehold.co/400x200?text=No+Image';
        
        grid.innerHTML += `
            <div class="menu-item-card">
                <img src="${imgSrc}" class="menu-item-img" alt="${item.name}">
                <div class="menu-item-name">${item.name}</div>
                <div class="menu-item-price">Rs. ${item.price}</div>
                <div class="menu-item-desc">${item.short_description || ''}</div>
                ${offerHtml}
                <div class="menu-item-actions">
                    <button class="btn-secondary" onclick="editItem(${item.id})" style="flex:1;">Edit</button>
                    <button class="btn-secondary" onclick="openOfferModal(${item.id}, ${item.offer_price || "''"})" style="flex:1;">Offer</button>
                </div>
            </div>
        `;
    });
}

function saveCategory() {
    const name = document.getElementById('cat-name').value;
    if (!name) return alert('Name is required');

    const formData = new FormData();
    formData.append('name', name);

    fetch('api/categories.php', {
        method: 'POST',
        body: formData
    }).then(res => res.json()).then(data => {
        if (data.status === 'success') {
            document.getElementById('cat-name').value = '';
            closeModal('modal-category');
            loadMenuData();
        } else {
            alert(data.message);
        }
    });
}

function saveItem(e) {
    e.preventDefault();
    const form = document.getElementById('form-item');
    document.getElementById('item-category-id').value = currentCategoryId;
    
    const formData = new FormData(form);

    fetch('api/menu_items.php', {
        method: 'POST',
        body: formData
    }).then(res => res.json()).then(data => {
        if (data.status === 'success') {
            closeModal('modal-item');
            form.reset();
            loadMenuData();
        } else {
            alert(data.message);
        }
    });
}

function editItem(id) {
    const item = allMenuItems.find(i => i.id == id);
    if (!item) return;

    document.getElementById('modal-item-title').textContent = 'Edit Menu Item';
    document.getElementById('item-action').value = 'edit';
    document.getElementById('item-id').value = item.id;
    document.getElementById('item-name').value = item.name;
    document.getElementById('item-price').value = item.price;
    document.getElementById('item-desc').value = item.short_description || '';
    
    openModal('modal-item');
}

function openOfferModal(itemId, currentOfferPrice) {
    document.getElementById('offer-item-id').value = itemId;
    document.getElementById('offer-price').value = currentOfferPrice || '';
    openModal('modal-offer');
}

function saveOffer(e) {
    e.preventDefault();
    const form = document.getElementById('form-offer');
    const formData = new FormData(form);

    fetch('api/menu_items.php', {
        method: 'POST',
        body: formData
    }).then(res => res.json()).then(data => {
        if (data.status === 'success') {
            closeModal('modal-offer');
            form.reset();
            loadMenuData();
        } else {
            alert(data.message);
        }
    });
}
