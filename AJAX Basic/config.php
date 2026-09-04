<?php
$conn = new mysqli("localhost", "root", "", "simple_db_ajax");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
