<?php
// manageusers_component.php
// This will be included in your main ERP page

// Sample user data
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
        foreach ($users as &$user) {
            if ($user['id'] == $user_id) {
                $user['status'] = $new_status;
                break;
            }
        }
        $success_message = "User status updated successfully!";
    }

    if (isset($_POST['add_user'])) {
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

<div id="manageusers" style="display:none;">
    <h2 class="page-title">User Management</h2>

    <?php if (isset($success_message)): ?>
        <div class="message success"><?php echo $success_message; ?></div>
    <?php endif; ?>

    <div class="section" id="manageusers">
        <div class="filters">
            <button class="filter-btn active" onclick="filterUsers('all')">All Users</button>
            <button class="filter-btn" onclick="filterUsers('high_authority')">High Authority</button>
            <button class="filter-btn" onclick="filterUsers('staff')">Staff</button>
            <button class="filter-btn" onclick="filterUsers('student')">Students</button>
            <button class="addbuttons" onclick="openModal('addUserModal')" style="margin-left: auto;">Add New
                User</button>
        </div>

        <table id="usersTable" style="margin-top:20px;">
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
                            <button class="action-btn btn-edit" onclick="editUser(<?php echo $user['id']; ?>)">Edit</button>
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
<div class="modal" id="addUserModal">
    <div class="modal-content">
        <span class="close" onclick="closeModal('addUserModal')">&times;</span>
        <h2>Add New User</h2>
        <form method="POST">
            <input type="text" name="new_name" placeholder="Full Name" required>
            <input type="email" name="new_email" placeholder="Email" required>
            <select name="new_role" onchange="updateSubRoles(this.value, 'new')" required>
                <option value="">Select Role Category</option>
                <option value="high_authority">High Authority</option>
                <option value="staff">Staff</option>
                <option value="student">Student</option>
            </select>
            <input type="text" name="new_sub_role" placeholder="Enter Sub Role" id="new_sub_role" required>

            <input type="text" name="new_department" placeholder="Department" required>
            <button type="submit" name="add_user">Add User</button>
        </form>
    </div>
</div>
<script>
    // User Management Functions
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
    }

    function deleteUser(userId) {
        if (confirm('Are you sure you want to delete this user?')) {
            alert('Delete functionality for user ID: ' + userId + ' would execute here');
        }
    }
</script>