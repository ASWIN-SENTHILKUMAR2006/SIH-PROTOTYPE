<?php
// Start output buffering
ob_start();
?>
<style>
    /* --- Fee Payment Section --- */
    #feepayment .form-container {
        margin-top: 20px;
    }

    #feepayment input,
    #feepayment select {
        width: 100%;
    }

    /* --- Examination Records --- */
    .exam-section {
        background: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        margin-bottom: 20px;
    }

    .exam-section h3 {
        margin-bottom: 10px;
        color: #354f52;
    }

    .exam-section ul {
        list-style: none;
        padding-left: 0;
    }

    .exam-section ul li {
        padding: 8px 0;
        border-bottom: 1px solid #eee;
        color: #2f3e46;
    }

    .exam-section ul li:last-child {
        border-bottom: none;
    }
</style>
<div id="feepayment" style="display:none;">
    <h2 class="page-title">Fee Payment</h2>
    <div class="cards">
        <div class="card">
            <h3>Total Fee</h3>
            <p>₹ 50,000</p>
        </div>
        <div class="card">
            <h3>Paid</h3>
            <p>₹ 40,000</p>
        </div>
        <div class="card">
            <h3>Pending</h3>
            <p>₹ 10,000</p>
        </div>
    </div>

    <div class="form-container" style="margin-top:20px;">
        <form>
            <label for="amount">Enter Amount</label>
            <input type="number" id="amount" placeholder="e.g., 10000" required>

            <label for="paymentMethod">Payment Method</label>
            <select id="paymentMethod" required>
                <option value="" disabled selected>Select Method</option>
                <option value="card">Credit/Debit Card</option>
                <option value="upi">UPI</option>
                <option value="netbanking">Net Banking</option>
            </select>

            <button type="submit">Pay Now</button>
        </form>
    </div>
</div>
<?php
// End output buffering and flush
ob_end_flush();
?>