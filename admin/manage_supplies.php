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
    <title>Manage Supplies - Contract Project Supplies Management System</title>
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
                <h1 class="mb-4">Manage Supplies</h1>
                
                <div class="row mt-4">
                    <div class="col-md-12 mb-4">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                Supply List
                                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addSupplyModal">
                                    <i class="fas fa-plus"></i> Add Supply
                                </button>
                            </div>
                            <div class="card-body">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Supply ID</th>
                                            <th>Name</th>
                                            <th>Category</th>
                                            <th>Quantity</th>
                                            <th>Unit Price</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- PHP code to fetch and display supplies would go here -->
                                        <tr>
                                            <td>001</td>
                                            <td>Cement</td>
                                            <td>Construction Material</td>
                                            <td>500</td>
                                            <td>$10.00</td>
                                            <td><span class="badge bg-success">In Stock</span></td>
                                            <td>
                                                <button class="btn btn-sm btn-primary edit-supply" data-supply-id="001">Edit</button>
                                                <button class="btn btn-sm btn-danger delete-supply" data-supply-id="001">Delete</button>
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

    <!-- Add Supply Modal -->
    <div class="modal fade" id="addSupplyModal" tabindex="-1" aria-labelledby="addSupplyModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addSupplyModalLabel">Add New Supply</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="addSupplyForm">
                        <div class="mb-3">
                            <label for="supplyName" class="form-label">Supply Name</label>
                            <input type="text" class="form-control" id="supplyName" required>
                        </div>
                        <div class="mb-3">
                            <label for="category" class="form-label">Category</label>
                            <input type="text" class="form-control" id="category" required>
                        </div>
                        <div class="mb-3">
                            <label for="quantity" class="form-label">Quantity</label>
                            <input type="number" class="form-control" id="quantity" required>
                        </div>
                        <div class="mb-3">
                            <label for="unitPrice" class="form-label">Unit Price</label>
                            <input type="number" step="0.01" class="form-control" id="unitPrice" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Add Supply</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Supply Modal -->
    <div class="modal fade" id="editSupplyModal" tabindex="-1" aria-labelledby="editSupplyModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editSupplyModalLabel">Edit Supply</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editSupplyForm">
                        <input type="hidden" id="editSupplyId">
                        <div class="mb-3">
                            <label for="editSupplyName" class="form-label">Supply Name</label>
                            <input type="text" class="form-control" id="editSupplyName" required>
                        </div>
                        <div class="mb-3">
                            <label for="editCategory" class="form-label">Category</label>
                            <input type="text" class="form-control" id="editCategory" required>
                        </div>
                        <div class="mb-3">
                            <label for="editQuantity" class="form-label">Quantity</label>
                            <input type="number" class="form-control" id="editQuantity" required>
                        </div>
                        <div class="mb-3">
                            <label for="editUnitPrice" class="form-label">Unit Price</label>
                            <input type="number" step="0.01" class="form-control" id="editUnitPrice" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Supply Modal -->
    <div class="modal fade" id="deleteSupplyModal" tabindex="-1" aria-labelledby="deleteSupplyModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteSupplyModalLabel">Confirm Delete</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this supply? This action cannot be undone.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-danger" id="confirmDeleteSupply">Delete Supply</button>
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

            // Add Supply Form Submission
            const addSupplyForm = document.getElementById('addSupplyForm');
            addSupplyForm.addEventListener('submit', function(e) {
                e.preventDefault();
                // Add your logic to handle form submission (e.g., AJAX call to backend)
                console.log('Add supply form submitted');
                $('#addSupplyModal').modal('hide');
            });

            // Edit Supply Functionality
            const editButtons = document.querySelectorAll('.edit-supply');
            const editModal = new bootstrap.Modal(document.getElementById('editSupplyModal'));
            
            editButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const supplyId = this.getAttribute('data-supply-id');
                    // Fetch supply details and populate the form (replace with actual data fetching logic)
                    document.getElementById('editSupplyId').value = supplyId;
                    document.getElementById('editSupplyName').value = 'Cement';
                    document.getElementById('editCategory').value = 'Construction Material';
                    document.getElementById('editQuantity').value = '500';
                    document.getElementById('editUnitPrice').value = '10.00';
                    editModal.show();
                });
            });

            // Edit Supply Form Submission
            const editSupplyForm = document.getElementById('editSupplyForm');
            editSupplyForm.addEventListener('submit', function(e) {
                e.preventDefault();
                // Add your logic to handle form submission (e.g., AJAX call to backend)
                console.log('Edit supply form submitted');
                editModal.hide();
            });

            // Delete Supply Functionality
            const deleteButtons = document.querySelectorAll('.delete-supply');
            const deleteModal = new bootstrap.Modal(document.getElementById('deleteSupplyModal'));
            let supplyToDelete;
            
            deleteButtons.forEach(button => {
                button.addEventListener('click', function() {
                    supplyToDelete = this.getAttribute('data-supply-id');
                    deleteModal.show();
                });
            });

            // Confirm Delete Supply
            const confirmDeleteButton = document.getElementById('confirmDeleteSupply');
            confirmDeleteButton.addEventListener('click', function() {
                // Add your logic to handle supply deletion (e.g., AJAX call to backend)
                console.log('Deleting supply with ID:', supplyToDelete);
                deleteModal.hide();
            });
        });
    </script>
</body>
</html>