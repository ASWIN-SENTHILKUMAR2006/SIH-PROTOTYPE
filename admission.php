<?php
// Start output buffering
ob_start();
?>
<div id="admission" style="display:none;">
    <h2 class="page-title">Admission Records</h2>
    <button onclick="openModal('admissionModal')" class="addbuttons">+ New Admission</button>
    <table id="admissionTable" style="margin-top:20px;">
        <thead>
            <tr>
                <th>Name</th>
                <th>Age</th>
                <th>DOB</th>
                <th>Gender</th>
                <th>Email</th>
                <th>Contact</th>
                <th>Course</th>
            </tr>
        </thead>
        <tbody></tbody>
    </table>
</div>
<div class="modal" id="admissionModal">
    <div class="modal-content">
        <span class="close" onclick="closeModal('admissionModal')">&times;</span>
        <h2>New Admission</h2>
        <form id="admissionForm">
            <input type="text" id="name" placeholder="Name" required>
            <input type="number" id="age" placeholder="Age" required>
            <input type="date" id="dob" required>
            <select id="gender" required>
                <option value="" disabled selected>Gender</option>
                <option>Male</option>
                <option>Female</option>
                <option>Other</option>
            </select>
            <input type="email" id="email" placeholder="Email" required>
            <input type="text" id="contact" placeholder="Contact" required>
            <input type="text" id="course" placeholder="Course" required>
            <button type="submit">Save</button>
        </form>
    </div>
</div>
<?php
// End output buffering and flush
ob_end_flush();
?>