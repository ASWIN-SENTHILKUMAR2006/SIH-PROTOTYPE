<?php
// Start output buffering
ob_start();
?>
<div id="dashboard">
    <h2 class="page-title">Staff Dashboard</h2>

    <!-- Top Row: Profile Summary -->
    <div class="cards">
        <div class="card">
            <h3>Welcome!</h3>
            <p>Aaditiya</p>
        </div>
        <div class="card">
            <h3>Experience</h3>
            <p>3 years</p>
        </div>
        <div class="card">
            <h3>Department</h3>
            <p>CSE</p>
        </div>
        <div class="card">
            <h3>D.O.B</h3>
            <p>17/02/2005</p>
        </div>
    </div>
    <!-- Charts Section -->
    <div style="display:flex; flex-wrap:wrap; gap:20px; margin-top:30px;">
        <!-- Pie Chart -->
        <div class="chart-container"
            style="flex:1; min-width:300px;height:400px; background:#fff; padding:20px; border-radius:8px; box-shadow:0 2px 10px rgba(0,0,0,0.1);">
            <h3 style="text-align:center; color:#2f3e46; margin-bottom:15px;">Exam Results</h3>
            <canvas id="examResultsChart" STYLE="align-items: center;"></canvas>
        </div>

        <!-- Bar Chart -->
        <div class="chart-container"
            style="flex:1; min-width:300px; height:400px ;background:#fff; padding:20px; border-radius:8px; box-shadow:0 2px 10px rgba(0,0,0,0.1);">
            <h3 style="text-align:center; color:#2f3e46; margin-bottom:15px;">Subject Averages</h3>
            <canvas id="subjectChart"></canvas>
        </div>
    </div>

    <!-- Academics Section -->
    <h3 class="section-title">Academics Overview</h3>
    <div class="cards">
        <div class="card">
            <h3>New Admissions (2025)</h3>
            <p>320</p>
        </div>
        <div class="card">
            <h3>Pass Percentage</h3>
            <p>86%</p>
        </div>
        <div class="card">
            <h3>Upcoming Exams</h3>
            <p>March 15</p>
        </div>
        <div class="card">
            <h3>Classes Assigned</h3>
            <p>5</p>
        </div>
    </div>



    <!-- Announcements / Notices -->
    <h3 class="section-title">Announcements</h3>
    <div
        style="background:#fff; padding:15px; border-radius:8px; box-shadow:0 2px 10px rgba(0,0,0,0.05); margin-bottom:20px;">
        <ul style="list-style:none; padding-left:0; color:#2f3e46;">
            <li>📌 Faculty meeting scheduled on <b>Feb 28, 2025</b>.</li>
            <li>📌 Internal exam papers to be submitted by <b>Mar 5, 2025</b>.</li>
            <li>📌 Student counseling session planned for <b>Mar 10, 2025</b>.</li>
        </ul>
    </div>

    <!-- Recent Activity -->
    <h3 class="section-title">Recent Activities</h3>
    <div class="div" style="margin-bottom:20px;">
        <table>
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Activity</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>20-02-2025</td>
                    <td>Uploaded Internal Marks</td>
                    <td><span style="color:green; font-weight:bold;">Completed</span></td>
                </tr>
                <tr>
                    <td>18-02-2025</td>
                    <td>Reviewed Assignments</td>
                    <td><span style="color:green; font-weight:bold;">Completed</span></td>
                </tr>
                <tr>
                    <td>15-02-2025</td>
                    <td>Student Counseling</td>
                    <td><span style="color:orange; font-weight:bold;">Pending</span></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<script>
    // Pie Chart: Exam Results
    new Chart(document.getElementById('examResultsChart'), {
        type: 'pie',
        data: {
            labels: ['Pass', 'Fail'],
            datasets: [{
                data: [75, 25],
                backgroundColor: ['#84a98c', '#d9534f'],
                borderColor: ['#52796f', '#c9302c'],
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

    // Bar Chart: Subject Averages
    new Chart(document.getElementById('subjectChart'), {
        type: 'bar',
        data: {
            labels: ['Maths', 'Physics', 'Chemistry', 'CS', 'English'],
            datasets: [{
                label: 'Average Marks',
                data: [78, 82, 69, 88, 74],
                backgroundColor: '#52796f'
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
                        stepSize: 10
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