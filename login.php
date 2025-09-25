<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    // Dummy login (replace with DB later)
    if ($username === "admin" && $password === "admin123" && $role === "admin") {
        $_SESSION['role'] = "admin";
        $_SESSION['username'] = $username;
        header("Location: index.php");
        exit();
    } elseif ($username === "staff" && $password === "staff123" && $role === "staff") {
        $_SESSION['role'] = "staff";
        $_SESSION['username'] = $username;
        header("Location: staffindex.php"); // Different page for staff
        exit();
    } elseif ($username === "student" && $password === "student123" && $role === "student") {
        $_SESSION['role'] = "student";
        $_SESSION['username'] = $username;
        header("Location: studentindex.php"); // Different page for students
        exit();
    } else {
        $error = "Invalid login details!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>ERP Login</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: linear-gradient(135deg, #2f3e46, #52796f);
            margin: 0;
        }

        .login-box {
            background: #ffffff;
            padding: 20px 25px;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.25);
            width: 320px;
            text-align: center;
        }

        .login-box img {
            width: 60px;
            height: 60px;
            margin-bottom: 10px;
        }

        .system-name {
            font-size: 20px;
            font-weight: bold;
            color: #2f3e46;
            margin-bottom: 15px;
        }

        .role-tabs {
            display: flex;
            margin-bottom: 15px;
            border-radius: 6px;
            overflow: hidden;
            background: #f5f5f5;
        }

        .role-tab {
            flex: 1;
            padding: 10px;
            text-align: center;
            cursor: pointer;
            font-weight: 600;
            color: #495057;
            transition: all 0.3s ease;
            border: none;
            background: transparent;
        }

        .role-tab.active {
            color: #52796f;
            background: white;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        input,
        button {
            width: 100%;
            padding: 12px;
            margin: 8px 0;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 15px;
        }

        input:focus {
            border-color: #52796f;
            outline: none;
            box-shadow: 0 0 5px rgba(82, 121, 111, 0.5);
        }

        button {
            background: #52796f;
            color: white;
            border: none;
            font-weight: 600;
            cursor: pointer;
            transition: 0.3s;
        }

        button:hover {
            background: #354f52;
        }

        .error {
            color: #d9534f;
            margin-top: 10px;
            font-size: 14px;
        }

        h2 {
            color: #2f3e46;
            margin-bottom: 15px;
        }
    </style>
</head>

<body>
    <div class="login-box">
        <img src="./Assets/logo1.jpg" alt="ERP Logo">
        <div class="system-name">ERP System</div>
        <h2>Login</h2>
        <form method="POST" id="loginForm">
            <div class="role-tabs">
                <button type="button" class="role-tab active" data-role="admin">Admin</button>
                <button type="button" class="role-tab" data-role="staff">Staff</button>
                <button type="button" class="role-tab" data-role="student">Student</button>
            </div>
            <input type="hidden" name="role" id="roleInput" value="admin" required>
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Login</button>
        </form>
        <?php if (!empty($error))
            echo "<div class='error'>$error</div>"; ?>
    </div>

    <script>
        // Role tab selection
        const roleTabs = document.querySelectorAll('.role-tab');
        const roleInput = document.getElementById('roleInput');

        roleTabs.forEach(tab => {
            tab.addEventListener('click', () => {
                // Remove active class from all tabs
                roleTabs.forEach(t => t.classList.remove('active'));
                // Add active class to clicked tab
                tab.classList.add('active');
                // Update hidden input value
                roleInput.value = tab.getAttribute('data-role');
            });
        });
    </script>
</body>

</html>