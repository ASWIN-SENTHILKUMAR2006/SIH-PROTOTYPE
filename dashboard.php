<?php
// Start output buffering
ob_start();
?>
<div id="dashboard">
    <h2 class="page-title">Admin Dashboard</h2>

    <!-- Top Row: Key Summary -->
    <div class="cards">
        <div class="card">
            <h3>Welcome!</h3>
            <p>Aadhya</p>
        </div>
        <div class="card">
            <h3>Total Students</h3>
            <p>1200</p>
        </div>
        <div class="card">
            <h3>Total Staff</h3>
            <p>120</p>
        </div>
        <div class="card">
            <h3>Employees</h3>
            <p>175</p>
        </div>
    </div>

    <!-- Finance Section -->
    <h3 class="section-title">Finance Overview</h3>
    <div class="cards">
        <div class="card">
            <h3>Fees Collected</h3>
            <p>₹ 45,00,000</p>
        </div>
        <div class="card">
            <h3>Pending Fees</h3>
            <p>₹ 5,50,000</p>
        </div>
        <div class="card">
            <h3>Scholarships Disbursed</h3>
            <p>₹ 1,20,000</p>
        </div>
        <div class="card">
            <h3>Expenses (This Month)</h3>
            <p>₹ 8,75,000</p>
        </div>
    </div>

    <!-- Hostel & Library -->
    <h3 class="section-title">Hostel & Library</h3>
    <div class="cards">
        <div class="card">
            <h3>Hostel Occupancy</h3>
            <p>85%</p>
        </div>
        <div class="card">
            <h3>Vacant Beds</h3>
            <p>25</p>
        </div>
        <div class="card">
            <h3>Books Issued</h3>
            <p>320</p>
        </div>
        <div class="card">
            <h3>Overdue Books</h3>
            <p>18</p>
        </div>
    </div>

    <!-- Charts -->
    <div style="display:flex; flex-wrap:wrap; gap:20px; margin-top:30px;">
        <!-- Fee Status Chart -->
        <div class="chart-container"
            style="flex:1; min-width:300px; height:350px;background:#fff; padding:20px; border-radius:8px; box-shadow:0 2px 10px rgba(0,0,0,0.1);">
            <h3 style="text-align:center; color:#2f3e46; margin-bottom:15px;">Fee Collection Status</h3>
            <canvas id="feesChart"></canvas>
        </div>

        <!-- Admissions Chart -->
        <div class="chart-container"
            style="flex:1; min-width:300px; height:350px;background:#fff; padding:20px; border-radius:8px; box-shadow:0 2px 10px rgba(0,0,0,0.1);">
            <h3 style="text-align:center; color:#2f3e46; margin-bottom:15px;">Admissions Trend</h3>
            <canvas id="admissionsChart"></canvas>
        </div>


    </div>

    <!-- Announcements -->
    <h3 class="section-title">Announcements</h3>
    <div
        style="background:#fff; padding:15px; border-radius:8px; box-shadow:0 2px 10px rgba(0,0,0,0.05); margin-bottom:20px;">
        <ul style="list-style:none; padding-left:0; color:#2f3e46;">
            <li>📌 Annual budget meeting on <b>Feb 25, 2025</b>.</li>
            <li>📌 Scholarship disbursement scheduled for <b>Mar 1, 2025</b>.</li>
            <li>📌 Audit report submission by <b>Mar 10, 2025</b>.</li>
        </ul>
    </div>

    <!-- Recent Activities -->
    <h3 class="section-title">Recent Activities</h3>
    <table style="margin-bottom:20px;">
        <thead>
            <tr>
                <th>Date</th>
                <th>Activity</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>21-02-2025</td>
                <td>Processed 50 Fee Payments</td>
                <td><span style="color:green; font-weight:bold;">Completed</span></td>
            </tr>
            <tr>
                <td>19-02-2025</td>
                <td>Approved 15 New Admissions</td>
                <td><span style="color:green; font-weight:bold;">Completed</span></td>
            </tr>
            <tr>
                <td>16-02-2025</td>
                <td>Reviewed Hostel Allocation</td>
                <td><span style="color:orange; font-weight:bold;">In Progress</span></td>
            </tr>
        </tbody>
    </table>
</div>

<script>
    // Admissions Chart
    new Chart(document.getElementById('admissionsChart'), {
        type: 'line',
        data: {
            labels: ['2019', '2020', '2021', '2022', '2023', '2024'],
            datasets: [{
                label: 'Admissions',
                data: [300, 350, 400, 500, 600, 650],
                backgroundColor: '#84a98c',
                borderColor: '#52796f',
                fill: true,
                tension: 0.4
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    display: false
                }
            }
        }
    });

    // Fee Collection Chart
    new Chart(document.getElementById('feesChart'), {
        type: 'doughnut',
        data: {
            labels: ['Collected', 'Pending'],
            datasets: [{
                data: [4500000, 550000],
                backgroundColor: ['#52796f', '#d9534f'],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'right'
                }
            }
        }
    });
</script>
<?php
// End output buffering and flush
ob_end_flush();
?>