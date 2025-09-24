<?php
// Start output buffering
ob_start();
?>
<div id="exam" style="display:none;">
    <h2 class="page-title">Examination Records</h2>
    <button onclick="openModal('examModal')" class="addbuttons">+ New Record</button>
    <table id="examTable">
        <thead>
            <tr>
                <th>Student ID</th>
                <th>Subject</th>
                <th>Marks</th>
                <th>Result</th>
            </tr>
        </thead>
        <tbody></tbody>
    </table>
</div>
<div class="modal" id="examModal">
    <div class="modal-content">
        <span class="close" onclick="closeModal('examModal')">&times;</span>
        <h2>New Exam Record</h2>
        <form id="examForm">
            <input type="text" id="studentId" placeholder="Student ID" required>
            <input type="text" id="subject" placeholder="Subject" required>
            <input type="number" id="marks" placeholder="Marks" required>
            <select id="result" required>
                <option value="" disabled selected>Result</option>
                <option>Pass</option>
                <option>Fail</option>
            </select>
            <button type="submit">Save</button>
        </form>
    </div>
</div>
<?php
// End output buffering and flush
ob_end_flush();
?>