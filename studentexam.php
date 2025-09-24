<?php
// Start output buffering
ob_start();
?>
<div id="examrecords" style="display:none;">
    <h2 class="page-title">Examination Records</h2>

    <!-- Internal Marks Table -->
    <h3 class="section-title">Internal Marks</h3>
    <table>
        <thead>
            <tr>
                <th>Subject</th>
                <th>Test 1</th>
                <th>Test 2</th>
                <th>Assignment</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Mathematics</td>
                <td>18/25</td>
                <td>20/25</td>
                <td>9/10</td>
                <td>47/60</td>
            </tr>
            <tr>
                <td>Computer Science</td>
                <td>22/25</td>
                <td>23/25</td>
                <td>10/10</td>
                <td>55/60</td>
            </tr>
            <tr>
                <td>Physics</td>
                <td>17/25</td>
                <td>19/25</td>
                <td>8/10</td>
                <td>44/60</td>
            </tr>
        </tbody>
    </table>

    <!-- Upcoming Exams -->
    <h3 class="section-title" style="margin-top:20px;">Upcoming Exams</h3>
    <ul
        style="list-style:none; padding:0; background:#fff; border-radius:8px; padding:15px; box-shadow:0 2px 8px rgba(0,0,0,0.05);">
        <li>📌 Mathematics – <b>15 March 2025</b></li>
        <li>📌 Computer Science – <b>18 March 2025</b></li>
        <li>📌 Physics – <b>20 March 2025</b></li>
    </ul>
</div>
<?php
// End output buffering and flush
ob_end_flush();
?>