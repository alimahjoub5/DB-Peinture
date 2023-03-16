<?php
// Server information
$host = "localhost";
$username = "root";
$password = "mysql";
$dbname = "dbpeinture";

$conn = mysqli_connect($host, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>