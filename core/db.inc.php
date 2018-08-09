<?php

// CONNECTS TO DATABASE
$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "myblogsite_hospital";

$conn = new mysqli($dbServername, $dbUsername, $dbPassword, $dbName);

if ($conn->connect_error) {
    die("Connection failed".$conn->connect_error);
} else {
    echo "";
}

?>