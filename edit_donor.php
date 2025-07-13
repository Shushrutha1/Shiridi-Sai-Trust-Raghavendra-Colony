<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include('config.php');
include('header.php');

$id = $_GET['id'];
$result = $conn->query("SELECT * FROM donors WHERE receipt_no = $id");
$row = $result->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $father = $_POST['father'];
    $address = $_POST['address'];
    $amount = $_POST['amount'];
    $mode = $_POST['mode'];
    $date = $_POST['donation_date'];

    $stmt = $conn->prepare("UPDATE donors SET name=?, father_name=?, address=?, amount=?, payment_mode=?, donation_date=? WHERE receipt_no=?");
    $stmt->bind_param("sssdssi", $name, $father, $address, $amount, $mode, $date, $id);
    
 if ($stmt->execute()) {
    header("Location: donors.php?status=updated");
    exit;
} else {
    echo '<div class="alert alert-danger text-center mt-4">Failed to update donor.</div>';
}
}

?>

<!-- Bootstrap Form Styling -->
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

<div class="py-5"></div>

<div class="container">
Home/ <a href="dashboard.php">Back to Admin Panel</a>
    <div class="card shadow-lg mx-auto" style="max-width: 650px; border-radius: 15px;">
        <div class="card-header text-white text-center" style="background-color: #009688;">
            <h4 class="mb-0">Edit Donor Details</h4>
        </div>
			
        <div class="card-body" style="background-color: #f9f9f9;">
            <form method="POST">
                <div class="form-group">
                    <label><strong>Receipt No.</strong></label>
                    <input type="text" class="form-control bg-light" value="<?= $row['receipt_no'] ?>" readonly>
                </div>

                <div class="form-group">
                    <label><strong>Donation Date</strong></label>
                    <input type="date" name="donation_date" class="form-control" value="<?= $row['donation_date'] ?>" required>
                </div>

                <div class="form-group">
                    <label><strong>Name</strong></label>
                    <input type="text" name="name" class="form-control" value="<?= $row['name'] ?>" required>
                </div>

                <div class="form-group">
                    <label><strong>Father's Name</strong></label>
                    <input type="text" name="father" class="form-control" value="<?= $row['father_name'] ?>" required>
                </div>

                <div class="form-group">
                    <label><strong>Address</strong></label>
                    <textarea name="address" class="form-control" rows="3" required><?= $row['address'] ?></textarea>
                </div>

                <div class="form-group">
                    <label><strong>Amount Donated </strong></label>
                    <input type="number" step="0.01" name="amount" class="form-control" value="<?= $row['amount'] ?>" required>
                </div>

                <div class="form-group">
                    <label><strong>Payment Mode</strong></label>
                    <select name="mode" class="form-control" required>
                        <option <?= $row['payment_mode'] == 'Cheque' ? 'selected' : '' ?>>Cheque</option>
                        <option <?= $row['payment_mode'] == 'Online' ? 'selected' : '' ?>>Online</option>
                        <option <?= $row['payment_mode'] == 'Cash' ? 'selected' : '' ?>>Cash</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary btn-block mt-4">Update Donor Info</button>
            </form>
        </div>
    </div>
</div>

<?php include('footer.php'); ?>
