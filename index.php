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
                        <span class="brand-subtitle">Good Food • Pure Ingredients • Happy Customers</span>
                    </div>
                </div>
                <div class="header-profile">
                    <div class="notification-bell">
                        <i class="fa-regular fa-bell"></i>
                        <span class="notification-dot"></span>
                    </div>
                    <div class="restaurant-profile">
                        <img src="https://ui-avatars.com/api/?name=Admin&background=0F4C3A&color=fff" alt="Profile" class="profile-img">
                        <div class="profile-info">
                            <span class="profile-name">Restaurant Admin</span>
                            <span class="profile-role">Manager <i class="fa-solid fa-chevron-down" style="font-size: 0.7rem; margin-left: 2px;"></i></span>
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
                            <i class="fa-solid fa-bag-shopping"></i> <span>Orders</span>
                            <span class="nav-badge">3</span>
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
                        <div class="nav-spacer"></div>
                        <a href="#" class="nav-item logout">
                            <i class="fa-solid fa-arrow-right-from-bracket"></i> <span>Logout</span>
                        </a>
                    </nav>
                </aside>

            <!-- Main Content -->
            <main class="main-content">
                
                <!-- Header -->
                <header class="top-header">
                    <div class="welcome-text">
                        <p class="welcome-greeting">Welcome Back,</p>
                        <h2 class="welcome-title">Restaurant Admin 👋</h2>
                        <p class="welcome-subtitle">Here's what's happening with your restaurant today.</p>
                    </div>
                    <div class="date-picker-card">
                        <div class="date-icon">
                            <i class="fa-regular fa-calendar"></i>
                        </div>
                        <div class="date-info">
                            <span class="date-label">Today</span>
                            <span class="date-value">Apr 26, 2025</span>
                        </div>
                        <i class="fa-solid fa-chevron-down date-chevron"></i>
                    </div>
                </header>

                <!-- Stat Cards -->
                <div class="stat-cards-grid">
                    <div class="stat-card">
                        <div class="stat-icon icon-green">
                            <i class="fa-solid fa-store"></i>
                        </div>
                        <div class="stat-details">
                            <p class="stat-label">Today's Sales</p>
                            <h3 class="stat-value text-green">Rs. 48,650</h3>
                            <span class="stat-trend trend-up"><i class="fa-solid fa-arrow-up"></i> 12%</span>
                        </div>
                        <div class="stat-chart-mini green-chart">
                            <svg viewBox="0 0 100 40" preserveAspectRatio="none"><path d="M0,40 Q10,35 20,38 T40,30 T60,35 T80,20 T100,5 L100,40 Z" fill="rgba(16, 185, 129, 0.15)"/><path d="M0,40 Q10,35 20,38 T40,30 T60,35 T80,20 T100,5" fill="none" stroke="#10b981" stroke-width="2"/></svg>
                        </div>
                    </div>

                    <div class="stat-card">
                        <div class="stat-icon icon-blue">
                            <i class="fa-solid fa-file-invoice"></i>
                        </div>
                        <div class="stat-details">
                            <p class="stat-label">Total Orders</p>
                            <h3 class="stat-value text-blue">128</h3>
                            <span class="stat-trend trend-up"><i class="fa-solid fa-arrow-up"></i> 18%</span>
                        </div>
                        <div class="stat-chart-mini blue-chart">
                            <svg viewBox="0 0 100 40" preserveAspectRatio="none"><path d="M0,40 Q20,30 40,35 T80,20 T100,15 L100,40 Z" fill="rgba(59, 130, 246, 0.15)"/><path d="M0,40 Q20,30 40,35 T80,20 T100,15" fill="none" stroke="#3b82f6" stroke-width="2"/></svg>
                        </div>
                    </div>

                    <div class="stat-card">
                        <div class="stat-icon icon-orange">
                            <i class="fa-solid fa-clock"></i>
                        </div>
                        <div class="stat-details">
                            <p class="stat-label">Pending Orders</p>
                            <h3 class="stat-value text-orange">24</h3>
                            <span class="stat-trend trend-up"><i class="fa-solid fa-arrow-up"></i> 5%</span>
                        </div>
                        <div class="stat-chart-mini orange-chart">
                            <svg viewBox="0 0 100 40" preserveAspectRatio="none"><path d="M0,40 Q20,35 40,30 T80,25 T100,20 L100,40 Z" fill="rgba(245, 158, 11, 0.15)"/><path d="M0,40 Q20,35 40,30 T80,25 T100,20" fill="none" stroke="#f59e0b" stroke-width="2"/></svg>
                        </div>
                    </div>

                    <div class="stat-card">
                        <div class="stat-icon icon-red">
                            <i class="fa-solid fa-circle-exclamation"></i>
                        </div>
                        <div class="stat-details">
                            <p class="stat-label">Unpaid Orders</p>
                            <h3 class="stat-value text-red">18</h3>
                            <span class="stat-trend trend-down"><i class="fa-solid fa-arrow-down"></i> 3%</span>
                        </div>
                        <div class="stat-chart-mini red-chart">
                            <svg viewBox="0 0 100 40" preserveAspectRatio="none"><path d="M0,40 Q20,25 40,35 T80,20 T100,25 L100,40 Z" fill="rgba(239, 68, 68, 0.15)"/><path d="M0,40 Q20,25 40,35 T80,20 T100,25" fill="none" stroke="#ef4444" stroke-width="2"/></svg>
                        </div>
                    </div>
                </div>

                <!-- Dashboard Analytics Grid -->
                <div class="dashboard-analytics-grid">
                    <!-- Charts Section -->
                    <div class="card">
                        <div class="card-header">
                            <h3><i class="fa-solid fa-chart-simple" style="color:#10b981; margin-right:8px;"></i> Sales Overview</h3>
                            <select class="filter-dropdown">
                                <option>This Week</option>
                                <option>This Month</option>
                            </select>
                        </div>
                        <div class="chart-container" style="height: 220px; display: flex; align-items: flex-end; position: relative;">
                            <svg viewBox="0 0 100 50" preserveAspectRatio="none" style="width: 100%; height: 100%;"><path d="M0,50 L0,40 Q15,30 25,35 T50,20 T70,10 T85,15 T100,20 L100,50 Z" fill="rgba(16, 185, 129, 0.1)"/><path d="M0,40 Q15,30 25,35 T50,20 T70,10 T85,15 T100,20" fill="none" stroke="#10b981" stroke-width="1.5"/></svg>
                        </div>
                    </div>

                    <!-- Top Selling Items -->
                    <div class="card">
                        <div class="card-header">
                            <h3><i class="fa-solid fa-bag-shopping" style="color:#10b981; margin-right:8px;"></i> Top Selling Items</h3>
                        </div>
                        <ul class="top-items-list">
                            <li><span class="item-rank">1</span><img src="https://ui-avatars.com/api/?name=Biryani&background=F59E0B&color=fff&rounded=true" class="item-img"><span class="item-name">Chicken Biryani</span><span class="item-count badge-green">56</span></li>
                            <li><span class="item-rank">2</span><img src="https://ui-avatars.com/api/?name=Karahi&background=EF4444&color=fff&rounded=true" class="item-img"><span class="item-name">Chicken Karahi</span><span class="item-count badge-green">42</span></li>
                            <li><span class="item-rank">3</span><img src="https://ui-avatars.com/api/?name=Kabab&background=8B4513&color=fff&rounded=true" class="item-img"><span class="item-name">Seekh Kabab</span><span class="item-count badge-green">38</span></li>
                            <li><span class="item-rank">4</span><img src="https://ui-avatars.com/api/?name=Naan&background=F3C082&color=fff&rounded=true" class="item-img"><span class="item-name">Naan</span><span class="item-count badge-green">35</span></li>
                            <li><span class="item-rank">5</span><img src="https://ui-avatars.com/api/?name=Beef&background=A52A2A&color=fff&rounded=true" class="item-img"><span class="item-name">Beef Karahi</span><span class="item-count badge-green">26</span></li>
                        </ul>
                    </div>

                    <!-- Order Status Pie Chart -->
                    <div class="card">
                        <div class="card-header">
                            <h3><i class="fa-solid fa-chart-pie" style="color:#10b981; margin-right:8px;"></i> Order Status</h3>
                        </div>
                        <div class="order-status-container">
                            <div class="donut-chart">
                                <div class="donut-inner">
                                    <span class="donut-val">128</span>
                                    <span class="donut-lbl">Total Orders</span>
                                </div>
                            </div>
                            <ul class="status-legend">
                                <li><span class="dot" style="background: #f59e0b;"></span> <span class="legend-lbl">Pending</span> <span class="legend-val">24</span> <span class="legend-pct">(19%)</span></li>
                                <li><span class="dot" style="background: #3b82f6;"></span> <span class="legend-lbl">Preparing</span> <span class="legend-val">36</span> <span class="legend-pct">(28%)</span></li>
                                <li><span class="dot" style="background: #10b981;"></span> <span class="legend-lbl">Ready</span> <span class="legend-val">28</span> <span class="legend-pct">(22%)</span></li>
                                <li><span class="dot" style="background: #6b7280;"></span> <span class="legend-lbl">Served</span> <span class="legend-val">22</span> <span class="legend-pct">(17%)</span></li>
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
    <script src="assets/js/app.js?v=<?php echo time(); ?>"></script>
</body>
</html>
