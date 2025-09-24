<?php
// Start output buffering
ob_start();
?>
<div id="dashboard">
    <h2 class="page-title">Student Dashboard</h2>

    <!-- Top Row: Profile Summary -->
    <div class="cards">
        <div class="card">
            <h3>Welcome!</h3>
            <p>Ram</p>
        </div>
        <div class="card">
            <h3>Enrollment No</h3>
            <p>2025CSE123</p>
        </div>
        <div class="card">
            <h3>Course</h3>
            <p>B.Tech - CSE</p>
        </div>
        <div class="card">
            <h3>Semester</h3>
            <p>6th</p>
        </div>
    </div>

    <!-- Academics Section -->
    <h3 class="section-title">Academics</h3>
    <div class="cards">
        <div class="card">
            <h3>Attendance</h3>
            <p>92%</p>
        </div>
        <div class="card">
            <h3>CGPA</h3>
            <p>8.4</p>
        </div>
        <div class="card">
            <h3>Upcoming Exam</h3>
            <p>March 18, 2025</p>
        </div>
    </div>

    <div style="display:flex; flex-wrap:wrap; gap:20px; margin-top:30px;">
        <!-- Attendance Trend -->
        <div class="chart-container"
            style="flex:1; min-width:300px; height:350px; background:#fff; padding:20px; border-radius:8px; box-shadow:0 2px 10px rgba(0,0,0,0.1);">
            <h3 style="text-align:center; color:#2f3e46; margin-bottom:15px;">Attendance Trend</h3>
            <canvas id="attendanceChart"></canvas>
        </div>

        <!-- Grade Distribution -->
        <div class="chart-container"
            style="flex:1; min-width:300px; height:350px; background:#fff; padding:20px; border-radius:8px; box-shadow:0 2px 10px rgba(0,0,0,0.1);">
            <h3 style="text-align:center; color:#2f3e46; margin-bottom:15px;">Grade Distribution</h3>
            <canvas id="gradeChart"></canvas>
        </div>
    </div>

    <!-- Finance Section -->
    <h3 class="section-title">Fee Details</h3>
    <div class="cards">
        <div class="card">
            <h3>Total Fees</h3>
            <p>₹ 1,20,000</p>
        </div>
        <div class="card">
            <h3>Paid</h3>
            <p>₹ 90,000</p>
        </div>
        <div class="card">
            <h3>Pending</h3>
            <p>₹ 30,000</p>
        </div>
        <div class="card">
            <h3>Due Date</h3>
            <p>15 March 2025</p>
        </div>
    </div>

    <!-- Hostel & Library -->
    <h3 class="section-title">Hostel & Library</h3>
    <div class="cards">
        <div class="card">
            <h3>Room No</h3>
            <p>B-203</p>
        </div>
        <div class="card">
            <h3>Mess Status</h3>
            <p>Active</p>
        </div>
        <div class="card">
            <h3>Books Issued</h3>
            <p>2</p>
        </div>
        <div class="card">
            <h3>Overdue Books</h3>
            <p>0</p>
        </div>
    </div>

    <!-- Announcements / Feedback -->
    <h3 class="section-title">Announcements</h3>
    <div
        style="background:#fff; padding:15px; border-radius:8px; box-shadow:0 2px 10px rgba(0,0,0,0.05); margin-bottom:20px;">
        <ul style="list-style:none; padding-left:0; color:#2f3e46;">
            <li>📌 Submit feedback form before <b>March 10, 2025</b>.</li>
            <li>📌 Hostel curfew timing revised to <b>9:00 PM</b>.</li>
            <li>📌 Library week starts from <b>Feb 25, 2025</b>.</li>
        </ul>
    </div>
</div>

<script>
    // Attendance Trend
    new Chart(document.getElementById('attendanceChart'), {
        type: 'line',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May'],
            datasets: [{
                label: 'Attendance %',
                data: [90, 85, 88, 92, 95],
                borderColor: '#52796f',
                backgroundColor: 'rgba(82,121,111,0.2)',
                fill: true,
                tension: 0.3
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'top'
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    max: 100
                }
            }
        }
    });

    // Grade Distribution
    new Chart(document.getElementById('gradeChart'), {
        type: 'bar',
        data: {
            labels: ['A+', 'A', 'B+', 'B', 'C'],
            datasets: [{
                label: 'No. of Subjects',
                data: [3, 4, 2, 1, 0],
                backgroundColor: '#84a98c'
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    display: false
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        stepSize: 1
                    }
                }
            }
        }
    });
</script>
<?php
// End output buffering and flush
ob_end_flush();
?>