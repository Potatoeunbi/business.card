<?php

$conn = new mysqli("220.69.247.23", "root", "", "business_card");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>
