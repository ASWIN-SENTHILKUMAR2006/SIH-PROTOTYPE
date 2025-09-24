<?php
// Start output buffering
ob_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ERP System UI</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="script.js" defer></script>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', sans-serif;
        }

        body {
            display: flex;
            min-height: 100vh;
            background: #f5f6f9;
        }

        header {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 60px;
            background: #2f3e46;
            color: white;
            display: flex;
            align-items: center;
            /* padding: 0 20px;
            padding-left: 0px; */

            font-size: 20px;
            font-weight: bold;
            z-index: 1000;
        }


        /* Section Titles inside Dashboard */
        .section-title {
            font-size: 18px;
            font-weight: 600;
            margin: 25px 0 15px;
            color: #354f52;
            border-left: 4px solid #68988c;
            padding-left: 10px;
        }

        /* Charts area */
        .charts {
            margin-top: 30px;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        .charts canvas {
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }


        /* Page Title */

        .page-title {
            font-size: 22px;
            font-weight: 700;
            color: #2f3e46;
            margin-bottom: 20px;
            padding-bottom: 8px;
            border-bottom: 2px solid #52796f;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .page-title::before {
            content: "▍";
            color: #68988c;
            font-size: 20px;
        }



        .sidebar {
            width: 220px;
            background: #354f52;
            color: white;
            padding-top: 70px;
            position: fixed;
            height: 100%;
        }

        .sidebar ul {
            list-style: none;
        }

        .sidebar li {
            padding: 15px 20px;
            cursor: pointer;
            transition: background 0.3s;
        }

        .sidebar li:hover,
        .sidebar li.active {
            background: #52796f;
        }

        .content {
            margin-left: 220px;
            margin-top: 60px;
            padding: 30px;
            width: calc(100% - 220px);
            min-height: calc(100vh - 60px);
        }

        /* Dashboard Cards */
        .cards {
            display: flex;
            gap: 20px;
            flex-wrap: wrap;
        }

        .card {
            flex: 1;
            min-width: 200px;
            padding: 20px;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .card h3 {
            margin-bottom: 10px;
            color: #2f3e46;
        }

        /* Tables */
        table {
            width: 100%;
            border-collapse: collapse;
            background: #fff;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            border-radius: 8px;
            overflow: hidden;
        }

        th,
        td {
            padding: 12px;
            border-bottom: 1px solid #ddd;
        }

        th {
            background: #52796f;
            color: white;
            text-align: left;
        }

        /* Add Buttons */
        .addbuttons {
            background: #68988cff;
            color: white;
            font-weight: 900;
            padding: 3px;
            border-radius: 4px;
            margin: 5px;
        }

        /* Manage users page */
        /* User Management Styles */
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

        /* Modal */
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.4);
            justify-content: center;
            align-items: center;
        }

        .modal-content {
            background: white;
            padding: 20px;
            border-radius: 8px;
            width: 500px;
            box-shadow: 0 2px 15px rgba(0, 0, 0, 0.3);
        }

        .modal-content h2 {
            margin-bottom: 15px;
            color: #2f3e46;
        }

        .modal-content form {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }

        .modal-content input,
        .modal-content select,
        .modal-content button {
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            font-size: 15px;
            flex: 1 1 45%;
        }

        .modal-content button {
            background: #52796f;
            color: white;
            border: none;
            cursor: pointer;
            flex: 1 1 100%;
        }

        .modal-content button:hover {
            background: #354f52;
        }

        .close {
            float: right;
            cursor: pointer;
            font-size: 18px;
            color: #888;
        }

        .close:hover {
            color: black;
        }


        /* Footer */
        .footer {
            position: fixed;
            bottom: 0;
            left: 220px;
            /* to account for sidebar */
            width: calc(100% - 220px);
            height: 40px;
            background: #2f3e46;
            color: #d8e3e7;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 14px;
            border-top: 2px solid #52796f;
        }

        .footer p {
            margin: 0;
            font-weight: 500;
            letter-spacing: 0.5px;
        }
    </style>
</head>

<body>
    <?php
    include 'staffheader.php';
    include 'staffsidebar.php';

    ?>
    <div class="content">
        <?php

        include 'staffdashboard.php';
        include 'admission.php';
        include 'fee.php';
        include 'hostel.php';
        include 'exam.php';
        include 'library.php';
        include 'manageusers_component.php';
        include 'report.php';
        ?>
    </div>
    <?php
    include 'footer.php';

    ?>
</body>

</html>
<?php
// End output buffering and flush
ob_end_flush();
?>