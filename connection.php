<?php
// database connection parameters.
$host = '';
$db_username = '';
$db_password = '';
$database = '';

// create a connection
$conn = new mysqli($host, $db_username, $db_password, $database);

// check connection
if ($conn->connect_error) {
    die("Connection faild :" . $conn->connect_error);
}

?>