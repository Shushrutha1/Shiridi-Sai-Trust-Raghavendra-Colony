<?php
session_start(); // Start the session first

include("config.php"); // Include your DB config

// Redirect to login if user is not authenticated
if (!isset($_SESSION['username']) || empty($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

// Auto-increment Receipt No.
$result = $conn->query("SELECT MAX(receipt_no) AS last_receipt FROM donors");
$row = $result->fetch_assoc();
$next_receipt = $row['last_receipt'] + 1;

// On form submit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $receipt_no = $_POST['receipt_no'];
    $donation_date = $_POST['donation_date'];
    $name = $_POST['name'];
    $father = $_POST['father'];
    $address = $_POST['address'];
    $amount = $_POST['amount'];
    $mode = $_POST['mode'];

    $stmt = $conn->prepare("INSERT INTO donors (receipt_no, donation_date, name, father_name, address, amount, payment_mode)
                            VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("issssds", $receipt_no, $donation_date, $name, $father, $address, $amount, $mode);
    
    if ($stmt->execute()) {
        header("Location: donors.php?status=success");
        exit;
    } else {
        echo "<script>alert('Error saving donor.');</script>";
    }
}

include('header.php');
?>

<!-- Include Bootstrap CSS -->
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

<!-- Vertical spacing to avoid header overlap -->
<div class="py-5"></div>

<div class="container">
<p><strong><h2 class="mb-4 text-center">SHIRIDI SAI TRUST RAGHAVENDRA COLONY WELFARE SOCIETY</h2></strong>
<h4 class="mb-4 text-center">Sri Raghavendra Colony, Nalgonda, Telangana - 508001</h4>
</p>
Home/ <a href="dashboard.php" class="btn btn-warning">Back to Admin Panel</a>
    <div class="card shadow-lg mx-auto" style="max-width: 650px; border-radius: 15px;">
        <div class="card-header text-white text-center" style="background-color: #309;">
            <h4 class="mb-0" style="color:#FFF">Add Donor Details</h4>
        </div>

        <div class="card-body" style="background-color: #f3f3f3;">
            <form method="POST">
                <div class="form-group">
                    <label><strong>Receipt No.</strong></label>
                    <input type="text" class="form-control bg-light" name="receipt_no" value="<?= $next_receipt ?>" readonly>
                </div>

                <div class="form-group">
                    <label><strong>Donation Date</strong></label>
                    <input type="date" name="donation_date" class="form-control" required>
                </div>

                <div class="form-group">
                    <label><strong>Name</strong></label>
                    <input type="text" name="name" class="form-control" required>
                </div>

                <div class="form-group">
                    <label><strong>Father's Name</strong></label>
                    <input type="text" name="father" class="form-control" required>
                </div>

                <div class="form-group">
                    <label><strong>Address</strong></label>
                    <textarea name="address" class="form-control" rows="3" required></textarea>
                </div>

                <div class="form-group">
                    <label><strong>Amount Donated (?)</strong></label>
                    <input type="number" name="amount" step="0.01" class="form-control" required>
                </div>

                <div class="form-group">
                    <label><strong>Payment Mode</strong></label>
                    <select name="mode" class="form-control" required>
                        <option value="">-- Select Mode --</option>
                        <option>Cheque</option>
                        <option>Online</option>
                        <option>Cash</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary btn-block mt-4">Submit Donor Info</button><br />
			
            </form>
        </div>
    </div>
</div>

<!-- Footer -->
<?php include('footer.php'); ?>
