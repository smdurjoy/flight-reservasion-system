<!DOCTYPE html>
<html lang="en">

<?php include 'partials/head.html'; ?>
<link rel="stylesheet" href="assets/bundles/datatables/datatables.min.css">
<link rel="stylesheet" href="assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="assets/bundles/bootstrap-daterangepicker/daterangepicker.css">
<body>
<div class="loader"></div>
<div id="app">
    <div class="main-wrapper main-wrapper-1">

        <?php require_once 'backend/connection.php'; ?>
        <?php include 'partials/navbar.html'; ?>

        <?php include 'partials/sidebar.php'; ?>

        <div class="main-content">
            <section class="section">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Date Wise Tickets</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="fromDate">From Date</label>
                                            <input type="text" class="form-control datepicker" id="fromDate">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="toDate">To Date</label>
                                            <input type="text" class="form-control datepicker" id="toDate">
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <button class="btn btn-primary" style="margin-top: 30px;" id="search">
                                                <i class="fa fa-search"></i>
                                                Search
                                            </button>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <table class="table table-striped table-hover d-none" id="totalTicketsTable">
                                            <thead>
                                            <tr>
                                                <th>Total Tickets Sale</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <?php include 'partials/footer.html'; ?>
    </div>
</div>

<?php include 'partials/jsAssets.html'; ?>
<script src="assets/bundles/datatables/datatables.min.js"></script>
<script src="assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
<script src="assets/js/page/datatables.js"></script>
<script src="assets/bundles/bootstrap-daterangepicker/daterangepicker.js"></script>

<script>
    $(document).on('click', '#search', function () {
        const fromDate = $('#fromDate').val();
        const toDate = $('#toDate').val();
        $.ajax({
            method: 'POST',
            url: 'backend/dateWiseTicketsFilter.php',
            data: {fromDate, toDate},
            success: function (res) {
                $("#totalTicketsTable").removeClass('d-none');
                $("#totalTicketsTable tbody").empty();
                const response = JSON.parse(res);
                const len = response.length;
                if (len) {
                    const tr_str = "<tr>" +
                        "<td>" + response[0].total_tickets + "</td>" +
                        "</tr>";

                    $("#totalTicketsTable tbody").append(tr_str);
                }
            },
            error: function (error) {
                alert('Something Went Wrong !')
                console.log(error)
            }
        })
    });
</script>

</body>
</html>