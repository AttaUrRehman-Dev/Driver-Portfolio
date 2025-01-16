<?php
require 'db.php'; // Include the database connection file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $phone = $conn->real_escape_string($_POST['phone']);
    $pickupAddress = $conn->real_escape_string($_POST['pickupAddress']);
    $dropoffAddress = $conn->real_escape_string($_POST['dropoffAddress']);
    $pickupDate = $conn->real_escape_string($_POST['pickupDate']);
    $distance = $conn->real_escape_string($_POST['distance']);
    $cost = $conn->real_escape_string($_POST['cost']);

    // Insert query
    $sql = "INSERT INTO bookings (name, email, phone, pickup_address, dropoff_address, pickup_date, distance, cost) 
            VALUES ('$name', '$email', '$phone', '$pickupAddress', '$dropoffAddress', '$pickupDate', '$distance', '$cost')";

    if ($conn->query($sql) === TRUE) {
        echo "Booking submitted successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close(); // Close the database connection
}
?>
