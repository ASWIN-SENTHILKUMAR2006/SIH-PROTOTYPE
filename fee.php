<?php
// Start output buffering
ob_start();
?>
<div id="fee" style="display:none;">
    <h2 class="page-title">Fee Management</h2>
    <button onclick="openModal('feeModal')" class="addbuttons">+ New Fee</button>
    <table id="feeTable">
        <thead>
            <tr>
                <th>Student ID</th>
                <th>Type</th>
                <th>Amount</th>
                <th>Date</th>
                <th>Mode</th>
            </tr>
        </thead>
        <tbody></tbody>
    </table>
</div>
<div class="modal" id="feeModal">
    <div class="modal-content">
        <span class="close" onclick="closeModal('feeModal')">&times;</span>
        <h2>New Fee</h2>
        <form id="feeForm">
            <input type="text" id="studentId" placeholder="Student ID" required>
            <input type="text" id="type" placeholder="Type" required>
            <input type="number" id="amount" placeholder="Amount" required>
            <input type="date" id="date" required>
            <select id="mode" required>
                <option value="" disabled selected>Payment Mode</option>
                <option>Cash</option>
                <option>Card</option>
                <option>Online</option>
            </select>
            <button type="submit">Save</button>
        </form>
    </div>
</div>
<?php
// End output buffering and flush
ob_end_flush();
?>