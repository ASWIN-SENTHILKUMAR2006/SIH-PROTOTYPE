<?php

session_start();

// Check if user is logged in as admin
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit();
}
// Sample user data (in real application, this would come from database)
$users = [
    // High Authority Users
    [
        'id' => 1,
        'name' => 'Dr. Rajesh Kumar',
        'email' => 'principal@college.edu',
        'role' => 'high_authority',
        'sub_role' => 'principal',
        'department' => 'Administration',
        'status' => 'active',
        'last_login' => '2024-01-15 10:30:00'
    ],
    [
        'id' => 2,
        'name' => 'Dr. Priya Sharma',
        'email' => 'dean_science@college.edu',
        'role' => 'high_authority',
        'sub_role' => 'dean',
        'department' => 'Science',
        'status' => 'active',
        'last_login' => '2024-01-14 14:20:00'
    ],
    [
        'id' => 3,
        'name' => 'Mr. Amit Verma',
        'email' => 'registrar@college.edu',
        'role' => 'high_authority',
        'sub_role' => 'registrar',
        'department' => 'Administration',
        'status' => 'inactive',
        'last_login' => '2024-01-10 09:15:00'
    ],

    // Staff Users
    [
        'id' => 4,
        'name' => 'Mrs. Sunita Patel',
        'email' => 'accounts@college.edu',
        'role' => 'staff',
        'sub_role' => 'office',
        'department' => 'Accounts',
        'status' => 'active',
        'last_login' => '2024-01-15 08:45:00'
    ],
    [
        'id' => 5,
        'name' => 'Prof. Ravi Menon',
        'email' => 'ravi.menon@college.edu',
        'role' => 'staff',
        'sub_role' => 'teaching',
        'department' => 'Computer Science',
        'status' => 'active',
        'last_login' => '2024-01-15 11:20:00'
    ],
    [
        'id' => 6,
        'name' => 'Ms. Anjali Singh',
        'email' => 'library@college.edu',
        'role' => 'staff',
        'sub_role' => 'office',
        'department' => 'Library',
        'status' => 'active',
        'last_login' => '2024-01-14 16:30:00'
    ],

    // Student Users
    [
        'id' => 7,
        'name' => 'Karan Sharma',
        'email' => 'karan.sharma@student.college.edu',
        'role' => 'student',
        'sub_role' => 'undergraduate',
        'department' => 'Computer Science',
        'status' => 'active',
        'last_login' => '2024-01-15 13:45:00'
    ],
    [
        'id' => 8,
        'name' => 'Priya Gupta',
        'email' => 'priya.gupta@student.college.edu',
        'role' => 'student',
        'sub_role' => 'postgraduate',
        'department' => 'Mathematics',
        'status' => 'active',
        'last_login' => '2024-01-14 20:15:00'
    ],
    [
        'id' => 9,
        'name' => 'Rohit Kumar',
        'email' => 'rohit.kumar@student.college.edu',
        'role' => 'student',
        'sub_role' => 'research',
        'department' => 'Physics',
        'status' => 'suspended',
        'last_login' => '2024-01-05 15:30:00'
    ]

];

// Handle form submissions
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['update_status'])) {
        $user_id = $_POST['user_id'];
        $new_status = $_POST['status'];
        // In real application, update database here
        foreach ($users as &$user) {
            if ($user['id'] == $user_id) {
                $user['status'] = $new_status;
                break;
            }
        }
        $success_message = "User status updated successfully!";
    }

    if (isset($_POST['update_role'])) {
        $user_id = $_POST['user_id'];
        $new_role = $_POST['role'];
        $new_sub_role = $_POST['sub_role'];
        // In real application, update database here
        foreach ($users as &$user) {
            if ($user['id'] == $user_id) {
                $user['role'] = $new_role;
                $user['sub_role'] = $new_sub_role;
                break;
            }
        }
        $success_message = "User role updated successfully!";
    }

    if (isset($_POST['add_user'])) {
        // In real application, insert into database here
        $new_user = [
            'id' => count($users) + 1,
            'name' => $_POST['new_name'],
            'email' => $_POST['new_email'],
            'role' => $_POST['new_role'],
            'sub_role' => $_POST['new_sub_role'],
            'department' => $_POST['new_department'],
            'status' => 'active',
            'last_login' => 'Never'
        ];
        $users[] = $new_user;
        $success_message = "User added successfully!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>User Management - ERP System</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', sans-serif;
        }

        body {
            background: #f5f5f5;
            color: #333;
        }

        .header {
            background: linear-gradient(135deg, #2f3e46, #52796f);
            color: white;
            padding: 15px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .header h1 {
            font-size: 24px;
        }

        .user-info {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .logout-btn {
            background: rgba(255, 255, 255, 0.2);
            color: white;
            border: 1px solid rgba(255, 255, 255, 0.3);
            padding: 8px 15px;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
        }

        .logout-btn:hover {
            background: rgba(255, 255, 255, 0.3);
        }

        .container {
            max-width: 1200px;
            margin: 20px auto;
            padding: 0 20px;
        }

        .section {
            background: white;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .section h2 {
            color: #2f3e46;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 2px solid #f0f0f0;
        }

        .filters {
            display: flex;
            gap: 15px;
            margin-bottom: 20px;
            flex-wrap: wrap;
        }

        .filter-btn {
            padding: 8px 15px;
            border: 1px solid #ddd;
            background: white;
            border-radius: 5px;
            cursor: pointer;
        }

        .filter-btn.active {
            background: #52796f;
            color: white;
            border-color: #52796f;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        th,
        td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #eee;
        }

        th {
            background: #f8f9fa;
            font-weight: 600;
            color: #2f3e46;
        }

        tr:hover {
            background: #f8f9fa;
        }

        .status-active {
            color: #28a745;
            font-weight: 600;
        }

        .status-inactive {
            color: #6c757d;
        }

        .status-suspended {
            color: #dc3545;
            font-weight: 600;
        }

        .action-btn {
            padding: 5px 10px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            margin-right: 5px;
            font-size: 12px;
        }

        .btn-edit {
            background: #ffc107;
            color: black;
        }

        .btn-delete {
            background: #dc3545;
            color: white;
        }

        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            justify-content: center;
            align-items: center;
            z-index: 1000;
        }

        .modal-content {
            background: white;
            padding: 25px;
            border-radius: 10px;
            width: 90%;
            max-width: 500px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: 500;
        }

        .form-control {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 14px;
        }

        .btn-primary {
            background: #52796f;
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            cursor: pointer;
        }

        .message {
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 15px;
        }

        .success {
            background: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }

        .role-badge {
            display: inline-block;
            padding: 3px 8px;
            border-radius: 12px;
            font-size: 12px;
            font-weight: 600;
        }

        .badge-high-authority {
            background: #e3f2fd;
            color: #1976d2;
        }

        .badge-staff {
            background: #f3e5f5;
            color: #7b1fa2;
        }

        .badge-student {
            background: #e8f5e8;
            color: #388e3c;
        }
    </style>
</head>

<body>
    <!-- <div class="header">
        <h1>ERP System - User Management</h1>
        <div class="user-info">
            <span>Welcome, <?php echo $_SESSION['username']; ?></span>
            <a href="logout.php" class="logout-btn">Logout</a>
        </div>
    </div> -->

    <div class="container">
        <?php if (isset($success_message)): ?>
            <div class="message success"><?php echo $success_message; ?></div>
        <?php endif; ?>

        <div class="section" id="manageusers">
            <h2>User Management</h2>
            <div class="filters">
                <button class="filter-btn active" onclick="filterUsers('all')">All Users</button>
                <button class="filter-btn" onclick="filterUsers('high_authority')">High Authority</button>
                <button class="filter-btn" onclick="filterUsers('staff')">Staff</button>
                <button class="filter-btn" onclick="filterUsers('student')">Students</button>
                <button class="btn-primary" onclick="openAddUserModal()" style="margin-left: auto;">Add New
                    User</button>
            </div>

            <table id="usersTable">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Department</th>
                        <th>Status</th>
                        <th>Last Login</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($users as $user): ?>
                        <tr data-role="<?php echo $user['role']; ?>">
                            <td><?php echo $user['id']; ?></td>
                            <td><?php echo $user['name']; ?></td>
                            <td><?php echo $user['email']; ?></td>
                            <td>
                                <span class="role-badge badge-<?php echo str_replace('_', '-', $user['role']); ?>">
                                    <?php echo ucfirst(str_replace('_', ' ', $user['sub_role'])); ?>
                                </span>
                            </td>
                            <td><?php echo $user['department']; ?></td>
                            <td>
                                <span class="status-<?php echo $user['status']; ?>">
                                    <?php echo ucfirst($user['status']); ?>
                                </span>
                            </td>
                            <td><?php echo $user['last_login']; ?></td>
                            <td>
                                <button class="action-btn btn-edit"
                                    onclick="editUser(<?php echo $user['id']; ?>)">Edit</button>
                                <button class="action-btn btn-delete"
                                    onclick="deleteUser(<?php echo $user['id']; ?>)">Delete</button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    <!-- Add User Modal -->
    <div id="addUserModal" class="modal">
        <div class="modal-content">
            <h3>Add New User</h3>
            <form method="POST">
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="new_name" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="new_email" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Role Category</label>
                    <select name="new_role" class="form-control" onchange="updateSubRoles(this.value, 'new')" required>
                        <option value="">Select Role Category</option>
                        <option value="high_authority">High Authority</option>
                        <option value="staff">Staff</option>
                        <option value="student">Student</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Sub Role</label>
                    <select name="new_sub_role" class="form-control" required id="new_sub_role">
                        <option value="">Select Role Category First</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Department</label>
                    <input type="text" name="new_department" class="form-control" required>
                </div>
                <div style="display: flex; gap: 10px; margin-top: 20px;">
                    <button type="submit" name="add_user" class="btn-primary">Add User</button>
                    <button type="button" class="logout-btn" onclick="closeAddUserModal()">Cancel</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function filterUsers(role) {
            const rows = document.querySelectorAll('#usersTable tbody tr');
            const filterBtns = document.querySelectorAll('.filter-btn');

            filterBtns.forEach(btn => btn.classList.remove('active'));
            event.target.classList.add('active');

            rows.forEach(row => {
                if (role === 'all' || row.getAttribute('data-role') === role) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        }

        function openAddUserModal() {
            document.getElementById('addUserModal').style.display = 'flex';
        }

        function closeAddUserModal() {
            document.getElementById('addUserModal').style.display = 'none';
        }

        function updateSubRoles(role, prefix) {
            const subRoleSelect = document.getElementById(prefix + '_sub_role');
            subRoleSelect.innerHTML = '';

            const subRoles = {
                'high_authority': ['principal', 'dean', 'registrar', 'director'],
                'staff': ['teaching', 'office', 'technical', 'support'],
                'student': ['undergraduate', 'postgraduate', 'research', 'diploma']
            };

            if (subRoles[role]) {
                subRoles[role].forEach(subRole => {
                    const option = document.createElement('option');
                    option.value = subRole;
                    option.textContent = subRole.charAt(0).toUpperCase() + subRole.slice(1);
                    subRoleSelect.appendChild(option);
                });
            }
        }

        function editUser(userId) {
            alert('Edit functionality for user ID: ' + userId + ' would open here');
            // In real implementation, open edit modal with user data
        }

        function deleteUser(userId) {
            if (confirm('Are you sure you want to delete this user?')) {
                alert('Delete functionality for user ID: ' + userId + ' would execute here');
                // In real implementation, send delete request to server
            }
        }

        // Close modal when clicking outside
        window.onclick = function (event) {
            const modal = document.getElementById('addUserModal');
            if (event.target === modal) {
                closeAddUserModal();
            }
        }
    </script>
</body>

</html>