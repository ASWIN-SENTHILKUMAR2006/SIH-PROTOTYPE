<?php
// Start output buffering
ob_start();
?>
<div class="sidebar">

    <ul>

        <li class="active" data-tab="dashboard">Dashboard</li>
        <li data-tab="admission">Admission</li>
        <li data-tab="fee">Fee Management</li>
        <li data-tab="hostel">Hostel Allocation</li>
        <li data-tab="exam">Examination Records</li>
        <li data-tab="library">Library Records</li>

    </ul>
</div>
<?php
// End output buffering and flush
ob_end_flush();
?>