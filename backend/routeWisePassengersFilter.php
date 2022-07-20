<?php

include 'connection.php';

$routeId = $_POST['routeId'];
$fromDate = $_POST['fromDate'];
$toDate = $_POST['toDate'];

$sql = "SELECT COUNT(transactions.id) as total_passengers FROM aircrafts, airfares, flight_schedules, transactions
        WHERE flight_schedules.aircraft_id = aircrafts.id
        AND flight_schedules.airfare_id = airfares.id
        AND transactions.aircraft_id = aircrafts.id
        AND airfares.route_id = '$routeId'
        AND flight_schedules.flight_date BETWEEN '$fromDate' AND '$toDate';";

$result = mysqli_query($conn, $sql);

$return_arr = array();

if ($result->num_rows > 0) {
    while ($row = mysqli_fetch_array($result)) {
        $return_arr[] = array(
            "total_passengers" => $row['total_passengers'],
        );
    }
}

echo json_encode($return_arr);