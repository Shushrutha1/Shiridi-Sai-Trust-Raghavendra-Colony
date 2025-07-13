<?php
include("config.php");
// session_start();
$username = $password = "";
$username_err = $password_err = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (empty(trim($_POST["username"]))) {
        $username_err = 'Please enter username.';
    } else {
        $username = trim($_POST["username"]);
    }

    if (empty(trim($_POST['password']))) {
        $password_err = 'Please enter your password.';
    } else {
        $password = trim($_POST['password']);
    }
}

include 'header.php';
?>

<section id="hero" class="hero section light-background" style="min-height: 100vh;">
    <div class="d-flex justify-content-center align-items-center" style="height: 100vh;">
        <div class="panel panel-color panel-primary panel-pages p-4" style="border-radius: 8px;">
            <div class="panel-heading bg-img">
                <div class="bg-overlay"></div>
                <br />
<br />
 <div><strong><h2 class="mb-4 text-center">SHIRIDI SAI TRUST RAGHAVENDRA COLONY WELFARE SOCIETY<h2></strong>
<h4 class="mb-4 text-center">Sri Raghavendra Colony, Nalgonda, Telangana - 508001</h4>
</div>
                <h3 class="text-center m-t-10">Pooja Timings</h3>
            </div>

            <div class="panel-body">

                <table class="table table-bordered table-striped text-center mb-0">
                    <thead class="thead-dark">
                        <tr>
                            <th>Day</th>
                            <th>Morning Pooja</th>
                            <th>Afternoon Pooja</th>
                            <th>Evening Pooja</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr><td>Monday</td><td>6:00 AM</td><td>12:30 PM</td><td>6:00 PM</td></tr>
                        <tr><td>Tuesday</td><td>6:00 AM</td><td>12:30 PM</td><td>6:00 PM</td></tr>
                        <tr><td>Wednesday</td><td>6:00 AM</td><td>12:30 PM</td><td>6:00 PM</td></tr>
                        <tr><td>Thursday</td><td>5:30 AM (Abhishekam)</td><td>12:00 PM</td><td>7:00 PM (Pallaki Seva)</td></tr>
                        <tr><td>Friday</td><td>6:00 AM</td><td>12:30 PM</td><td>6:00 PM</td></tr>
                        <tr><td>Saturday</td><td>6:00 AM</td><td>12:30 PM</td><td>6:30 PM</td></tr>
                        <tr><td>Sunday</td><td>6:00 AM</td><td>12:30 PM</td><td>6:30 PM</td></tr>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</section>

<?php include_once 'footer.php'; ?>
