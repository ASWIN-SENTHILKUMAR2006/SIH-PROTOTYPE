<header>
    <!-- Logo + Title -->
    <div class="logo-title">
        <img src="./Assets/logo1.jpg" alt="logo" class="logo">
        <span class="title">ERP SYSTEM</span>
    </div>

    <!-- User Profile -->
    <div class="user-profile" onclick="toggleDropdown()">
        <div class="avatar">
            <?php echo strtoupper(substr($_SESSION['role'] ?? 'R', 0, 1)); ?>
        </div>
        <span class="username"><?php echo ucfirst($_SESSION['role'] ?? 'Ram'); ?></span>
        <div class="dropdown" id="dropdownMenu">
            <a href="logout.php">Logout</a>
        </div>
    </div>
</header>

<style>
    header {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 60px;
        background: #2f3e46;
        color: white;
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 0 20px;
        font-size: 20px;
        font-weight: bold;
        z-index: 1000;
    }

    .logo-title {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .logo {
        height: 40px;
        width: 40px;
        border-radius: 50%;
        object-fit: cover;
    }

    .title {
        font-size: 20px;
        font-weight: 700;
    }

    /* .user-profile {
        position: relative;
        display: flex;
        align-items: center;
        gap: 10px;
        cursor: pointer;
    }

    .avatar {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        background: #52796f;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .username {
        font-size: 16px;
        font-weight: 500;
    } */

    /* Dropdown */
    .user-profile {
        position: relative;
        display: flex;
        align-items: center;
        gap: 10px;
        cursor: pointer;
    }

    .avatar {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        background: #52796f;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 700;
        font-size: 18px;
        color: white;
    }

    .username {
        font-size: 16px;
        font-weight: 500;
    }

    /* Dropdown */
    .dropdown {
        position: absolute;
        top: 55px;
        right: 0;
        background: white;
        color: #2f3e46;
        border-radius: 6px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
        display: none;
        flex-direction: column;
        min-width: 120px;
        z-index: 2000;
    }

    .dropdown a {
        padding: 10px;
        text-decoration: none;
        color: #2f3e46;
        display: block;
        font-size: 14px;
    }

    .dropdown a:hover {
        background: #f4f6f8;
    }

    .dropdown.show {
        display: flex;
    }
</style>
<script>
    function toggleDropdown() {
        document.getElementById("dropdownMenu").classList.toggle("show");
    }
</script>
<?php
// End output buffering and flush
// ob_end_flush();
?>