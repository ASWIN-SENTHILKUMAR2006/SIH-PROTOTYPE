<?php
// Start output buffering
ob_start();
?>
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