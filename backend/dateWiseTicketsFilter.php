<?php

include 'connection.php';

$fromDate = $_POST['fromDate'];
$toDate = $_POST['toDate'];

$sql = "SELECT COUNT(id) as total_tickets 
        FROM transactions 
        WHERE transactions.booking_date between '$fromDate' and '$toDate';";

$result = mysqli_query($conn, $sql);

$return_arr = array();

if ($result->num_rows > 0) {
    while ($row = mysqli_fetch_array($result)) {
        $return_arr[] = array(
            "total_tickets" => $row['total_tickets'],
        );
    }
}

echo json_encode($return_arr);