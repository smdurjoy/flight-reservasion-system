<?php

include 'connection.php';

$state_id = $_POST['state_id'];
$name = $_POST['name'];
$address = $_POST['address'];
$nationality = $_POST['nationality'];
$email = $_POST['email'];
$mobile = $_POST['mobile'];
$age = $_POST['age'];

$contactSql = "INSERT INTO contacts (email, mobile, state_id)
                VALUES ('$email', '$mobile', '$state_id')";

$contactId = null;

if ($conn->query($contactSql) === TRUE) {
    $contactId = $conn->insert_id;
    $sql = "INSERT INTO passengers (name, address, age, nationality, contact_id)
        VALUES ('$name', '$address', '$age', '$nationality', '$contactId')";

    if ($conn->query($sql) === TRUE) {
        echo 'Stored Successfully.';
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}  else {
    echo "Error: " . $contactSql . "<br>" . $conn->error;
}

$conn->close();