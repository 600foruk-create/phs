<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bismillah Pak Darbar</title>
    <!-- Common CSS File -->
    <link rel="stylesheet" href="assets/css/style.css?v=<?php echo time(); ?>">
    <!-- Google Fonts for Inter -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <!-- FontAwesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>

    <!-- App Container -->
    <div id="app">

        <!-- ========================================== -->
        <!-- ADMIN DASHBOARD VIEW (Screen 8)            -->
        <!-- ========================================== -->
        <div id="view-admin-dashboard" class="view active admin-layout">
            
            <!-- Top Header -->
            <header class="app-top-header">
                <div class="header-brand">
                    <button id="sidebar-toggle" class="sidebar-toggle-btn">
                        <i class="fa-solid fa-bars"></i>
                    </button>
                    <div class="brand-logo">
                        <i class="fa-solid fa-mosque"></i>
                    </div>
                    <div class="brand-text">
                        <h1>BISMILLAH PAK DARBAR</h1>
                    </div>
                </div>
                <div class="header-profile">
                    <div class="restaurant-profile">
                        <img src="https://ui-avatars.com/api/?name=Admin&background=0F4C3A&color=fff" alt="Profile" class="profile-img">
                        <div class="profile-info">
                            <span class="profile-name">Restaurant Admin</span>
                            <span class="profile-role">Manager</span>
                        </div>
                    </div>
                </div>
            </header>

            <div class="app-body">
                <!-- Sidebar -->
                <aside class="sidebar">
                    <nav class="sidebar-nav">
                        <a href="#" class="nav-item active" onclick="switchView('view-admin-dashboard')">
                            <i class="fa-solid fa-gauge"></i> <span>Dashboard</span>
                        </a>
                        <a href="#" class="nav-item">
                            <i class="fa-solid fa-receipt"></i> <span>Orders</span>
                        </a>
                        <a href="#" class="nav-item">
                            <i class="fa-solid fa-utensils"></i> <span>Menu</span>
                        </a>
                        <a href="#" class="nav-item">
                            <i class="fa-solid fa-qrcode"></i> <span>Tables & QR</span>
                        </a>
                        <a href="#" class="nav-item">
                            <i class="fa-solid fa-users"></i> <span>Staff</span>
                        </a>
                        <a href="#" class="nav-item">
                            <i class="fa-solid fa-credit-card"></i> <span>Payments</span>
                        </a>
                        <a href="#" class="nav-item">
                            <i class="fa-solid fa-chart-line"></i> <span>Reports</span>
                        </a>
                        <a href="#" class="nav-item">
                            <i class="fa-solid fa-gear"></i> <span>Settings</span>
                        </a>
                        <a href="#" class="nav-item">
                            <i class="fa-solid fa-clock-rotate-left"></i> <span>Activity Logs</span>
                        </a>
                        <a href="#" class="nav-item logout">
                            <i class="fa-solid fa-arrow-right-from-bracket"></i> <span>Logout</span>
                        </a>
                    </nav>
                </aside>

            <!-- Main Content -->
            <main class="main-content">
                
                <!-- Header -->
                <header class="top-header">
                    <h2 class="page-title">Dashboard</h2>
                    <div class="date-display" id="current-date">
                        Today: 12 May, 2024
                    </div>
                </header>

                <!-- Stat Cards -->
                <div class="stat-cards-grid">
                    <div class="stat-card">
                        <div class="stat-icon icon-green">
                            <i class="fa-solid fa-money-bill-wave"></i>
                        </div>
                        <div class="stat-details">
                            <p class="stat-label">Today's Sales</p>
                            <h3 class="stat-value text-green">Rs. 48,650</h3>
                        </div>
                    </div>

                    <div class="stat-card">
                        <div class="stat-icon icon-blue">
                            <i class="fa-solid fa-file-invoice"></i>
                        </div>
                        <div class="stat-details">
                            <p class="stat-label">Total Orders</p>
                            <h3 class="stat-value text-blue">128</h3>
                        </div>
                    </div>

                    <div class="stat-card">
                        <div class="stat-icon icon-orange">
                            <i class="fa-solid fa-clock"></i>
                        </div>
                        <div class="stat-details">
                            <p class="stat-label">Pending Orders</p>
                            <h3 class="stat-value text-orange">24</h3>
                        </div>
                    </div>

                    <div class="stat-card">
                        <div class="stat-icon icon-red">
                            <i class="fa-solid fa-circle-exclamation"></i>
                        </div>
                        <div class="stat-details">
                            <p class="stat-label">Unpaid Orders</p>
                            <h3 class="stat-value text-red">18</h3>
                        </div>
                    </div>
                </div>

                <!-- Charts Section -->
                <div class="charts-section">
                    <div class="card full-width">
                        <div class="card-header">
                            <h3>Sales Overview</h3>
                            <select class="filter-dropdown">
                                <option>This Week</option>
                                <option>This Month</option>
                            </select>
                        </div>
                        <div class="chart-container" style="height: 250px; display: flex; align-items: center; justify-content: center; background: #fafafa; border-radius: 8px; border: 1px dashed #ccc; margin-top: 1rem;">
                            <span style="color: #888;">[ Line Chart Placeholder ]</span>
                        </div>
                    </div>
                </div>

                <!-- Bottom Grid -->
                <div class="bottom-grid">
                    <!-- Top Selling Items -->
                    <div class="card">
                        <div class="card-header">
                            <h3>Top Selling Items</h3>
                        </div>
                        <ul class="top-items-list">
                            <li><span class="item-rank">1</span><span class="item-name">Chicken Biryani</span><span class="item-count">56</span></li>
                            <li><span class="item-rank">2</span><span class="item-name">Chicken Karahi</span><span class="item-count">42</span></li>
                            <li><span class="item-rank">3</span><span class="item-name">Seekh Kabab</span><span class="item-count">38</span></li>
                            <li><span class="item-rank">4</span><span class="item-name">Naan</span><span class="item-count">35</span></li>
                            <li><span class="item-rank">5</span><span class="item-name">Beef Karahi</span><span class="item-count">26</span></li>
                        </ul>
                    </div>

                    <!-- Order Status Pie Chart -->
                    <div class="card">
                        <div class="card-header">
                            <h3>Order Status</h3>
                        </div>
                        <div class="order-status-container">
                            <div class="pie-chart-placeholder" style="width: 150px; height: 150px; border-radius: 50%; background: conic-gradient(#10b981 0% 40%, #3b82f6 40% 65%, #f59e0b 65% 85%, #6b7280 85% 100%);"></div>
                            <ul class="status-legend">
                                <li><span class="dot" style="background: #3b82f6;"></span> Pending <span class="count">24</span></li>
                                <li><span class="dot" style="background: #f59e0b;"></span> Preparing <span class="count">36</span></li>
                                <li><span class="dot" style="background: #10b981;"></span> Ready <span class="count">28</span></li>
                                <li><span class="dot" style="background: #6b7280;"></span> Served <span class="count">22</span></li>
                                <li><span class="dot" style="background: #ef4444;"></span> Cancelled <span class="count">18</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </main>
            </div>
        </div>

        <!-- Future views will be added here (e.g., view-customer-menu, view-kitchen) -->

    </div>

    <!-- Common JS File -->
    <script src="assets/js/app.js"></script>
</body>
</html>
