<?php
// Start output buffering
ob_start();
?>
<div id="library" style="display:none;">
    <h2 class="page-title">Library Records</h2>
    <button onclick="openModal('libraryModal')" class="addbuttons">+ New Issue</button>
    <table id="libraryTable">
        <thead>
            <tr>
                <th>Student ID</th>
                <th>Book</th>
                <th>Issue Date</th>
                <th>Return Date</th>
            </tr>
        </thead>
        <tbody></tbody>
    </table>
</div>
<div class="modal" id="libraryModal">
    <div class="modal-content">
        <span class="close" onclick="closeModal('libraryModal')">&times;</span>
        <h2>New Library Issue</h2>
        <form id="libraryForm">
            <input type="text" id="studentId" placeholder="Student ID" required>
            <input type="text" id="book" placeholder="Book Title" required>
            <input type="date" id="issueDate" required>
            <input type="date" id="returnDate" required>
            <button type="submit">Save</button>
        </form>
    </div>
</div>
<?php
// End output buffering and flush
ob_end_flush();
?>