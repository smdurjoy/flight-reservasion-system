<!DOCTYPE html>
<html lang="en">

<?php include 'partials/head.html'; ?>
<link rel="stylesheet" href="assets/bundles/bootstrap-daterangepicker/daterangepicker.css">
<link rel="stylesheet" href="assets/bundles/select2/dist/css/select2.min.css">
<link rel="stylesheet" href="assets/bundles/jquery-selectric/selectric.css">
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
                                <h4>New Passenger</h4>
                            </div>
                            <div class="card-body">
                                <form class="row" id="newPassengerForm">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="country">Country</label>
                                            <select class="form-control select2" id="country" name="country_id">
                                                <?php
                                                $sql = "SELECT * FROM countries";
                                                $result = mysqli_query($conn, $sql);

                                                while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                                                    echo "<option value='".$row['id']."'>" . $row['name'] . "</option>";
                                                }

                                                $conn->close();
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="state">State</label>
                                            <select class="form-control select2" id="state" name="state_id">
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="name">Name</label>
                                            <input type="text" class="form-control" id="name" name="name">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="address">Address</label>
                                            <input type="text" class="form-control" id="address" name="address">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="nationality">Nationality</label>
                                            <input type="text" class="form-control" id="nationality" name="nationality">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="email" class="form-control" id="email" name="email">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="mobile">Phone</label>
                                            <input type="number" class="form-control" id="mobile" name="mobile">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="age">Age</label>
                                            <input type="text" class="form-control" id="age" name="age">
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <button class="btn btn-primary" id="save">
                                                <i class="fa fa-save"></i>
                                                Save
                                            </button>
                                        </div>
                                    </div>
                                </form>
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
<script src="assets/bundles/bootstrap-daterangepicker/daterangepicker.js"></script>
<script src="assets/bundles/select2/dist/js/select2.full.min.js"></script>
<script src="assets/bundles/jquery-selectric/jquery.selectric.min.js"></script>

<script>
    $(document).ready(function () {
        fetchStates();
    });

    $(document).on('change', '#country', function () {
        fetchStates();
    });

    function fetchStates() {
        const countryId = $('#country').val();
        $.ajax({
            method: 'GET',
            url: 'backend/countryWiseStates.php',
            data: {countryId},
            success: function (res) {
                const response = JSON.parse(res);
                const len = response.length;
                $('#state').empty();
                if (len) {
                    for (let i=0; i<len; i++) {
                        const op_str = "<option value='"+response[i].id+"'>" + response[i].name + "</option>"
                        $("#state").append(op_str);
                    }
                }
            },
            error: function (error) {
                alert('Something Went Wrong!');
            }
        })
    }

    $(document).on('submit', '#newPassengerForm', function (e) {
        e.preventDefault();
        const data = new FormData(e.target);
        $.ajax({
            method: 'POST',
            url: 'backend/storePassenger.php',
            data: data,
            processData: false,
            contentType: false,
            success: function (res) {
                location.href = 'passengerList.php';
            },
            error: function (error) {
                alert('Something Went Wrong!');
            }
        })
    });
</script>
</body>
</html>