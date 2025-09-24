<?php
// Start output buffering
ob_start();
?>
<div class="sidebar">

    <ul>


        <li class="active" data-tab="dashboard">Dashboard</li>
        <li data-tab="feepayment">Fee Payment</li>
        <li data-tab="examrecords">Exam Records</li>
        <li data-tab="feedback">Feedback</li>
    </ul>
</div>
<?php
// End output buffering and flush
ob_end_flush();
?>