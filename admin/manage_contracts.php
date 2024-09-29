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
    <title>Manage Contracts - Contract Project Supplies Management System</title>
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
                <h1 class="mb-4">Manage Contracts</h1>
                
                <div class="row mt-4">
                    <div class="col-md-12 mb-4">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                Contract List
                                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addContractModal">
                                    <i class="fas fa-plus"></i> Add Contract
                                </button>
                            </div>
                            <div class="card-body">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Contract ID</th>
                                            <th>Project Name</th>
                                            <th>Company</th>
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
                                            <td>Company A</td>
                                            <td>2023-01-01</td>
                                            <td>2023-12-31</td>
                                            <td><span class="badge bg-success">Active</span></td>
                                            <td>
                                                <button class="btn btn-sm btn-primary edit-contract" data-contract-id="001">Edit</button>
                                                <button class="btn btn-sm btn-danger delete-contract" data-contract-id="001">Delete</button>
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

    <!-- Add Contract Modal -->
    <div class="modal fade" id="addContractModal" tabindex="-1" aria-labelledby="addContractModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addContractModalLabel">Add New Contract</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="addContractForm">
                        <div class="mb-3">
                            <label for="projectName" class="form-label">Project Name</label>
                            <input type="text" class="form-control" id="projectName" required>
                        </div>
                        <div class="mb-3">
                            <label for="company" class="form-label">Company</label>
                            <select class="form-select" id="company" required>
                                <option value="">Select a company</option>
                                <!-- PHP code to fetch and display companies would go here -->
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="startDate" class="form-label">Start Date</label>
                            <input type="date" class="form-control" id="startDate" required>
                        </div>
                        <div class="mb-3">
                            <label for="endDate" class="form-label">End Date</label>
                            <input type="date" class="form-control" id="endDate" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Add Contract</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Contract Modal -->
    <div class="modal fade" id="editContractModal" tabindex="-1" aria-labelledby="editContractModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editContractModalLabel">Edit Contract</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editContractForm">
                        <input type="hidden" id="editContractId">
                        <div class="mb-3">
                            <label for="editProjectName" class="form-label">Project Name</label>
                            <input type="text" class="form-control" id="editProjectName" required>
                        </div>
                        <div class="mb-3">
                            <label for="editCompany" class="form-label">Company</label>
                            <select class="form-select" id="editCompany" required>
                                <option value="">Select a company</option>
                                <!-- PHP code to fetch and display companies would go here -->
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="editStartDate" class="form-label">Start Date</label>
                            <input type="date" class="form-control" id="editStartDate" required>
                        </div>
                        <div class="mb-3">
                            <label for="editEndDate" class="form-label">End Date</label>
                            <input type="date" class="form-control" id="editEndDate" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Contract Modal -->
    <div class="modal fade" id="deleteContractModal" tabindex="-1" aria-labelledby="deleteContractModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteContractModalLabel">Confirm Delete</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this contract? This action cannot be undone.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-danger" id="confirmDeleteContract">Delete Contract</button>
                </div>
            </div>
        </div>
    </div>

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

            // Add Contract Form Submission
            const addContractForm = document.getElementById('addContractForm');
            addContractForm.addEventListener('submit', function(e) {
                e.preventDefault();
                // Add your logic to handle form submission (e.g., AJAX call to backend)
                console.log('Add contract form submitted');
                $('#addContractModal').modal('hide');
            });

            // Edit Contract Functionality
            const editButtons = document.querySelectorAll('.edit-contract');
            const editModal = new bootstrap.Modal(document.getElementById('editContractModal'));
            
            editButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const contractId = this.getAttribute('data-contract-id');
                    // Fetch contract details and populate the form (replace with actual data fetching logic)
                    document.getElementById('editContractId').value = contractId;
                    document.getElementById('editProjectName').value = 'Project X';
                    document.getElementById('editCompany').value = 'Company A';
                    document.getElementById('editStartDate').value = '2023-01-01';
                    document.getElementById('editEndDate').value = '2023-12-31';
                    editModal.show();
                });
            });

            // Edit Contract Form Submission
            const editContractForm = document.getElementById('editContractForm');
            editContractForm.addEventListener('submit', function(e) {
                e.preventDefault();
                // Add your logic to handle form submission (e.g., AJAX call to backend)
                console.log('Edit contract form submitted');
                editModal.hide();
            });

            // Delete Contract Functionality
            const deleteButtons = document.querySelectorAll('.delete-contract');
            const deleteModal = new bootstrap.Modal(document.getElementById('deleteContractModal'));
            let contractToDelete;
            
            deleteButtons.forEach(button => {
                button.addEventListener('click', function() {
                    contractToDelete = this.getAttribute('data-contract-id');
                    deleteModal.show();
                });
            });

            // Confirm Delete Contract
            const confirmDeleteButton = document.getElementById('confirmDeleteContract');
            confirmDeleteButton.addEventListener('click', function() {
                // Add your logic to handle contract deletion (e.g., AJAX call to backend)
                console.log('Deleting contract with ID:', contractToDelete);
                deleteModal.hide();
            });
        });
    </script>
</body>
</html>