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
    <title>Payment History - Contract Project Supplies Management System</title>
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
                <h1 class="mb-4">Payment History</h1>
                
                <div class="row mt-4">
                    <div class="col-md-12 mb-4">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                Payment List
                                <button class="btn btn-primary" id="generateReport">
                                    <i class="fas fa-file-alt"></i> Generate Report
                                </button>
                            </div>
                            <div class="card-body">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Payment ID</th>
                                            <th>Order ID</th>
                                            <th>Amount</th>
                                            <th>Payment Date</th>
                                            <th>Payment Method</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- PHP code to fetch and display payments would go here -->
                                        <tr>
                                            <td>001</td>
                                            <td>ORD-123</td>
                                            <td>₱1,234.56</td>
                                            <td>2023-09-15</td>
                                            <td>Credit Card</td>
                                            <td><span class="badge bg-success">Completed</span></td>
                                            <td>
                                                <button class="btn btn-sm btn-primary view-payment" data-payment-id="001">View Details</button>
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

    <!-- View Payment Modal -->
    <div class="modal fade" id="viewPaymentModal" tabindex="-1" aria-labelledby="viewPaymentModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="viewPaymentModalLabel">Payment Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="paymentDetails">
                        <!-- Payment details will be loaded here -->
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

            // View Payment Details
            const viewButtons = document.querySelectorAll('.view-payment');
            const viewModal = new bootstrap.Modal(document.getElementById('viewPaymentModal'));
            
            viewButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const paymentId = this.getAttribute('data-payment-id');
                    // Fetch payment details and populate the modal (replace with actual data fetching logic)
                    document.getElementById('paymentDetails').innerHTML = `
                        <p><strong>Payment ID:</strong> ${paymentId}</p>
                        <p><strong>Order ID:</strong> ORD-123</p>
                        <p><strong>Amount:</strong> $1,234.56</p>
                        <p><strong>Payment Date:</strong> 2023-09-15</p>
                        <p><strong>Payment Method:</strong> Credit Card</p>
                        <p><strong>Status:</strong> Completed</p>
                        <p><strong>Transaction ID:</strong> TRX-789012</p>
                    `;
                    viewModal.show();
                });
            });

            // Generate Report
            const generateReportButton = document.getElementById('generateReport');
            generateReportButton.addEventListener('click', function() {
                // Add your logic to handle report generation (e.g., generate PDF or Excel)
                console.log('Generating payment history report...');
                alert('Payment history report generated successfully!');
            });
        });
    </script>
</body>
</html>