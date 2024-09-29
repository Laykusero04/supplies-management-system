<div id="sidebar" class="sidebar">
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
            <a href="user_dashboard.php" class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'supplier_dashboard.php' ? 'active' : 'link-dark'; ?>">
                <i class="fas fa-tachometer-alt me-2"></i>
                Dashboard
            </a>
        </li>
        <li>
            <a href="manage_inventory.php" class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'manage_inventory.php' ? 'active' : 'link-dark'; ?>">
                <i class="fas fa-box me-2"></i>
                Manage Inventory
            </a>
        </li>
        <li>
            <a href="manage_orders.php" class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'manage_orders.php' ? 'active' : 'link-dark'; ?>">
                <i class="fas fa-shopping-cart me-2"></i>
                Manage Orders
            </a>
        </li>
        <li>
            <a href="view_contracts.php" class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'view_contracts.php' ? 'active' : 'link-dark'; ?>">
                <i class="fas fa-file-contract me-2"></i>
                View Contracts
            </a>
        </li>
        <li>
            <a href="payment_history.php" class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'payment_history.php' ? 'active' : 'link-dark'; ?>">
                <i class="fas fa-money-bill-wave me-2"></i>
                Payment History
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