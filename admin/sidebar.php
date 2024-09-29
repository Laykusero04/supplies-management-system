<div id="sidebar" class="sidebar">

    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
            <a href="admin_dashboard.php" class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'admin_dashboard.php' ? 'active' : 'link-dark'; ?>">
                <i class="fas fa-tachometer-alt me-2"></i>
                Dashboard
            </a>
        </li>
        <li>
            <a href="manage_contracts.php" class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'manage_contracts.php' ? 'active' : 'link-dark'; ?>">
                <i class="fas fa-file-contract me-2"></i>
                Manage Contracts
            </a>
        </li>
        <li>
            <a href="manage_supplies.php" class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'manage_supplies.php' ? 'active' : 'link-dark'; ?>">
                <i class="fas fa-box me-2"></i>
                Manage Supplies
            </a>
        </li>
        <li>
            <a href="manage_companies.php" class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'manage_companies.php' ? 'active' : 'link-dark'; ?>">
                <i class="fas fa-building me-2"></i>
                Manage Companies
            </a>
        </li>
        <li>
            <a href="manage_payments.php" class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'manage_payments.php' ? 'active' : 'link-dark'; ?>">
                <i class="fas fa-money-bill-wave me-2"></i>
                Manage Payments
            </a>
        </li>
        <li>
            <a href="manage_users.php" class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'manage_users.php' ? 'active' : 'link-dark'; ?>">
                <i class="fas fa-users me-2"></i>
                Manage Users
            </a>
        </li>
    </ul>
    <hr>
    <div class="dropdown pb-4 ps-4">
        <a href="#" class="d-flex align-items-center link-dark text-decoration-none dropdown-toggle" id="dropdownUser2" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2">
            <strong><?php echo htmlspecialchars($user_name); ?></strong>
        </a>
        <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser2">
            <li><a class="dropdown-item" href="#">Profile</a></li>
            <li><a class="dropdown-item" href="#">Settings</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="logout.php">Sign out</a></li>
        </ul>
    </div>
</div>