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
    <title>View Contracts - Contract Project Supplies Management System</title>
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
                <h1 class="mb-4">View Contracts</h1>
                
                <div class="row mt-4">
                    <div class="col-md-12 mb-4">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                Contract List
                                <button class="btn btn-primary" id="exportContracts">
                                    <i class="fas fa-file-export"></i> Export Contracts
                                </button>
                            </div>
                            <div class="card-body">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Contract ID</th>
                                            <th>Project Name</th>
                                            <th>Client</th>
                                            <th>Start Date</th>
                                            <th>End Date</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- PHP code to fetch and display contracts would go here -->
                                        <tr>
                                            <td>001</td>
                                            <td>Project X</td>
                                            <td>Company ABC</td>
                                            <td>2023-01-01</td>
                                            <td>2023-12-31</td>
                                            <td><span class="badge bg-success">Active</span></td>
                                            <td>
                                                <button class="btn btn-sm btn-primary view-contract" data-contract-id="001">View Details</button>
                                            </td>
                                        </tr>
                                        <!-- More rows would be added here -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- View Contract Modal -->
    <div class="modal fade" id="viewContractModal" tabindex="-1" aria-labelledby="viewContractModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="viewContractModalLabel">Contract Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="contractDetails">
                        <!-- Contract details will be loaded here -->
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Sidebar toggle functionality
            const sidebar = document.getElementById('sidebar');
            const content = document.getElementById('content');
            const sidebarToggle = document.getElementById('sidebarToggle');

            sidebarToggle.addEventListener('click', function() {
                sidebar.classList.toggle('collapsed');
                content.classList.toggle('expanded');
            });

            // View Contract Details
            const viewButtons = document.querySelectorAll('.view-contract');
            const viewModal = new bootstrap.Modal(document.getElementById('viewContractModal'));
            
            viewButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const contractId = this.getAttribute('data-contract-id');
                    // Fetch contract details and populate the modal (replace with actual data fetching logic)
                    document.getElementById('contractDetails').innerHTML = `
                        <h4>Contract ID: ${contractId}</h4>
                        <p><strong>Project Name:</strong> Project X</p>
                        <p><strong>Client:</strong> Company ABC</p>
                        <p><strong>Start Date:</strong> 2023-01-01</p>
                        <p><strong>End Date:</strong> 2023-12-31</p>
                        <p><strong>Status:</strong> Active</p>
                        <p><strong>Description:</strong> This is a sample contract description. It would contain details about the project, terms, and conditions.</p>
                    `;
                    viewModal.show();
                });
            });

            // Export Contracts
            const exportButton = document.getElementById('exportContracts');
            exportButton.addEventListener('click', function() {
                // Add your logic to handle contract export (e.g., generate CSV or PDF)
                console.log('Exporting contracts...');
                alert('Contracts exported successfully!');
            });
        });
    </script>
</body>
</html>