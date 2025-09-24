<?php
// Start output buffering
ob_start();
?>
<div id="hostel" style="display:none;">
    <h2 class="page-title">Hostel Allocation</h2>
    <button onclick="openModal('hostelModal')" class="addbuttons">+ New Allocation</button>
    <table id="hostelTable">
        <thead>
            <tr>
                <th>Student ID</th>
                <th>Room</th>
                <th>Block</th>
                <th>Check-in</th>
            </tr>
        </thead>
        <tbody></tbody>
    </table>
</div>
<div class="modal" id="hostelModal">
    <div class="modal-content">
        <span class="close" onclick="closeModal('hostelModal')">&times;</span>
        <h2>New Hostel Allocation</h2>
        <form id="hostelForm">
            <input type="text" id="studentId" placeholder="Student ID" required>
            <input type="text" id="room" placeholder="Room Number" required>
            <input type="text" id="block" placeholder="Block" required>
            <input type="date" id="checkin" required>
            <button type="submit">Save</button>
        </form>
    </div>
</div>
<?php
// End output buffering and flush
ob_end_flush();
?>