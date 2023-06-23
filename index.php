<?php

$servername = "mysql.edhubdevelopment.com";
$username = "wpuser";
$password = "Wp123#";
$db = "wpdb";
// Create connection
$conn = new mysqli($servername, $username, $password, $db);

if ($conn->connect_errno) {
    echo "Failed to connect to DB : " . $conn->connect_error;
    exit();
}
else {
    echo "Connected Successfully";
}

