<?php
include("config.php"); // Include your DB config
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

<!-- DataTables CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">

<!-- jQuery + DataTables JS -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

<div class="container mt-5">

<br />
<br />

    <div><strong><h2 class="mb-4 text-center">SHIRIDI SAI TRUST RAGHAVENDRA COLONY WELFARE SOCIETY</h2></strong>
<h4 class="mb-4 text-center">Sri Raghavendra Colony, Nalgonda, Telangana - 508001</h4>
</div>
    <h2 class="mb-4 text-center">All Donors List</h2>

<a href="add_donors.php" class="btn btn-success">Donate Now</a>
    <div class="table-responsive">
        <table id="donorsTable" class="display table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>SNo.</th>
                    <th>Receipt No</th>
                    <th>Name</th>
                    <th>Father</th>
                    <th>Address</th>
                    <th>Amount</th>
                    <th>Date</th>
                    <th>Mode</th>
                  
                </tr>
            </thead>
            <tbody>
                <?php
                $res = $conn->query("SELECT * FROM donors ORDER BY receipt_no DESC");
                while($row = $res->fetch_assoc()) {
                    echo "<tr>
                        <td></td> <!-- SNo. handled by DataTables -->
                        <td>{$row['receipt_no']}</td>
                        <td>{$row['name']}</td>
                        <td>{$row['father_name']}</td>
                        <td>{$row['address']}</td>
                        <td>{$row['amount']}</td>
                        <td>{$row['donation_date']}</td>
                        <td>{$row['payment_mode']}</td>
                    </tr>";
                }
                ?>
            </tbody>
        </table><br />
<br />

    </div>
</div>

<!-- DataTables Initialization + Total Display -->
<script>
    $(document).ready(function () {
        let totalAmount = <?= $total ?>;
        let formatted = totalAmount.toLocaleString('en-IN', {
            style: 'currency',
            currency: 'INR',
            minimumFractionDigits: 2
        });

        var t = $('#donorsTable').DataTable({
            "pageLength": 10,
            "order": [[1, "desc"]],
            "columnDefs": [
                {
                    "searchable": false,
                    "orderable": false,
                    "targets": 0 // SNo column
                }
            ],
            "language": {
                "search": " Search Donors:"
            },
            "initComplete": function () {
                // Inject total below "Show entries"
                $('<div class="mt-2 text-success font-weight-bold">Total Donation Amount: ' + formatted + '</div>')
                    .insertAfter('#donorsTable_length');
            }
        });

        // Auto update SNo column
        t.on('order.dt search.dt', function () {
            t.column(0, { search: 'applied', order: 'applied' }).nodes().each(function (cell, i) {
                cell.innerHTML = i + 1;
            });
        }).draw();
    });
</script>

<?php include('footer.php'); ?>
