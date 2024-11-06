<?php
session_start();

include('includes/header.inc');
include('includes/nav.inc');
include('includes/db_connect.inc');

// Fetch all distinct types from the pets table
$type_sql = "SELECT DISTINCT type FROM pets";
$type_result = mysqli_query($conn, $type_sql);

// Fetch all pets for display or based on selected type
$selected_type = isset($_GET['type']) ? $_GET['type'] : '';
$pet_sql = "SELECT petid, petname, image, caption FROM pets"; // Changed 'name' to 'petname'
if ($selected_type) {
    $pet_sql .= " WHERE type = ?";
    $stmt = $conn->prepare($pet_sql);
    $stmt->bind_param("s", $selected_type);
    $stmt->execute();
    $result = $stmt->get_result();
} else {
    $result = mysqli_query($conn, $pet_sql);
}
?>