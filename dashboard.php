<?php
session_start(); // Start the session first

include("config.php"); // Include your DB config

// Redirect to login if user is not authenticated
if (!isset($_SESSION['username']) || empty($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

include_once('header.php'); // Include header only after session check
?>

<!-- Dashboard content -->
<div class="container" style="margin-top: 100px;">
<p><strong><h2 class="mb-4 text-center">SHIRIDI SAI TRUST RAGHAVENDRA COLONY WELFARE SOCIETY</h2></strong>
<h4 class="mb-4 text-center">Sri Raghavendra Colony, Nalgonda, Telangana - 508001</h4>
</p>
    <h2 class="mb-4 text-center">Welcome to Admin-Panel !</h2>

    <div class="btn-group mt-4" role="group">
        <a href="add_donors.php" class="btn btn-success">Add Donor</a><br />&nbsp;&nbsp;&nbsp;
        <a href="donors.php" class="btn btn-info">View / Edit Donors</a><br />&nbsp;&nbsp;&nbsp;
        <a href="logout.php" class="btn btn-danger">Logout</a><br /><br />

    </div><br />

</div><br />
<br />


<?php include('footer.php'); ?>
