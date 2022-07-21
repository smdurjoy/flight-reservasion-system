<?php

include 'connection.php';

$type = $_POST['type'];
$capacity = $_POST['capacity'];
$mfg_date = $_POST['mfg_date'];

$sql = "INSERT INTO aircrafts (type, capacity, mfg_date)
        VALUES ('$type', '$capacity', '$mfg_date')";

if ($conn->query($sql) === TRUE) {
    echo 'Stored Successfully.';
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();



