<?php
session_start();

// Check if user is logged in and is an admin
if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] != 1) {
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
    <title>Admin Dashboard - Contract Project Supplies Management System</title>
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
                <p class="lead">This is the admin dashboard for the Contract Project Supplies Management System.</p>

                <div class="row mt-4">
                    <div class="col-md-3 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Total Contracts</h5>
                                <p class="card-text display-4">42</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Active Supplies</h5>
                                <p class="card-text display-4">156</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Companies</h5>
                                <p class="card-text display-4">27</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Pending Payments</h5>
                                <p class="card-text display-4">8</p>
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
                                <li class="list-group-item">New contract added: Project X</li>
                                <li class="list-group-item">Supply order fulfilled for Company Y</li>
                                <li class="list-group-item">Payment received from Client Z</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-6 mb-4">
                        <div class="card">
                            <div class="card-header">
                                Quick Actions
                            </div>
                            <div class="card-body">
                                <a href="#" class="btn btn-primary me-2 mb-2">Add New Contract</a>
                                <a href="#" class="btn btn-secondary me-2 mb-2">Manage Supplies</a>
                                <a href="#" class="btn btn-info me-2 mb-2">Generate Report</a>
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