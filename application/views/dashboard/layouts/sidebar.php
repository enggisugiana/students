<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="#">Dashboard</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="#">CS</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li><a class="nav-link" href="<?= site_url('dashboard'); ?>"><i class="fas fa-fire"></i> <span>Dashboard</span></a></li>
            <li class="menu-header">Campus Master Data</li>
            <li><a class="nav-link" href="<?= site_url('DashboardController/add_campus'); ?>"><i class="fas fa-university"></i> <span>Input Data Campus</span></a></li>
            <li><a class="nav-link" href="<?= site_url('DashboardController/list_campus'); ?>"><i class="fas fa-table"></i> <span>List of Campus</span></a></li>
            <li class="menu-header">Pages</li>
            <li><a class="nav-link" href="<?= site_url('DashboardController/add_student'); ?>"><i class="fas fa-users"></i> <span>Input of Students</span></a></li>
            <li><a class="nav-link" href="<?= site_url('DashboardController/students'); ?>"><i class="fas fa-table"></i> <span>List Student</span></a></li>
            <li><a class="nav-link" href="#"><i class="fas fa-money-check-alt"></i> <span>Payment</span></a></li>
            <li class="menu-header">Settings</li>
            <li><a class="nav-link" href="<?= base_url() ?>Management"><i class="fas fa-user-plus"></i><span>Users</span></a></li>
            <li><a class="nav-link" href="<?= base_url() ?>Management/profile"><i class="fas fa-user-cog"></i> <span>Profile</span></a></li>
        </ul>

    </aside>
</div>