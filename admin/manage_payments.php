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
    <title>Manage Payments - Contract Project Supplies Management System</title>
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
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h1>Manage Payments</h1>
                    
                </div>
                
                <div class="row mt-4">
                    <div class="col-md-12 mb-4">
                        <div class="card">                        
                            <div class="card-header d-flex justify-content-between align-items-center">
                                Payment List
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#newPaymentModal">
                        <i class="fas fa-plus"></i> New Payment
                    </button>
                            </div>
                            
                            <div class="card-body">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Payment ID</th>
                                            <th>Contract</th>
                                            <th>Company</th>
                                            <th>Amount</th>
                                            <th>Date</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- PHP code to fetch and display payments would go here -->
                                        <tr>
                                            <td>001</td>
                                            <td>Project X</td>
                                            <td>ABC Construction</td>
                                            <td>$10,000</td>
                                            <td>2023-05-15</td>
                                            <td><span class="badge bg-success">Paid</span></td>
                                            <td>
                                                <a href="#" class="btn btn-sm btn-primary">View</a>
                                                <a href="#" class="btn btn-sm btn-secondary">Print</a>
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

    <!-- New Payment Modal -->
    <div class="modal fade" id="newPaymentModal" tabindex="-1" aria-labelledby="newPaymentModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="newPaymentModalLabel">Record New Payment</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="newPaymentForm">
                        <div class="mb-3">
                            <label for="contract" class="form-label">Contract</label>
                            <select class="form-select" id="contract" required>
                                <option value="">Select a contract</option>
                                <!-- PHP code to fetch and display contracts would go here -->
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="company" class="form-label">Company</label>
                            <select class="form-select" id="company" required>
                                <option value="">Select a company</option>
                                <!-- PHP code to fetch and display companies would go here -->
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="amount" class="form-label">Amount</label>
                            <input type="number" step="0.01" class="form-control" id="amount" required>
                        </div>
                        <div class="mb-3">
                            <label for="paymentDate" class="form-label">Payment Date</label>
                            <input type="date" class="form-control" id="paymentDate" required>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="submitNewPayment()">Record Payment</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Include the same script as in your admin.php file

        function submitNewPayment() {
            // Get form data
            const contract = document.getElementById('contract').value;
            const company = document.getElementById('company').value;
            const amount = document.getElementById('amount').value;
            const paymentDate = document.getElementById('paymentDate').value;

            // Perform form validation
            if (!contract || !company || !amount || !paymentDate) {
                alert('Please fill in all fields');
                return;
            }

            // Here you would typically send this data to the server using AJAX
            // For demonstration, we'll just log it to the console and close the modal
            console.log({contract, company, amount, paymentDate});

            // Close the modal
            const modal = bootstrap.Modal.getInstance(document.getElementById('newPaymentModal'));
            modal.hide();

            // Reset form
            document.getElementById('newPaymentForm').reset();

            // You might want to refresh the payment list here
            // For now, we'll just show an alert
            alert('Payment recorded successfully!');
        }
    </script>
</body>
</html>