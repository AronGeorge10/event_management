<?php
include '../db_connect.php'; // Connect to the db
$id = $_GET['id'];
$query = "DELETE FROM tbl_registrations WHERE id=$id"; // query to delete the record from the tbl_registrations
mysqli_query($conn, $query);
header("Location: dashboard.php"); // Redirect back to the dashboard
?>