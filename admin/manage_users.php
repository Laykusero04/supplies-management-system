<?php
session_start();
require_once '../db_connection.php'; // Ensure this file exists and contains your database connection logic

// Check if user is logged in and is an admin
if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] != 1) {
    header("Location: index.php");
    exit();
}

$user_name = $_SESSION['user_name'];

// Function to safely escape user inputs
function escape($value) {
    global $conn;
    return mysqli_real_escape_string($conn, $value);
}

// Handle form submissions
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['add_user'])) {
        $first_name = escape($_POST['first_name']);
        $last_name = escape($_POST['last_name']);
        $email = escape($_POST['email']);
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash the password
        $role = (int)$_POST['role'];
        
        $query = "INSERT INTO users (first_name, last_name, email, password, role) VALUES ('$first_name', '$last_name', '$email', '$password', $role)";
        mysqli_query($conn, $query);
    } elseif (isset($_POST['edit_user'])) {
        $uid = (int)$_POST['uid'];
        $first_name = escape($_POST['first_name']);
        $last_name = escape($_POST['last_name']);
        $email = escape($_POST['email']);
        $role = (int)$_POST['role'];
        
        $query = "UPDATE users SET first_name = '$first_name', last_name = '$last_name', email = '$email', role = $role WHERE uid = $uid";
        mysqli_query($conn, $query);
    } elseif (isset($_POST['delete_user'])) {
        $uid = (int)$_POST['uid'];
        $query = "DELETE FROM users WHERE uid = $uid";
        mysqli_query($conn, $query);
    }
}

// Fetch users from the database
$query = "SELECT * FROM users";
$result = mysqli_query($conn, $query);
$users = mysqli_fetch_all($result, MYSQLI_ASSOC);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Users - Contract Project Supplies Management System</title>
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
                <h1 class="mb-4">Manage Users</h1>
                
                <div class="row mt-4">
                    <div class="col-md-12 mb-4">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                User List
                                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addUserModal">
                                    <i class="fas fa-plus"></i> Add User
                                </button>
                            </div>
                            <div class="card-body">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>User ID</th>
                                            <th>Full Name</th>
                                            <th>Email</th>
                                            <th>Role</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($users as $user): ?>
                                        <tr>
                                            <td><?php echo htmlspecialchars($user['uid']); ?></td>
                                            <td><?php echo htmlspecialchars($user['first_name'] . ' ' . $user['last_name']); ?></td>
                                            <td><?php echo htmlspecialchars($user['email']); ?></td>
                                            <td><?php echo $user['role'] == 1 ? 'Admin' : 'User'; ?></td>
                                            <td>
                                                <button class="btn btn-sm btn-primary edit-user" data-uid="<?php echo $user['uid']; ?>">Edit</button>
                                                <button class="btn btn-sm btn-danger delete-user" data-uid="<?php echo $user['uid']; ?>">Delete</button>
                                            </td>
                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Add User Modal -->
    <div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="addUserModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addUserModalLabel">Add New User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST">
                        <div class="mb-3">
                            <label for="first_name" class="form-label">First Name</label>
                            <input type="text" class="form-control" id="first_name" name="first_name" required>
                        </div>
                        <div class="mb-3">
                            <label for="last_name" class="form-label">Last Name</label>
                            <input type="text" class="form-control" id="last_name" name="last_name" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <div class="mb-3">
                            <label for="role" class="form-label">Role</label>
                            <select class="form-select" id="role" name="role" required>
                                <option value="">Select a role</option>
                                <option value="1">Admin</option>
                                <option value="2">User</option>
                            </select>
                        </div>
                        <button type="submit" name="add_user" class="btn btn-primary">Add User</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit User Modal -->
    <div class="modal fade" id="editUserModal" tabindex="-1" aria-labelledby="editUserModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editUserModalLabel">Edit User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editUserForm" method="POST">
                        <input type="hidden" id="edit_uid" name="uid">
                        <div class="mb-3">
                            <label for="edit_first_name" class="form-label">First Name</label>
                            <input type="text" class="form-control" id="edit_first_name" name="first_name" required>
                        </div>
                        <div class="mb-3">
                            <label for="edit_last_name" class="form-label">Last Name</label>
                            <input type="text" class="form-control" id="edit_last_name" name="last_name" required>
                        </div>
                        <div class="mb-3">
                            <label for="edit_email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="edit_email" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="edit_role" class="form-label">Role</label>
                            <select class="form-select" id="edit_role" name="role" required>
                                <option value="1">Admin</option>
                                <option value="2">User</option>
                            </select>
                        </div>
                        <button type="submit" name="edit_user" class="btn btn-primary">Save Changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete User Modal -->
    <div class="modal fade" id="deleteUserModal" tabindex="-1" aria-labelledby="deleteUserModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteUserModalLabel">Confirm Delete</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this user? This action cannot be undone.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <form id="deleteUserForm" method="POST">
                        <input type="hidden" id="delete_uid" name="uid">
                        <button type="submit" name="delete_user" class="btn btn-danger">Delete User</button>
                    </form>
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

            // Edit user functionality
            const editButtons = document.querySelectorAll('.edit-user');
            const editModal = new bootstrap.Modal(document.getElementById('editUserModal'));
            
            editButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const uid = this.getAttribute('data-uid');
                    const row = this.closest('tr');
                    const fullName = row.cells[1].textContent.split(' ');
                    const firstName = fullName[0];
                    const lastName = fullName.slice(1).join(' ');
                    const email = row.cells[2].textContent;
                    const role = row.cells[3].textContent === 'Admin' ? '1' : '2';

                    document.getElementById('edit_uid').value = uid;
                    document.getElementById('edit_first_name').value = firstName;
                    document.getElementById('edit_last_name').value = lastName;
                    document.getElementById('edit_email').value = email;
                    document.getElementById('edit_role').value = role;

                    editModal.show();
                });
            });

            // Delete user functionality
            const deleteButtons = document.querySelectorAll('.delete-user');
            const deleteModal = new bootstrap.Modal(document.getElementById('deleteUserModal'));
            
            deleteButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const uid = this.getAttribute('data-uid');
                    document.getElementById('delete_uid').value = uid;
                    deleteModal.show();
                });
            });
        });
    </script>
</body>
</html>