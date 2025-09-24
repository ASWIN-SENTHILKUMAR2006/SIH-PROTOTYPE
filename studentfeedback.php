<?php
// Start output buffering
ob_start();
?>
<div id="feedback" style="display:none;">
    <h2 class="page-title">Student Feedback</h2>
    <div class="form-container">
        <form>
            <label for="feedbackType">Feedback Type</label>
            <select id="feedbackType" required>
                <option value="" disabled selected>Select Category</option>
                <option value="academic">Academic</option>
                <option value="hostel">Hostel</option>
                <option value="library">Library</option>
                <option value="general">General</option>
            </select>

            <label for="feedbackMessage">Your Feedback</label>
            <textarea id="feedbackMessage" rows="5" placeholder="Type your feedback here..." required></textarea>

            <button type="submit">Submit Feedback</button>
        </form>
    </div>
</div>
<?php
// End output buffering and flush
ob_end_flush();
?>