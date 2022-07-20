<?php

include 'connection.php';

$routeId = $_GET['routeId'];

$airFareSql = "SELECT flight_schedules.aircraft_id, flight_date, departure, arrival, fare, airfare_id, type, route_id 
                FROM flight_schedules, airfares, aircrafts
                WHERE flight_schedules.aircraft_id = aircrafts.id
                AND airfares.id = flight_schedules.airfare_id AND airfares.route_id = '$routeId'";
$result = mysqli_query($conn, $airFareSql);

$return_arr = array();

if ($result->num_rows > 0) {
    while ($row = mysqli_fetch_array($result)) {
        $return_arr[] = array(
            "type" => $row['type'],
            "flight_date" => $row['flight_date'],
            "departure" => $row['departure'],
            "arrival" => $row['arrival'],
            "fare" => $row['fare'],
        );
    }
}

echo json_encode($return_arr);