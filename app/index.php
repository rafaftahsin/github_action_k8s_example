<?php

$servername = getenv("MYSQL_HOST");
$username = getenv("MYSQL_USER");
$password = getenv("MYSQL_PASS");
$db = getenv("MYSQL_DB");
// Create connection
$conn = new mysqli($servername, $username, $password, $db);

if ($conn->connect_errno) {
    echo "Failed to connect to DB : " . $conn->connect_error;
    exit();
}
else {
    $sql = "SELECT name from wpdb.test";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
            echo "Name" . $row["name"]. "<br>";
        }
    } else {
        echo "0 results";
    }
}

echo "Hello World. The k8s Dev Environment is up & Running, enjoy";

