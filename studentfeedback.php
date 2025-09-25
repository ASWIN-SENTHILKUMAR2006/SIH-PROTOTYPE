<?php
// Start output buffering
ob_start();
?>
<style>
    /* --- Student Feedback Form --- */
    .form-container {
        background: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        max-width: 600px;
    }

    .form-container form {
        display: flex;
        flex-direction: column;
        gap: 15px;
    }

    .form-container label {
        font-weight: 600;
        color: #2f3e46;
    }

    .form-container input,
    .form-container select,
    .form-container textarea,
    .form-container button {
        padding: 10px;
        border-radius: 5px;
        border: 1px solid #ccc;
        font-size: 15px;
    }

    .form-container textarea {
        resize: none;
    }

    .form-container button {
        background: #52796f;
        color: white;
        border: none;
        cursor: pointer;
        transition: background 0.3s;
    }

    .form-container button:hover {
        background: #354f52;
    }
</style>
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