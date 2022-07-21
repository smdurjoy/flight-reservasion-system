<?php

include 'connection.php';

$stateId = $_GET['stateId'];

$sql = "SELECT COUNT(transactions.id) as total_tickets FROM transactions
        JOIN passengers ON transactions.passenger_id = passengers.id
        JOIN contacts ON passengers.contact_id = contacts.id
        WHERE contacts.state_id = '$stateId'";

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