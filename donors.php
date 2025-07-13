<?php
session_start(); // Start the session first

include("config.php"); // Include your DB config

// Redirect to login if user is not authenticated
if (!isset($_SESSION['username']) || empty($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

include('header.php');

// Calculate total donation amount
$sumResult = $conn->query("SELECT SUM(amount) AS total_amount FROM donors");
$total = $sumResult->fetch_assoc()['total_amount'];
?>

<?php if (isset($_GET['status']) && $_GET['status'] === 'success'): ?>
    <div class="alert alert-success text-center mt-4" role="alert">
        Donor added successfully!
    </div>
<?php elseif (isset($_GET['status']) && $_GET['status'] === 'updated'): ?>
    <div class="alert alert-info text-center mt-4" role="alert">
        Donor updated successfully!
    </div>
<?php endif; ?>
<meta charset="UTF-8">

<!-- DataTables CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
<!-- Bootstrap & jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

<div class="container" style="margin-top: 100px;">
<p><strong><h2 class="mb-4 text-center">SHIRIDI SAI TRUST RAGHAVENDRA COLONY WELFARE SOCIETY</h2></strong>
<h4 class="mb-4 text-center">Sri Raghavendra Colony, Nalgonda, Telangana - 508001</h4>
</p>
    <p class="mb-3">Home / <a href="dashboard.php" class="btn btn-warning">Back to Admin Panel</a></p>
    <h2 class="mb-4 text-center"><u>All Donors</u></h2>

    <!-- Total Donation Amount -->
    <div id="totalDonation" class="text-right font-weight-bold mb-3" style="color: #060;">
       <b><u> Total Donation Amount: Rs.<?= number_format($total, 2) ?></u></b>
    </div>
</div>
    <div class="table-responsive">
    <table id="donorsTable" class="display table table-bordered table-striped table-hover">
        <thead>
            <tr>
                <th>SNo.</th>
                <th>Receipt No</th>
                <th>Name</th>
                <th>Father Name</th>
                <th>Address</th>
                <th>Date</th>
                <th>Mode</th>
                <th>Amount</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $res = $conn->query("SELECT * FROM donors ORDER BY receipt_no DESC");
            while($row = $res->fetch_assoc()) {
                echo "<tr>
                    <td></td> <!-- SNo. -->
                    <td>{$row['receipt_no']}</td>
                    <td>{$row['name']}</td>
                    <td>{$row['father_name']}</td>
                    <td>{$row['address']}</td>
                    <td>{$row['donation_date']}</td>
                    <td>{$row['payment_mode']}</td>
                    <td>" . number_format($row['amount'], 2) . "</td>
                    <td><a href='edit_donor.php?id={$row['receipt_no']}' class='btn btn-sm btn-warning'>Edit</a></td>
                </tr>";
            }
            ?>
        </tbody>
        <tfoot>
            <tr>
                <th colspan="7" style="text-align:right">Total:</th>
                <th id="totalAmount"></th>
                <th></th>
            </tr>
        </tfoot>
    </table><br />
<br />

</div>

<!-- DataTables Initialization -->
<script>
$(document).ready(function () {
    // Destroy if already initialized
    if ($.fn.DataTable.isDataTable('#donorsTable')) {
        $('#donorsTable').DataTable().destroy();
    }

    var table = $('#donorsTable').DataTable({
        "pageLength": 10,
        "order": [[1, "desc"]],
        "columnDefs": [{
            "orderable": false,
            "searchable": false,
            "targets": 0 // SNo
        }],
        "language": {
            "search": " Search Donors:"
        },
        "footerCallback": function (row, data, start, end, display) {
            var api = this.api();

            var intVal = function (i) {
                return typeof i === 'string'
                    ? parseFloat(i.replace(/[^0-9.-]+/g, ''))
                    : typeof i === 'number'
                    ? i
                    : 0;
            };

            // Amount is in column 7 (index starts at 0)
            var total = api
                .column(7)
                .data()
                .reduce(function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0);

            var pageTotal = api
                .column(7, { page: 'current' })
                .data()
                .reduce(function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0);

            $(api.column(7).footer()).html(
         pageTotal.toLocaleString('en-IN', { minimumFractionDigits: 2, maximumFractionDigits: 2 }));
        }
    });

    // Auto-generate SNo
    table.on('order.dt search.dt', function () {
        table.column(0, { search: 'applied', order: 'applied' })
            .nodes()
            .each(function (cell, i) {
                cell.innerHTML = i + 1;
            });
    }).draw();
});
</script>



<?php include('footer.php'); ?>
