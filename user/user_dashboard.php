<?php
session_start();

// Check if user is logged in and is a supplier
if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] != 2) {
    header("Location: index.php");
    exit();
}

$user_name = $_SESSION['user_name'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supplier Dashboard - Contract Project Supplies Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../style/sidebar.css">
</head>
<body>
    <?php include 'navbar.php'; ?>

    <main>
        <?php include 'sidebar.php'; ?>

        <div id="content" class="content">
            <div class="container-fluid">
                <h1 class="mb-4">Welcome, <?php echo htmlspecialchars($user_name); ?>!</h1>
                <p class="lead">This is the supplier dashboard for the Contract Project Supplies Management System.</p>

                <div class="row mt-4">
                    <div class="col-md-3 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Total Inventory</h5>
                                <p class="card-text display-4">1,234</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Active Orders</h5>
                                <p class="card-text display-4">56</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Pending Deliveries</h5>
                                <p class="card-text display-4">12</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Total Revenue</h5>
                                <p class="card-text display-4">₱15,678</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-md-6 mb-4">
                        <div class="card">
                            <div class="card-header">
                                Recent Activities
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">New order received: Order #12345</li>
                                <li class="list-group-item">Inventory updated: Product XYZ</li>
                                <li class="list-group-item">Payment received for Order #54321</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-6 mb-4">
                        <div class="card">
                            <div class="card-header">
                                Quick Actions
                            </div>
                            <div class="card-body">
                                <a href="#" class="btn btn-primary me-2 mb-2">Add New Product</a>
                                <a href="#" class="btn btn-secondary me-2 mb-2">Process Order</a>
                                <a href="#" class="btn btn-info me-2 mb-2">Generate Invoice</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const sidebar = document.getElementById('sidebar');
            const content = document.getElementById('content');
            const sidebarToggle = document.getElementById('sidebarToggle');

            sidebarToggle.addEventListener('click', function() {
                sidebar.classList.toggle('collapsed');
                content.classList.toggle('expanded');
            });
        });
    </script>
</body>
</html>